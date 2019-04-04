<?php

/**
 * Class Vente
 */
class Vente
{
    /**
     * @var Int|null
     */
    private $idVente;
    /**
     * @var Int|null
     */
    private $idOrganisme;
    /**
     * @var null|String
     */
    private $dateEstimee;
    /**
     * @var Int|null
     */
    private $remise;

    /**
     * Vente constructor.
     * @param Int|null $idVente
     * @param Int|null $idOrganisme
     * @param null|String $dateEstimee
     * @param Int|null $remise
     */
    public function __construct(?Int $idVente, ?Int $idOrganisme, ?String $dateEstimee, ?Int $remise)
    {
        $this->idVente = $idVente;
        $this->idOrganisme = $idOrganisme;
        $this->dateEstimee = $dateEstimee;
        $this->remise = $remise;
    }

    /**
     * @return Int|null
     */
    public function getIdVente(): ?Int
    {
        return $this->idVente;
    }

    /**
     * @param Int|null $idVente
     */
    public function setIdVente(?Int $idVente): void
    {
        $this->idVente = $idVente;
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
    public function getDateEstimee(): ?String
    {
        return $this->dateEstimee;
    }

    /**
     * @param null|String $dateEstimee
     */
    public function setDateEstimee(?String $dateEstimee): void
    {
        $this->dateEstimee = $dateEstimee;
    }

    /**
     * @return Int|null
     */
    public function getRemise(): ?Int
    {
        return $this->remise;
    }

    /**
     * @param Int|null $remise
     */
    public function setRemise(?Int $remise): void
    {
        $this->remise = $remise;
    }

}