<?php

/**
 * Class Livreur
 */
class Livreur
{
    /**
     * @var Int|null
     */
    private $idLivreur;
    /**
     * @var null|String
     */
    private $nom;
    /**
     * @var null|String
     */
    private $prenom;
    /**
     * @var null|String
     */
    private $tel;

    /**
     * Livreur constructor.
     * @param Int|null $idLivreur
     * @param null|String $nom
     * @param null|String $prenom
     * @param null|String $tel
     */
    public function __construct(?Int $idLivreur, ?String $nom, ?String $prenom, ?String $tel)
    {
        $this->idLivreur = $idLivreur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
    }

    /**
     * @return Int|null
     */
    public function getIdLivreur(): ?Int
    {
        return $this->idLivreur;
    }

    /**
     * @param Int|null $idLivreur
     */
    public function setIdLivreur(?Int $idLivreur): void
    {
        $this->idLivreur = $idLivreur;
    }

    /**
     * @return null|String
     */
    public function getNom(): ?String
    {
        return $this->nom;
    }

    /**
     * @param null|String $nom
     */
    public function setNom(?String $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return null|String
     */
    public function getPrenom(): ?String
    {
        return $this->prenom;
    }

    /**
     * @param null|String $prenom
     */
    public function setPrenom(?String $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return null|String
     */
    public function getTel(): ?String
    {
        return $this->tel;
    }

    /**
     * @param null|String $tel
     */
    public function setTel(?String $tel): void
    {
        $this->tel = $tel;
    }


}