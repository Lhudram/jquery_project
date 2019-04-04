<?php

/**
 * Class Adresse
 */
class Adresse
{
    /**
     * @var Int|null
     */
    private $idAdresse;
    /**
     * @var Int|null
     */
    private $idOrganisme;
    /**
     * @var null|String
     */
    private $adresse;
    /**
     * @var null|String
     */
    private $ville;
    /**
     * @var Int|null
     */
    private $codePostal;

    /**
     * Adresse constructor.
     * @param Int|null $idAdresse
     * @param Int|null $idOrganisme
     * @param null|String $adresse
     * @param null|String $ville
     * @param Int|null $codePostal
     */
    public function __construct(?Int $idAdresse, ?Int $idOrganisme, ?String $adresse, ?String $ville, ?Int $codePostal)
    {
        $this->idAdresse = $idAdresse;
        $this->idOrganisme = $idOrganisme;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
    }

    /**
     * @return Int|null
     */
    public function getIdAdresse(): ?Int
    {
        return $this->idAdresse;
    }

    /**
     * @param Int|null $idAdresse
     */
    public function setIdAdresse(?Int $idAdresse): void
    {
        $this->idAdresse = $idAdresse;
    }

    /**
     * @return Int|null
     */
    public function getIdOrganisme(): ?Int
    {
        return $this->idOrganisme;
    }

    /**
     * @param Int|null $idOrganisme
     */
    public function setIdOrganisme(?Int $idOrganisme): void
    {
        $this->idOrganisme = $idOrganisme;
    }

    /**
     * @return null|String
     */
    public function getAdresse(): ?String
    {
        return $this->adresse;
    }

    /**
     * @param null|String $adresse
     */
    public function setAdresse(?String $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return null|String
     */
    public function getVille(): ?String
    {
        return $this->ville;
    }

    /**
     * @param null|String $ville
     */
    public function setVille(?String $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return Int|null
     */
    public function getCodePostal(): ?Int
    {
        return $this->codePostal;
    }

    /**
     * @param Int|null $codePostal
     */
    public function setCodePostal(?Int $codePostal): void
    {
        $this->codePostal = $codePostal;
    }


}