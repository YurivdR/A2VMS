<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * bestelopdracht
 *
 * @ORM\Table(name="bestelopdracht")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bestelopdrachtRepository")
 */
class Bestelopdracht
{
    /**
     * @var string
     *
     * @ORM\Column(name="NaamLeverancier", type="text")
     */
    private $naamLeverancier;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Bestelordernummer", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="HoeveelheidBesteldArtikel", type="integer", nullable=true)
     */
    private $hoeveelheidBesteldArtikel;

    /**
     * @var string
     *
     * @ORM\Column(name="ontvangen", type="text")
     */
    private $ontvangen;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="text")
     */
    private $kwaliteit;

    /**
     * @ORM\OneToMany(targetEntity="Bestelregel", mappedBy="bestelopdracht")
     */
    private $bestelregels;

    /**
     * Set bestelregels
     *
     * @param integer $bestelregels
     *
     * @return Bestelopdracht
     */
    public function setBestelregels($bestelregels)
    {
        $this->bestelregels = $bestelregels;

        return $this;
    }

    /**
     * Get bestelregels
     *
     * @return int
     */
    public function getBestelregels()
    {
        return $this->bestelregels;
    }

    /**
     * Set naamLeverancier
     *
     * @param string $naamLeverancier
     *
     * @return Bestelopdracht
     */
    public function setNaamLeverancier($naamLeverancier)
    {
        $this->naamLeverancier = $naamLeverancier;

        return $this;
    }

    /**
     * Get naamLeverancier
     *
     * @return string
     */
    public function getNaamLeverancier()
    {
        return $this->naamLeverancier;
    }

    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return bestelopdracht
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

    /**
     * Set hoeveelheidBesteldArtikel
     *
     * @param integer $hoeveelheidBesteldArtikel
     *
     * @return bestelopdracht
     */
    public function setHoeveelheidBesteldArtikel($hoeveelheidBesteldArtikel)
    {
        $this->hoeveelheidBesteldArtikel = $hoeveelheidBesteldArtikel;

        return $this;
    }

    /**
     * Get hoeveelheidBesteldArtikel
     *
     * @return int
     */
    public function getHoeveelheidBesteldArtikel()
    {
        return $this->hoeveelheidBesteldArtikel;
    }

    /**
     * Set ontvangen
     *
     * @param string $ontvangen
     *
     * @return bestelopdracht
     */
    public function setOntvangen($ontvangen)
    {
        $this->ontvangen = $ontvangen;

        return $this;
    }

    /**
     * Get ontvangen
     *
     * @return string
     */
    public function getOntvangen()
    {
        return $this->ontvangen;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return bestelopdracht
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }
}
