<?php

/**
 * Class AdresseManager
 */
class AdresseManager
{
    /**
     * @var Mypdo
     */
    private $pdo;

    /**
     * AdresseManager constructor.
     * @param $pdo
     */
    public function __construct(Mypdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param Int $idOrganisme
     * @return array|null
     */
    public function get(Int $idOrganisme): ?array
    {
        $sql = "SELECT adresse, idadresse, ville, codepostal FROM adresse WHERE idorganisme = :id";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue("id", $idOrganisme);
        $requete->execute();
        while ($res = $requete->fetch(PDO::FETCH_OBJ)) {
            $adresse[] = new Adresse($res->idAdresse, $idOrganisme, $res->adresse, $res->ville, $res->codepostal);
        }
        return (empty($adresse)) ? null : $adresse;
    }

    /**
     * @param Adresse $adresse
     * @return bool
     */
    public function add(Adresse $adresse): bool
    {
        $sql = "INSERT INTO adresse (adresse, codepostal, ville, idorganisme) VALUES (:adresse, :codePostal, :ville, :idOrganisme)";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":adresse", $adresse->getAdresse(), PDO::PARAM_STR);
        $requete->bindValue(":codePostal", $adresse->getCodePostal());
        $requete->bindValue(":ville", $adresse->getVille(), PDO::PARAM_STR);
        $requete->bindValue(":idOrganisme", $adresse->getIdOrganisme());
        return $requete->execute();
    }

    /**
     * @param Adresse $adresse
     * @return bool
     */
    public function update(Adresse $adresse): bool
    {
        $sql = "UPDATE adresse SET adresse = :adresse, codepostal = :codepostal, ville = :ville, idorganisme = :idorganisme WHERE idadresse = :id";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":adresse", $adresse->getAdresse(), PDO::PARAM_STR);
        $requete->bindValue(":codepostal", $adresse->getCodePostal());
        $requete->bindValue(":ville", $adresse->getVille(), PDO::PARAM_STR);
        $requete->bindValue(":idorganisme", $adresse->getIdOrganisme());
        return $requete->execute();
    }

    /**
     * @param Int $idAdresse
     * @return bool
     */
    public function delete(Int $idAdresse): bool
    {
        $sql = "DELETE FROM adresse WHERE idadresse = :idAdresse";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idAdresse", $idAdresse);
        return $requete->execute();
    }

    /**
     * @return array|null
     */
    public function getAll(): ?array
    {
        $sql = "SELECT adresse, idadresse, ville, codepostal, idorganisme FROM adresse ORDER BY idorganisme";
        $requete = $this->pdo->prepare($sql);
        $requete->execute();
        while ($res = $requete->fetch(PDO::FETCH_OBJ)) {
            var_dump($res);
            $adresse[] = new Adresse($res->idadresse, $res->idorganisme, $res->adresse, $res->ville, $res->codepostal);
        }
        return (empty($adresse)) ? null : $adresse;
    }

}
