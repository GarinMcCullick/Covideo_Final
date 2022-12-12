<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Covideo Games</title>
</head>
<?php
include './models/db.php';
$pdo = pdo_connect_mysql(); //pdo connect
$request = $_SERVER['REQUEST_URI']; //getting file view name from url

//if uri (url) comes back with "page name" and a file exists it sets associative array value to the correct page which then displays in the index body.
//had to do it this way instead of switch statement so that stylesheet only needs referenced in the index.php file
if (strpos($_SERVER['REQUEST_URI'], "/") !== false) {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'Index';
} else if (strpos($_SERVER['REQUEST_URI'], "cart") !== false) {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'cart';
} else {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
}

?>

<body>
    <?php include "./views/" . $page . '.php'; ?>

</body>

</html>