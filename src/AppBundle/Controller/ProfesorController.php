<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProfesorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            $password = $this->get('security.password_encoder')
                ->encodePassword($Profesor, $Profesor->getPassTemp());
            $Profesor->setPassTPRof($password);
            $em=$this->getDoctrine()->getManager();
            $em->persist($Profesor);
            $em->flush();
            $this->addFlash('success','Profesor Nuevo');
            return $this->redirectToRoute('profesorall');
        }
        return $this->render('Profesor/profesor.html.twig',array('Form'=>$formP->createView()));
    }

    /**
     * @Route("/profesor/edit/{idUser}", name="profesoredit")
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
            $passwordr = $this->container->get('security.password_encoder');
            $password =$passwordr->encodePassword($Profesor, $Profesor->getPassTemp());
            $Profesor->setPassTPRof($password);
            $em->persist($Profesor);
            $em->flush();
            $this->addFlash('success','Profesor Editado');
            return $this->redirectToRoute('profesorall');



        }
        return $this->render('Profesor/profesor.html.twig',array('Form'=>$formP->createView()));
    }

    /**
     * @Route("/profesor/delete/{idUser}", name="profesordelete")
     */
    public function deleteProfesorAction(Request $request,$idUser)
    {
        $em=$this->getDoctrine()->getManager();
        $profesor=$em->find("AppBundle:Profesor", $idUser);
        $formP=$this->createFormBuilder($profesor)
            ->add('nomProf', HiddenType::class,array('disabled'=>true))
            ->add('Si',SubmitType::class)
            ->getForm();
        $formP->handleRequest($request);

        if($formP->isSubmitted() && $formP->isValid()){
            //$profesor=$em->find("AppBundle:Profesor", $idUser);
            $em=$this->getDoctrine()->getManager();
            $em->remove($profesor);
            $em->flush();
            /*$password = $this->get('security.password_encoder')
                 ->encodePassword($Profesor, $Profesor->getPassTemp());
             $Profesor->setPassTPRof($password);*/
            $this->addFlash('success','Profesor eliminado');
            return $this->redirectToRoute('profesorall');

        }
        return $this->render('Profesor/Delete.html.twig',array('Form'=>$formP->createView()));
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
