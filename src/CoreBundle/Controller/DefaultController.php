<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PhpOffice\PhpWord\TemplateProcessor;

class DefaultController extends Controller
{
    /**
     *@Route("/index" )
     */
    public function indexAction(){
        $query = $this->getDoctrine()->getManager();
        $est =  $query->getRepository('CoreBundle:TblEstacion')->findAll();
        $curso = $query->getRepository('CoreBundle:TblCurso')->findAll();
        return $this->render('CoreBundle:Default:index.html.twig',array('est'=>$est , 'cur'=>$curso));
    }


    /**
     * @Route("/doc")
     */
    public function documentosAction()
    {

        $query = $this->getDoctrine()->getManager();
        $curso =  $query->getRepository('CoreBundle:TblCurso')->findAll();
        $empleo =  $query->getRepository('CoreBundle:TblEmpleado')->findAll();
        $est =  $query->getRepository('CoreBundle:TblEstacion')->findAll();

        $templateWord = new TemplateProcessor('C:\xampp\htdocs\DC3\documentos\template.docx');

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
        foreach ($curso as $c){
        $templateWord->setValue('Value6', $c->getNombre());
        $templateWord->setValue('Value7', $c->getDuracion());
        $templateWord->setValue('Value8', $c->getFInicio()->format('d.m.Y'));
        $templateWord ->setValue('Value9' , $c->getFTermino()->format('d.m.Y'));
        };


        $templateWord->saveAs('Prueba.docx');

        header("Content-Disposition: attachment; filename=prueba.docx; charset=iso-8859-1");
        echo file_get_contents('prueba.docx');


    }
}
