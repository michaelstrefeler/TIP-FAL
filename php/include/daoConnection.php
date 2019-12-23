<?php 
class DaoConnection
{
    function dbOpenConnection()
    {
        $connector = null;
        try
        {
            $connector = new PDO('mysql:host=localhost;dbname=db_books' , 'root', '');
            $connector->exec("SET CHARACTER SET utf8");
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $connector;
    }

    function dbCloseConnection(){
        $disconnect = new DaoConnection();
        $disconnect->dbOpenConnection();
        $disconnect = null;
    }
}
?>