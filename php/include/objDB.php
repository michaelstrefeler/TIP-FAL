<?php 
class objDB
{
    // Déclaration des constantes
    CONST DB_HOST = "localhost";
    CONST DB_NAME = "db_books";
    CONST DB_USER = "root";
    CONST DB_PASSWORD = "";

    // Déclaration des variables
    private $objConnexion = null;

    // Contructeur
    public function __construct(){
        $this->dbConnect();
    }

    // Déstructeur
    public function __destruct(){
        $this->dbDisconnect();
    }

    // Connexion à la base de données
    function dbConnect(){
        try {
            // Options de connexion
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //connexion :ATTENTION->enlever le $ devant la variable
            $this->objConnexion = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . "", self::DB_USER, self::DB_PASSWORD, $options);
        } catch (PDOException $e) {
            echo 'Problème de connexion BD : ' . $e->getMessage();
        }
    }

    // Déconnexion à la base de données
    function dbDisconnect(){
        if (isset($this->objConnexion))
        {
            unset($this->objConnexion);
        }
    }

    // Fonction pour executer les requêtes SQL
    private function executeSqlRequest(string $strRequest){
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$this->objConnexion = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . "", self::DB_USER, self::DB_PASSWORD,$options);
		
        if ($this->objConnexion == null) {
            $this->dbConnect();
        }

        $query = $this->objConnexion->prepare($strRequest);
        try {
            $query->execute();
        } catch (PDOException $e) {
            echo 'Problème avec la requête SQL : ' . $e->getMessage();
        }
        
        $this->dbDisconnect();
        return $query;
    }

    // Fonction pour aller prendre des données dans la base de données
    private function getRequest(string $sqlRequest){
        $tab_values = array();

        $result = $this->executeSqlRequest($sqlRequest);

        if ($result->rowCount() > 0)
        {
            $tab_values = $result->fetchAll(PDO::FETCH_ASSOC);

            $result->closeCursor();

        }

        return $tab_values;
    }
    
    // Fonction pour ajouter, modifier ou supprimer qqch de la base de données
    private function blnRequest(string $sqlRequest,array $tabParams=null)
    {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $this->objConnexion = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . "", self::DB_USER, self::DB_PASSWORD, $options);

        $query = $this->objConnexion->prepare($sqlRequest);
        try{
            $blnResult = $query->execute($tabParams);
        }
        catch(PDOException $e)
        {
            echo 'Problème avec la requête SQL : '.$e->getMessage();
        }

        return $blnResult;
    }

    /////////////////// Utilisateurs ///////////////////

    // Fonction pour récupérer les données de tous les utilisateurs de la base de données
    function getAllUsers(){
        $sqlRequest = "SELECT * FROM user";
        return $this->getRequest($sqlRequest);
    }

    // Fonction pour récupérer les données d'un utilisateur 
    function getSingleUserInfo(string $username){
        $sqlRequest = "SELECT * FROM user where username ='$username'";
        return $this->getRequest($sqlRequest);
    }

    // Fonction pour ajouter un utilisateur à la base de données
    function addNewUser(array $userInfo){
        // requête sql
        $sqlRequest = "INSERT INTO `user`(`username`, `password`, `firstName`, `lastName`, `meansOfContact`, `contactInfo`, `userImagePath`) VALUES (:username, :password, :firstName, :lastName, :meansOfContact, :contactInfo, :userImagePath)";

        // lancement de la requête et retour d'un boolean
        return $this->blnRequest($sqlRequest, $userInfo);
    }

    // Fonction pour modifier la photo de profil d'un utilisateur
    function editUserImage(array $neededData){
        $sqlRequest = "UPDATE `user` SET `userImagePath` = :path  WHERE username = :username";
        return $this->blnRequest($sqlRequest, $neededData);
    }

    // Fonction pour modifier le mot de passe d'un utilisateur
    function changeUserPassword(array $neededData){
        $sqlRequest = "UPDATE `user` SET `password` = :password  WHERE username = :username";
        return $this->blnRequest($sqlRequest, $neededData);
    }

    /////////////////// Livres ///////////////////

    // Fonction pour ajouter un livre à la base de données
    function addBook(array $bookInfo){
        $sqlRequest = "INSERT INTO `book`(`title`, `editor`, `language`, `releaseYear`, `releaseDate`, `genre`, `bookImagePath`, `price`,`sold`) VALUES (:title, :editor, :language, :releaseYear, :releaseDate, :genre, :bookImagePath, :price, :sold)";
        return $this->blnRequest($sqlRequest, $bookInfo);
    }

    function addtoSellsTable($sellerInfo){
        $sqlRequest = "INSERT INTO `sells`(`username`, `idBook`) VALUES (:username, :idBook)";
        return $this->blnRequest($sqlRequest, $sellerInfo);
    }

    // Fonction pour donner un identifiant au livre qui vient d'être créé
    function getBookTableLength(){
        $sqlRequest = "SELECT COUNT(*) FROM book";
        return $this->getRequest($sqlRequest);
    }

    // Fonction pour récupérer les données d'un livre 
    function getBookData($id){
        $sqlRequest = "SELECT * FROM book NATURAL JOIN sells WHERE book.idBook ='$id'";
        return $this->getRequest($sqlRequest);
    }
}
?>