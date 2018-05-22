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
       * @Route("/bestelopdracht/nieuw", name="bestelopdrachtnieuw")
       */
      public function nieuweBestelOpdracht(Request $request) {
          $nieuweBestelOpdracht = new bestelOpdracht();
          $form = $this->createForm(bestelOpdrachtType::class, $nieuweBestelOpdracht);

          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
              $em = $this->getDoctrine()->getManager();
              $em->persist($nieuweBestelOpdracht);
              $em->flush();
              return $this->redirect($this->generateurl("bestelregelnieuw"));
          }

          return new Response($this->render('form.html.twig', array('form' => $form->createView())));
      }
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

              /**
          * @Route("/voorraad/bijvullen/{artikelnummer}", name="voorraadBijvullen")
          */
              public function voorraadBijvullen(Request $request, $artikelnummer) {
                //artikel ophalen uit database_host
                $entityManager = $this->getDoctrine()->getManager();
                $huidigArtikel = $entityManager->getRepository("AppBundle:Artikel")->find("$artikelnummer");
                //als er midner voorraad is dan de minimum wordt het verschil aan de bestelserie toegevoegd
                if ($huidigArtikel->getVoorraad() < $huidigArtikel->getMinimumvoorraad()) {
                  $verschil = $huidigArtikel->getMinimumvoorraad() - $huidigArtikel->getVoorraad();
                  //verschil+huidige bestelserie wordt berekend
                  $temp = $huidigArtikel->getBestelserie() + $verschil;
                  //en toegevoegd bij de database
                  $huidigArtikel->setBestelserie($temp);
                  $entityManager->flush();
                  return new Response('<html><body>De huidige voorraad is te laag, Er is/zijn '.$verschil.' artikel(en) aan de bestelserie toegevoegd.</body></html>');
                }
                else
                  return new Response('<html><body>De voorraad is vol genoeg</body></html>');
              }
}
