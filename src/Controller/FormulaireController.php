<?php

namespace App\Controller;

use App\Form\FormulaireType;
use App\Form\TestType;
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
        //$form = $this->createForm(TestType::class);

        if ($request-> isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->get('session')->getFlashBag()->add(
                'Success',
                'Contact Added!'
            );
            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('Formulaire/index.html.twig', [

            'form'=> $form->createview(),
        ]);
    }
}
