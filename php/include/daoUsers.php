<?php 
class DaoUsers
{
    function getAllUsers($connector){
        $query = "SELECT * FROM user";

        $req = $connector->prepare($query);
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);

        $req->closeCursor();

        return $users;
    }
}
?>