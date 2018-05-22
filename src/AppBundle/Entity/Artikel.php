<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity
 */
class Artikel
{
  /**
   * @var integer
   *
   * @ORM\Column(name="artikelnummer", type="integer")
   * @ORM\Id
   */
  private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=255, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischespecificaties", type="string", length=255, nullable=false)
     */
    private $technischeSpecificaties;

    /**
     * @var string
     *
     * @ORM\Column(name="magazijnlocatie", type="string", length=100, nullable=false)
     */
    private $magazijnlocatie;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $inkoopprijs;

    /**
     * @var integer
     *
     * @ORM\Column(name="artikelnummervervanging", type="integer", nullable=false)
     */
    private $artikelnummerVervanging;

    /**
     * @var integer
     *
     * @ORM\Column(name="minimumvoorraad", type="integer", nullable=false)
     */
    private $minimumVoorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="voorraad", type="string", length=100, nullable=false)
     */
    private $voorraad;

    /**
     * @var integer
     *
     * @ORM\Column(name="bestelserie", type="integer", nullable=false)
     */
    private $bestelserie;

    /**
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="artikel")
     */
    private $bestelregels;

    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Artikel
     */
    public function setBestelordernummer($bestelordernummer)
    {
        $this->bestelordernummer = $bestelordernummer;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getBestelordernummer()
    {
        return $this->bestelordernummer;
    }

    public function getArtikelnummer(){
		return $this->artikelnummer;
	}

	public function setArtikelnummer($artikelnummer){
		$this->artikelnummer = $artikelnummer;
	}

	public function getOmschrijving(){
		return $this->omschrijving;
	}

	public function setOmschrijving($omschrijving){
		$this->omschrijving = $omschrijving;
	}

	public function getTechnischeSpecificaties(){
		return $this->technischeSpecificaties;
	}

	public function setTechnischeSpecificaties($technischeSpecificaties){
		$this->technischeSpecificaties = $technischeSpecificaties;
	}

	public function getMagazijnlocatie(){
		return $this->magazijnlocatie;
	}

	public function setMagazijnlocatie($magazijnlocatie){
		$this->magazijnlocatie = $magazijnlocatie;
	}

	public function getInkoopprijs(){
		return $this->inkoopprijs;
	}

	public function setInkoopprijs($inkoopprijs){
		$this->inkoopprijs = $inkoopprijs;
	}

	public function getArtikelnummerVervanging(){
		return $this->artikelnummerVervanging;
	}

	public function setArtikelnummerVervanging($artikelnummerVervanging){
		$this->artikelnummerVervanging = $artikelnummerVervanging;
	}

	public function getMinimumVoorraad(){
		return $this->minimumVoorraad;
	}

	public function setMinimumVoorraad($minimumVoorraad){
		$this->minimumVoorraad = $minimumVoorraad;
	}

	public function getVoorraad(){
		return $this->voorraad;
	}

	public function setVoorraad($voorraad){
		$this->voorraad = $voorraad;
	}

	public function getBestelserie(){
		return $this->bestelserie;
	}

	public function setBestelserie($bestelserie){
		$this->bestelserie = $bestelserie;
	}

  public function __construct()
  {
    $this->bestelregels = new ArrayCollection();
  }

}
