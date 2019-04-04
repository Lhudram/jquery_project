<?php

/**
 * Class ConnexionManager
 */
class ConnexionManager
{
    /**
     * @var Mypdo
     */
    private $pdo;

    /**
     * ConnexionManager constructor.
     * @param Mypdo $mypdo
     */
    public function __construct(Mypdo $mypdo)
    {
        $this->pdo = $mypdo;
    }

    /**
     * @param String $login
     * @param String $password
     * @return array|null
     */
    public function connexion(String $login, String $password): ?array
    {
        $requete = $this->pdo->prepare("SELECT password, idorganisme, nom FROM organisme WHERE mail = :login");
        $requete->bindValue(":login", $login);
        $requete->execute();
        $res = $requete->fetch(PDO::FETCH_OBJ);
        if (empty($res))
            return null;
        return (password_verify($password, $res->password)) ? ['nom'=> $res->nom, 'id'=>$res->idorganisme] : null;
    }

    /**
     * @param String $password
     * @return String
     */
    public function generate(String $password): String
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}