<?php

namespace AppBundle\Controller;

use PhpOffice\PhpWord\SimpleType\DocProtect;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DefaultController extends Controller
{
    /**
     *@Route("/" ,name="index")
     */
    public function indexAction(){
        $query = $this->getDoctrine()->getManager();
        $est =  $query->getRepository('CoreBundle:TblEstacion')->findAll();
        $curso = $query->getRepository('CoreBundle:TblCurso')->findAll();
        $em = $query->getRepository('CoreBundle:TblEmpleado')->findAll();

        return $this->render('AppBundle:Default:inicio.html.twig',array('est'=>$est , 'curso'=>$curso, 'em'=>$em ));

    }


    /**
     * @Route("/doc/{ide}/{idc}/{ids}/" , name="doc")
     */
    public function documentosAction(Request $request, $ide,$idc,$ids)
    {
        $query = $this->getDoctrine()->getManager();
        $curso =  $query->getRepository('CoreBundle:TblCurso')->findOneBy(array('id'=>$idc));
        $empleo =  $query->getRepository('CoreBundle:TblEmpleado')->findOneBy(array('id'=>$ide));
        $est =  $query->getRepository('CoreBundle:TblEstacion')->findOneBy(array('id'=>$ids));

        $fileName = 'C:\xampp56\htdocs\dc3\documentos\template.docx';

        $phpTemplateObject = $this->get('phpword')->createTemplateObject($fileName);

        $phpTemplateObject->setValue('Value1', $empleo->getNombre());
        $phpTemplateObject->setValue('Value2', $empleo->getCurp());
        $phpTemplateObject->setValue('Value3', $empleo->getPuesto());
        $phpTemplateObject->setValue('Value4', $est->getRSocial());
        $phpTemplateObject->setValue('Value5', $est->getRfc());
        $phpTemplateObject->setValue('Value10', $est->getRTrabajador());
        $phpTemplateObject->setValue('Value11', $est->getRPatronal());
        $phpTemplateObject->setValue('Value6', $curso->getNombre());
        $phpTemplateObject->setValue('Value7', $curso->getDuracion());
        $phpTemplateObject->setValue('Value8', $curso->getFInicio()->format('d.m.Y'));
        $phpTemplateObject->setValue('Value9', $curso->getFTermino()->format('d.m.Y'));

        $phpWordObject = $this->get('phpword')->getPhpWordObjFromTemplate($phpTemplateObject);
        $phpWordObject->getProtection()->setEditing(DocProtect::NONE);
        $phpWordObject->getCompatibility()->setOoxmlVersion(15);
        $phpWordObject->setDefaultParagraphStyle(array('space' => array('before' => 0, 'after' => 0)));
        $writer = $this->get('phpword')->createWriter($phpWordObject, 'Word2007');
        $response = $this->get('phpword')->createStreamedResponse($writer);
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'prueba.docx'
        );
        $response->headers->set('Content-Type', 'application/msword');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;

        /*$templateWord = new TemplateProcessor('C:\xampp\htdocs\DC3b\documentos\template.docx');
        foreach ($empleo as $em) {
            $templateWord->setValue('Value1', $em->getNombre());
            $templateWord->setValue('Value2', $em->getCurp());
            $templateWord->setValue('Value3', $em->getPuesto());
        };
        foreach ($est as $es) {
            $templateWord->setValue('Value4', $es->getRSocial());
            $templateWord->setValue('Value5', $es->getRfc());
            $templateWord->setValue('Value10', $es->getRTrabajador());
            $templateWord->setValue('Value11', $es->getRPatronal());
        };
        foreach ($curso as $c) {
            $templateWord->setValue('Value6', $c->getNombre());
            $templateWord->setValue('Value7', $c->getDuracion());
            $templateWord->setValue('Value8', $c->getFInicio()->format('d.m.Y'));
            $templateWord->setValue('Value9', $c->getFTermino()->format('d.m.Y'));
        };
        $templateWord->saveAs('Prueba.docx');
        header("Content-Disposition: attachment; filename=prueba.docx; charset=iso-8859-1");
        echo file_get_contents('prueba.docx');*/
    }
}
