<?php

namespace App\Controller;

use App\Form\FormulaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Formulaire;
class FormulaireController extends AbstractController
{
    /**
     * @Route("/formulaire", name="formulaire")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $formulaire = new Formulaire();
        $form= $this->createForm(FormulaireType::class,$formulaire);


        if ($request-> isMethod('POST') && $form ->handleRequest($request)->isValid()){

            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('Formulaire/index.html.twig', [

            'form'=> $form->createview(),
        ]);
    }
}
