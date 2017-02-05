<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProfesorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfesorController extends Controller
{

    /**
     * @Route("/profesor/new", name="profesorNew")
     */
    public function addProfesorAction(Request $request)
    {
        $formP=$this->createForm(ProfesorType::class);
        $formP->handleRequest($request);
        if($formP->isSubmitted() && $formP->isValid()){
            $Profesor=$formP->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($Profesor);
            $em->flush();
           /*$password = $this->get('security.password_encoder')
                ->encodePassword($Profesor, $Profesor->getPassTemp());
            $Profesor->setPassTPRof($password);*/


        }
        return $this->render('Profesor/profesor.html.twig',array('Form'=>$formP->createView()));
    }
    /**
     * @Route("/profesor/add/{idUser}", name="profesoredit")
     */
    public function editProfesorAction(Request $request,$idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $profesor=$em->find("AppBundle:Profesor", $idUser);
        $formP=$this->createForm(ProfesorType::class,$profesor);
        $formP->handleRequest($request);
        if($formP->isSubmitted() && $formP->isValid()){
            $Profesor=$formP->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($Profesor);
            $em->flush();
            /*$password = $this->get('security.password_encoder')
                 ->encodePassword($Profesor, $Profesor->getPassTemp());
             $Profesor->setPassTPRof($password);*/


        }
        return $this->render('Profesor/profesor.html.twig',array('Form'=>$formP->createView()));
    }
    /**
     * @Route("/profesor/delete/{idUser}", name="profesoredit")
     */
    public function deleteProfesorAction(Request $request,$idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $profesor=$em->find("AppBundle:Profesor", $idUser);
        $formP=$this->createForm(ProfesorType::class,$profesor);
        $formP->handleRequest($request);
        if($formP->isSubmitted() && $formP->isValid()){
            $profesor=$em->find("AppBundle:Profesor", $idUser);
            $em=$this->getDoctrine()->getManager();
            $em->remove($profesor);
            $em->flush();
            /*$password = $this->get('security.password_encoder')
                 ->encodePassword($Profesor, $Profesor->getPassTemp());
             $Profesor->setPassTPRof($password);*/


        }
        return $this->render('Profesor/profesor.html.twig',array('Form'=>$formP->createView()));
    }
    /**
    * @Route("/profesor/all", name="profesorall")
    */
    public function allProfesorAction()
    {
        $em=$this->getDoctrine()->getManager();
        $profesores=$em->getRepository('AppBundle:Profesor')->findAll();
        return $this->render('Profesor/listprofesor.html.twig',array('Profesores'=>$profesores));
    }
}
