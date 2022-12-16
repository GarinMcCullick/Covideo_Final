<?php

class Products
{
    function getProducts()
    {
        global $products;
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    function getProductByID()
    {
        global $product;
        require_once "./models/db.php"; //requiring models inside function because $pdo has already been declared in there
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles WHERE consoleID = ?'); // get specified product from db
        $stmt->execute([$_GET['id']]);

        $product = $stmt->fetch(PDO::FETCH_ASSOC); // returns as array

        function function_alert($message) //this is just a function to put a javascript error alert
        {

            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }

        if (!$product) { //making sure product id exists else error
            function_alert("Sorry product was not found (no product id in url) Accept to Redirect...");
            header('Refresh: 0; url=http://localhost/Covideo_Final/'); //this will redirect if no product id is found after giving an alert
        }
    }
    static function deleteProductByOrderXbox()
    {
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('UPDATE consoles SET consoleInventory = consoleInventory - 1 WHERE consoleID = 2');
        $stmt->execute();
    }
    static function deleteProductByOrderPlaystation()
    {
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('UPDATE consoles SET consoleInventory = consoleInventory - 1 WHERE consoleID = 1');
        $stmt->execute();
    }
    static function deleteProductByOrderSwitch()
    {
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('UPDATE consoles SET consoleInventory = consoleInventory - 1 WHERE consoleID = 0');
        $stmt->execute();
    }
}
