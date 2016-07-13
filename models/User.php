<?php

class User
{
    public static function getUser($id_user)
    {
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Users` WHERE id_user = '{$id_user}'";
        $result = $db->query($statements);
        return $result->fetch();
    }

    public static function registerUser($user)
    {
        $db = Database::getInstance();

        $unm = $user['user_name'];
        $fnm = $user['first_name'];
        $lnm = $user['last_name'];
        $pswd = $user['password'];
        $email = $user['email'];

        $stmt = $db->prepare("INSERT INTO Users ( user_name, first_name, last_name, password, email)"
                            . "VALUES ( :user_name, :first_name, :last_name, :password, :email)");

        $stmt->bindParam(':user_name', $unm);
        $stmt->bindParam(':first_name', $fnm);
        $stmt->bindParam(':last_name', $lnm);
        $stmt->bindParam(':password', $pswd);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
    }

    public static function auth($id_user)
    {
        $_SESSION['user'] = $id_user;
        return true;
    }

    public static function checkName($name)
    {
        if(strlen($name) <= 20 && strlen($name) >= 3)
        {
            return true;
        }
    }

    public static function checkUserName($user_name)
    {
        if(strlen($user_name) >= 20 || strlen($user_name) <= 3)
        {
            return false;
        }
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Users` WHERE user_name = :user_name";
        $result = $db->prepare($statements);
        $result->bindParam(':user_name', $user_name);
        $result->execute();
        $user = $result->fetch();
        if($user)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function checkEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Users` WHERE email = :email";
        $result = $db->prepare($statements);
        $result->bindParam(':email', $email);
        $result->execute();
        $user = $result->fetch();
        if($user)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public static function checkUser($email, $password)
    {
        $db = Database::getInstance();
        $statements = "SELECT * FROM `Users` WHERE email = :email AND password = :password";
        $result = $db->prepare($statements);
        $result->bindParam(':email', $email);
        $result->bindPAram(':password', $password);
        $result->execute();
        $user = $result->fetch();
        if($user)
        {
            return $user['id_user'];
        }
        else
        {
            return false;
        }
    }

    public static function checkPass($pswd, $pswdr)
    {
        if($pswd === $pswdr && strlen($pswd) >= 4 && strlen($pswd) <= 30)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function logged()
    {
        if( !empty($_SESSION['user']) )
        {
            return $_SESSION['user'];
        }
        return false;
    }
}


