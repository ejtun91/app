<?php

function connect_to_db()
{
    // DSN - the Data Source Name - requred by the PDO to connect
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    // attempt to create a connection to the database
    try {
        $connection = new \PDO($dsn, DB_USER, DB_PASS);
    } catch (\PDOException $e) {
        // deal with connection error
        print 'ERROR - there was a problem trying to create DB connection' . PHP_EOL;
        return null;
    }

    return $connection;
}

function get_all_products($connection)
{
    // SQL query
    $sql = 'SELECT * FROM products';

    // execute query and collect results
    $statement = $connection->query($sql);
    $products = $statement->fetchAll();

    return $products;
}

function get_all_users($connection)
{
    // SQL query
    $sql = 'SELECT * FROM users';

    // execute query and collect results
    $statement = $connection->query($sql);
    $users = $statement->fetchAll();

    return $users;
}

function get_one_product($id)
{
    $connection = connect_to_db();

    $sql = "SELECT * FROM products WHERE id=$id";
    $statement = $connection->query($sql);

   // $statement->execute();


    if ($row = $statement->fetch()) {
        return $row;
    } else {
        return null;
    }


}

function get_one_user($id)
{
    $connection = connect_to_db();
    $sql = "SELECT * FROM users WHERE id=$id";
    $statement = $connection->query($sql);

    if ($row = $statement->fetch()) {
        return $row;
    } else {
        return null;
    }
}



function delete_product($connection, $id)
{
    $sql = "DELETE FROM products WHERE id=$id";

    $numRowsAffected = $connection->exec($sql);

    if($numRowsAffected > 0){
        $queryWasSuccessful = true;
    } else {
        $queryWasSuccessful = false;
    }

    return $queryWasSuccessful;
}

function update_product($connection, $id, $description, $price)
{
    $sql = "UPDATE products SET description = '$description', price = $price WHERE id=$id";

    $numRowsAffected = $connection->exec($sql);

    // can set Boolean variable in a single statement
    // 	$queryWasSuccessful = ($numRowsAffected > 0);

    if($numRowsAffected > 0){
        $queryWasSuccessful = true;
    } else {
        $queryWasSuccessful = false;
    }

  //  print_r($connection->errorInfo());

    return $queryWasSuccessful;
}

function change_password($connection, $id, $username, $password, $email){

    $sql = "UPDATE users SET username = '$username', password = '$password', email = '$email' WHERE id=$id";

    $result = $connection->exec($sql);

    if($result > 0){
        $result = true;
    } else {
        $result = false;
    }



    return $result;

}

function create_product($connection,$title, $product_category_id, $description, $price, $product_image, $stock, $restock)
{
    $sql = "INSERT into products (product_title, product_category_id, description, price, image, stockQuantity, restockQuantity) VALUES ('$title', 1, '$description', $price, '$product_image', 100, 100)";

    $numRowsAffected = $connection->exec($sql);

    // can set Boolean variable in a single statement
    // 	$queryWasSuccessful = ($numRowsAffected > 0);

    if($numRowsAffected > 0){
        $queryWasSuccessful = true;
    } else {
        $queryWasSuccessful = false;
    }

    //print_r($connection->errorInfo());


    return $queryWasSuccessful;
}




