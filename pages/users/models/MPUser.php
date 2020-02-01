<?php

namespace Application\Databases;

//MP mapping
use Application as A;
use Application\DB_connection;
use PDO;
use user\models\TUser;

class MPUser
{
    // database connection and table name
    //private static $link = DB_connection::$link_1;
    public static $tableName = 'TUsers';
    public static $viewName = 'VUsers';

    // object properties
    public $id;
    public $order_id;
    public $product_id;
    public $quantity;

    public static function create($link, TUser $user)
    {
        //INSERT POST
        // insert query

        //$surname, $firstName, $login, $passwordHash, $email, $ref_role_id

        $query = 'INSERT INTO '.self::$tableName.'
                   (surname, firstName, login, passwordHash, email, ref_role_id)
                   VALUES(:surname, :firstName, :login, :passwordHash, :email, :ref_role_id)                    
                    ';
        $stmt = $link->prepare($query);

        // posted values
        //$order_id = htmlspecialchars(strip_tags($order_id));

        // bind values
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_INT);
        $stmt->bindParam(':firstName', $user->getFirstName(), PDO::PARAM_INT);
        $stmt->bindParam(':login', $user->getLogin(), PDO::PARAM_INT);
        $stmt->bindParam(':passwordHash', $user->getPasswordHash(), PDO::PARAM_INT);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_INT);
        $stmt->bindParam(':ref_role_id', $user->getRole(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function readAll($link)
    {
        //SELECT GET
        $users = array();

        $sql = 'SELECT * FROM '.self::$viewName;
        $stmt = $link->prepare($sql);
        // $stmt->bindParam(':login', $login);
        $stmt->execute();

        //$user = $stmt->fetchAll(PDO::FETCH_OBJ);

        while ($user = $stmt->fetch()) {
            array_push($users, $user);
        }
        // A\Debug::print_array($rows);
        return $users;
    }

    public function update()
    {
        // UPDATE PUT
    }

    public static function delete($link, $login)
    {

        //DELETE DELETE
        $sql = 'DELETE FROM '.self::$tableName.'WHERE login =  :login';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':login', $login);

        $stmt->execute();
    }
}
