<?php
class Cust
{
    static function AddOrder()
    {

        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("INSERT INTO `customers`(`custName`, `custEmail`,`consoleID`) VALUES ( :name, :email,:consoleID)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':consoleID', $consoleID);
        $name = $_GET['fName'];
        $email = $_GET['email'];
        $consoleID = $_GET['consoleID'];
        $stmt->execute();
    }
    static function Purchases()
    {
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare("INSERT INTO `purchases`(`customerID`, `consoleID`) VALUES ( :customerID, :consoleID)");
        $stmt->bindParam(':customerID', $customerID);
        $stmt->bindParam(':consoleID', $consoleID);
        $consoleID = $_POST['consoleID'];
        $customerID = $customerID['customerID'];
        $stmt->execute();
    }
    static function AllOrders()
    {
        global $orders;
        require_once "./models/db.php";
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM customers');
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
}
