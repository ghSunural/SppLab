<?php

class MPUser
{

    // database connection and table name
    private $link = ;
    private $tableName = "TUsers";

    // object properties
    public $id;
    public $order_id;
    public $product_id;
    public $quantity;


    public function create($surname, $firstName, $login, $passwordHash, $email, $ref_role_id)
    {
        //INSERT POST
        // insert query
        $query = "INSERT INTO " . $this->tableName . "
                    SET order_id=:order_id, product_id=:product_id, quantity=:quantity";


        $stmt = $this->conn->prepare($query);

        // posted values
        $order_id = htmlspecialchars(strip_tags($order_id));



        // bind values
        $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $product_id, PDO::PARAM_INT);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);

        return ($stmt->execute());


    }

    public function read()
    {
        //SELECT GET

    }

    public function update()
    {
        // UPDATE PUT

    }

    public function delete()
    {
        //DELETE DELETE

    }


}

?>