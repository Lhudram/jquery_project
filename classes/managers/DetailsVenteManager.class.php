<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 21/03/2018
 * Time: 15:52
 */

class DetailsVenteManager
{
    /**
     * @var Mypdo
     */
    private $pdo;

    /**
     * ProduitManager constructor.
     * @param $pdo
     */
    public function __construct(Mypdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array|null
     * Retourne un tableau de produits
     * null si aucun produit à retourner
     */
    public function getAll(): ?array
    {
        $sql = "SELECT idproduit, idvente, quantite, remise FROM detail_ventes";
        $requete = $this->pdo->prepare($sql);
        $requete->execute();
        while ($produit = $requete->fetch(PDO::FETCH_OBJ)) {
            $res[] = new DetailsVente($produit->idproduit, $produit->idvente, $produit->quantite, $produit->remise);
        }
        $requete->closeCursor();
        return empty($res) ? null : $res;
    }

    /**
     * @param Int $idvente
     * @return array|null
     * Retourne un tableau de produits
     * null si aucun produit à retourner
     */
    public function getOneById(Int $idvente): ?array
    {
        $sql = "SELECT idproduit, idvente, quantite, remise FROM detail_ventes where idvente = :idvente";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idvente", $idvente);
        $requete->execute();
        while ($produit = $requete->fetch(PDO::FETCH_OBJ)) {
            $res[] = new DetailsVente($produit->idproduit, $produit->idvente, $produit->quantite, $produit->remise);
        }
        $requete->closeCursor();
        return empty($res) ? null : $res;
    }

    /**
     * @param Int $idorganisme
     * @return array|null
     * Retourne un tableau de produits
     * null si aucun produit à retourner
     */
    public function getAllByIdLogin(Int $idorganisme): ?array
    {
        $sql = "SELECT idvente, idproduit, quantite, d.remise FROM detail_ventes d join ventes v ON d.idvente = v.idventes where idorganisme =:idorganisme";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idorganisme", $idorganisme);
        $requete->execute();
        while ($produit = $requete->fetch(PDO::FETCH_OBJ)) {
            $res[] = new DetailsVente($produit->idvente, $produit->idproduit, $produit->quantite, $produit->remise);
        }
        $requete->closeCursor();
        return empty($res) ? null : $res;
    }
}