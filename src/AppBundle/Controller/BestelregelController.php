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

class BestelregelController extends Controller
{
/**
     * @Route("/bestelregel/nieuw", name="bestelregelnieuw")
     */
    public function nieuweBestelRegel(Request $request) {
        $nieuweBestelRegel = new bestelRegel();
        $form = $this->createForm(bestelregelType::class, $nieuweBestelRegel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweBestelRegel);
            $em->flush();
            return $this->redirect($this->generateurl("bestelregelnieuw"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }
}
