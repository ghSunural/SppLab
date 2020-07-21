<?php

namespace Application\Databases;

//MP mapping
use Application as A;

use PDO;
use user\models\TUser;
use user\models\TUserFactory;

class MPUsers
{
    // database connection and table name
    //private static $link = DB_connection::$link_1;
    public static $tableName = 'TUsers';
    public static $viewName = 'VUsers';

    // object properties
    public $id;


    public static function add(TUser $user)
    {
        //INSERT POST
        //  echo $user;
        $link = DBManager::getLinkWith(DBManager::$DB1);
        //$surname, $firstName, $login, $passwordHash, $email, $ref_role_id

        $Surname = $user->getSurname();
        $firstName = $user->getFirstName();
        $login = $user->getLogin();
        $passwordHash = $user->getPasswordHash();
        $email = $user->getEmail();


        $sql = "SELECT ID FROM `TRolesList` WHERE roleAcronym = 'UEXT'";
       // echo $sql."<br>";
        $ref_role_id = 2;
            //ORM::sqlQuery(DBManager::$DB1, $sql, PDO::FETCH_ASSOC);
       // A\Debug::print_array(ORM::sqlQuery(DBManager::$DB1, $sql, PDO::FETCH_ASSOC), "sql query");

        $query = 'INSERT INTO ' . self::$tableName . '
                   (surname, firstName, login, passwordHash, email, ref_role_id)
                   VALUES(:surname, :firstName, :login, :passwordHash, :email, :ref_role_id)                    
                    ';
        $stmt = $link->prepare($query);
        //,

        // posted values
        //$order_id = htmlspecialchars(strip_tags($order_id));

        // bind values
        $stmt->bindParam(':surname', $Surname);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':passwordHash', $passwordHash);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ref_role_id', $ref_role_id);

        return $stmt->execute();
    }


    public static function read($login)
    {
        $link = DBManager::getLinkWith(DBManager::$DB1);
        //SELECT GET


        $sql = 'SELECT * FROM ' . self::$tableName . ' WHERE login =  ' . '"'.$login.'"';
       // echo $sql;
        $stmt = $link->prepare($sql);
        // $stmt->bindParam(':login', $login);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        //$user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $user = $stmt->fetch();


     // while ($user = $stmt->fetch()) {
        //   array_push($users, $user);
     //  }


        // A\Debug::print_array($rows);
        A\Debug::print_array($user);
        return $user;
    }


    public static function readAll()
    {
        $link = DBManager::getLinkWith(DBManager::$DB1);
        //SELECT GET
        $users = array();

        $sql = 'SELECT * FROM ' . self::$viewName;
        $stmt = $link->prepare($sql);
        // $stmt->bindParam(':login', $login);
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_OBJ);



      //  A\Debug::print_array($user);

        $userObj = TUserFactory::createEmptyUser();
        $userObj->setSurname = $res->Surname;
       /* $userObj->setFirstName = ($user['surname']);
        $userObj->setLogin = ($user['surname']);
        $userObj->setEmail = ($user['surname']);
        $userObj->setRole = ($user['role']);*/
/*
        $userObj->setSurname($user['surname']);
        $userObj->setFirstName($user['surname']);
        $userObj->setLogin($user['surname']);
        $userObj->setEmail($user['surname']);
        $userObj->setRole($user['role']);
*/
        return $userObj;
    }

    public function update()
    {
        // UPDATE PUT
    }

    public static function delete($login)
    {

        $link = DBManager::getLinkWith(DBManager::$DB1);
        //DELETE DELETE
        $sql = 'DELETE FROM ' . self::$tableName . ' WHERE login =  :login';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':login', $login);

        $stmt->execute();

    }


    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $link = DBManager::getLinkWith(DBManager::$DB1);

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $link->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }

        return false;
    }
}
