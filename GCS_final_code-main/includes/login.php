<?php
include 'config.php';


class login extends database{

    public function signin($email, $password)
    {
        $sql = "SELECT * from esef_users where UserID=:email && Password=:password";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $count =  $stmt->rowCount();
        return $count;
    }
    public function signinAutoId($email, $password)
    {
        $sql = "SELECT AutoID from esef_users where UserID=:email && Password=:password";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $count =  $stmt->fetch();
        return $count;
    }
    public function fetch_user_SchoolCode($email)
    {
        $sql = "SELECT SchoolCode from esef_users where UserID=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user_fetched = $stmt->fetch();
        return $user_fetched['SchoolCode'];
    }
    public function stepForward($db,$SchoolCode)
    {
        $sql = "SELECT * from :db where SchoolCode=:SchoolCode";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['db' => $db, 'SchoolCode' => $SchoolCode]);
        return $stmt->rowCount();
    }
    public function password_update_check($SchoolCode)
    {
        $sql = "SELECT * from esef_users where SchoolCode=:SchoolCode AND updated='0'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['SchoolCode' => $SchoolCode]);
        $count =  $stmt->rowCount();
        return $count;
        
    }
    public function role_update_check($UserID)
    {
        $sql = "SELECT *  FROM `esef_users` eu INNER JOIN esef_district ed on ed.DistrictName = eu.District where UserID=:UserID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['UserID' => $UserID]);
        $count =  $stmt->fetch();
        return $count;
        
    }
}

?>