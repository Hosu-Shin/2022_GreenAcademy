<?php
namespace application\models;
use PDO;


//$pdo -> lastInsertId();

class UserModel extends Model {
    public function insUser(&$param) {
        $sql = "INSERT INTO t_user
                ( email, pw, nm ) 
                VALUES 
                ( :email, :pw, :nm )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $param["email"]);
        $stmt->bindValue(":pw", $param["pw"]);
        $stmt->bindValue(":nm", $param["nm"]);
        $stmt->execute();
        return $stmt->rowCount();

    }
    public function selUser(&$param) {
        $sql = "SELECT * FROM t_user
                WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $param["email"]);        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        //false를 return함
    }

    public function selUserProfile(&$param) {
        $feediuser = $param [ "feediuser"];
        $loginuser = $param [ "loginiuser"];
        $sql = "SELECT iuser, email, nm, cmt, mainimg,
                ( SELECT COUNT(ifeed) FROM t_feed WHERE iuser = {$feediuser} ) AS feedCnt,
                (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = {$feediuser} AND toiuser = {$loginuser}) AS youMe,
                (SELECT COUNT(fromiuser) FROM t_user_follow WHERE fromiuser = {$loginuser} AND toiuser = {$feediuser}) AS meYou 
                FROM t_user
                WHERE iuser = {$feediuser}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
}