<?php

/**
 * Class DetailsVente
 */
class DetailsVente
{
    /**
     * @var Int|null
     */
    private $idVente;
    /**
     * @var Int|null
     */
    private $idProduit;
    /**
     * @var Int|null
     */
    private $quantite;
    /**
     * @var Int|null
     */
    private $remise;

    /**
     * DetailsVente constructor.
     * @param Int|null $idVente
     * @param Int|null $idProduit
     * @param Int|null $quantite
     * @param Int|null $remise
     */
    public function __construct(?Int $idVente, ?Int $idProduit, ?Int $quantite, ?Int $remise)
    {
        $this->idVente = $idVente;
        $this->idProduit = $idProduit;
        $this->quantite = $quantite;
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
    public function getIdProduit(): ?Int
    {
        return $this->idProduit;
    }

    /**
     * @param Int|null $idProduit
     */
    public function setIdProduit(?Int $idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return Int|null
     */
    public function getQuantite(): ?Int
    {
        return $this->quantite;
    }

    /**
     * @param Int|null $quantite
     */
    public function setQuantite(?Int $quantite): void
    {
        $this->quantite = $quantite;
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