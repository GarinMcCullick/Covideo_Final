<?php

class Products
{
    function getProductByID()
    {
        global $product;
        require_once "./models/db.php"; //requiring models inside function because $pdo has already been declared in there
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles WHERE consoleID = ?'); // get specified product from db
        $stmt->execute([$_GET['id']]);

        $product = $stmt->fetch(PDO::FETCH_ASSOC); // returns as array

        if (!$product) { //making sure product id exists else error
            exit('Product does not exist!');
        }
    }
}
