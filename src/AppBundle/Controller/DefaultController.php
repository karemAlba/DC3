<?php

namespace AppBundle\Controller;

use PhpOffice\PhpWord\SimpleType\  DocProtect;
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



        $templateWord = new TemplateProcessor('C:\xampp\htdocs\DC3b\documentos\template.docx');



        $templateWord->setValue('Value1', $empleo->getNombre());
        $templateWord->setValue('Value2', $empleo->getCurp());
        $templateWord->setValue('Value3', $empleo->getPuesto());
        $templateWord->setValue('Value4', $est->getRSocial());
        $templateWord->setValue('Value5', $est->getRfc());
        $templateWord->setValue('Value10', $est->getRTrabajador());
        $templateWord->setValue('Value11', $est->getRPatronal());
        $templateWord->setValue('Value6', $curso->getNombre());
        $templateWord->setValue('Value7', $curso->getDuracion());
        $templateWord->setValue('Value8', $curso->getFInicio()->format('d.m.Y'));
        $templateWord->setValue('Value9', $curso->getFTermino()->format('d.m.Y'));

        $templateWord->saveAs('Prueba.docx');
        header("Content-Disposition: attachment; filename=prueba.docx; charset=iso-8859-1");
        echo file_get_contents('prueba.docx');
        $response->headers->set('Content-Type', 'application/msword');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;

        /*
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
