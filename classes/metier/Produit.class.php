<?php

/**
 * Class Produit
 */
class Produit
{
    /**
     * @var Int|null
     */
    private $idProduit;
    /**
     * @var null|String
     */
    private $libelle;
    /**
     * @var Float|null
     */
    private $prix;
    /**
     * @var Int|null
     */
    private $quantite;
    /**
     * @var null|String
     */
    private $img;

    /**
     * Produit constructor.
     * @param Int|null $idProduit
     * @param null|String $libelle
     * @param Float|null $prix
     * @param Int|null $quantite
     * @param null|String $img
     */
    public function __construct(?Int $idProduit, ?String $libelle, ?Float $prix, ?Int $quantite, ?String $img)
    {
        $this->idProduit = $idProduit;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->img = $img;
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
     * @return null|String
     */
    public function getLibelle(): ?String
    {
        return $this->libelle;
    }

    /**
     * @param null|String $libelle
     */
    public function setLibelle(?String $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return Float|null
     */
    public function getPrix(): ?Float
    {
        return $this->prix;
    }

    /**
     * @param Float|null $prix
     */
    public function setPrix(?Float $prix): void
    {
        $this->prix = $prix;
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
     * @return null|String
     */
    public function getImg(): ?String
    {
        return $this->img;
    }

    /**
     * @param null|String $img
     */
    public function setImg(?String $img): void
    {
        $this->img = $img;
    }
}