<?php

/**
 * Class Organisme
 */
class Organisme
{
    /**
     * @var Int|null
     */
    private $idOrganisme;
    /**
     * @var null|String
     */
    private $nom;
    /**
     * @var null|String
     */
    private $mail;
    /**
     * @var null|String
     */
    private $tel;

    /**
     * Organisme constructor.
     * @param Int|null $idOrganisme
     * @param null|String $nom
     * @param null|String $mail
     * @param null|String $tel
     */
    public function __construct(?Int $idOrganisme, ?String $nom, ?String $mail, ?String $tel)
    {
        $this->idOrganisme = $idOrganisme;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->tel = $tel;
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
    public function getMail(): ?String
    {
        return $this->mail;
    }

    /**
     * @param null|String $mail
     */
    public function setMail(?String $mail): void
    {
        $this->mail = $mail;
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