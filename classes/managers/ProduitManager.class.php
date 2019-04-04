<?php

/**
 * Class ProduitManager
 */
class ProduitManager
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
        $sql = "SELECT idproduit, libelle, prix, quantite, img FROM produit";
        $requete = $this->pdo->prepare($sql);
        $requete->execute();
        while ($produit = $requete->fetch(PDO::FETCH_OBJ)) {
            $res[] = new Produit($produit->idproduit, $produit->libelle, $produit->prix, $produit->quantite, $produit->img);
        }
        $requete->closeCursor();
        return empty($res) ? null : $res;
    }

    /**
     * @param Produit $produit
     * @return bool
     */
    public function add(Produit $produit): bool
    {
        $sql = "INSERT INTO produit (libelle, prix, quantite, img) VALUES (:libelle, :prix, :quantite, :img)";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":libelle", $produit->getLibelle(), PDO::PARAM_STR);
        $requete->bindValue(":prix", $produit->getPrix(), PDO::PARAM_STR);
        $requete->bindValue(":quantite", $produit->getQuantite());
        $requete->bindValue(":img", $produit->getImg(), PDO::PARAM_STR);
        return $requete->execute();
    }

    /**
     * @param Int $idProduit
     * @param Int $quantite
     * @return bool
     */
    public function update(Int $idProduit, Int $quantite): bool
    {
        $sql = "UPDATE produit SET quantite = :quantite WHERE idProduit = :idProduit";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idProduit", $idProduit);
        $requete->bindValue(":quantite", $quantite);
        return $requete->execute();
    }

    /**
     * @param Int $idProduit
     * @return bool
     */
    public function delete(Int $idProduit): bool
    {
        $sql = "DELETE FROM produit WHERE idproduit = :idProduit";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idProduit", $idProduit);
        return $requete->execute();
    }
    public function rechercher(String $recherche): ?array
    {
        $sqlDebut = 'SELECT * from produit';

        $requete = $this->pdo->prepare($sqlDebut);
        $requete->execute();
        $recherches = array();
        while ($res = $requete->fetch(PDO::FETCH_OBJ)) {
            $recherches[] = ['id' => $res->idproduit, 'libelle' => $res->libelle, 'prix' => $res->prix, 'quantite' => $res->quantite,
                'img' => $res->img];
        }
        $requete->closeCursor();

        $chaineCherchee = controleEspaces($recherche);
        $chaineCherchee = str_replace(array("-", "_", "/", " "), "|", $chaineCherchee);
        $chaineCherchee = retirerAccents($chaineCherchee);
        $chaineCherchee = '/' . $chaineCherchee . '/i';
        $resultat = array();
        foreach ($recherches as $recherche) {
            $nomProduit= str_replace(array("-", "_", "/", " "), "", $recherche['libelle']);
            $nomProduit = retirerAccents($nomProduit);
            if (preg_match($chaineCherchee, $nomProduit))
                $resultat[] = new Produit($recherche['id'],$recherche['libelle'],$recherche['prix'],$recherche['quantite'],$recherche['img']);
        }

        $recherches = $resultat;
        return $recherches;
    }

    public function getNomParId(int $int): ?String
    {
        $sql = "SELECT libelle FROM produit where idproduit=:idproduit";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(":idproduit", $int);
        $requete->execute();
        while ($produit = $requete->fetch(PDO::FETCH_OBJ)) {
            $res = $produit->libelle;
        }
        $requete->closeCursor();
        return empty($res) ? null : $res;
    }
}