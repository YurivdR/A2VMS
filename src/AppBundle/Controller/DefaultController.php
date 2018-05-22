<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
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
