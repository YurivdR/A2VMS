<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelopdracht;
use AppBundle\Entity\Bestelregel;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\BestelOpdrachtType;
use AppBundle\Form\Type\BestelregelType;
use AppBundle\Form\Type\ArtikelType;

class BestelopdrachtController extends Controller
{
/**
     * @Route("/artikel/nieuw", name="nieuwartikel")
     */
    public function nieuwArtikel(Request $request) {
        $nieuwArtikel = new Artikel();
        $form = $this->createForm(ArtikelType::class, $nieuwArtikel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuwArtikel);
            $em->flush();
            return $this->redirect($this->generateurl("nieuwartikel"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }
}
