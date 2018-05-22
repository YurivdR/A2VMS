<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bestelregel
 *
 * @ORM\Table(name="bestelregel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelregelRepository")
 */
class Bestelregel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="bestelregels")
     * @ORM\Column(name="artikelnummer", type="integer", nullable=true)
     */
    private $artikel;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Bestelopdracht", inversedBy="bestelregels")
     * @ORM\Column(name="bestelordernummer", type="integer", nullable=true)
     */
    private $bestelopdracht;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal", type="integer", nullable=true)
     */
    private $aantal;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Bestelregel
     */
    public function setArtikelnummer($artikel)
    {
        $this->artikelnummer = $artikel;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikel;
    }

    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Bestelregel
     */
    public function setBestelordernummer($bestelopdracht)
    {
        $this->bestelordernummer = $bestelopdracht;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getBestelordernummer()
    {
        return $this->bestelopdracht;
    }

    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Bestelregel
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return int
     */
    public function getAantal()
    {
        return $this->aantal;
    }
}
