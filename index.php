<?php
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = 'random';
}
if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = 'random';
}
if (!isset($_SESSION['custName'])) {
    $_SESSION['custName'] = 'random';
}
if (!isset($_SESSION['custEmail'])) {
    $_SESSION['custEmail'] = 'random';
}
?>
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
include './controllers/LoginController.php';
$pdo = pdo_connect_mysql(); //pdo connect
$request = $_SERVER['REQUEST_URI']; //getting file view name from url

call_user_func('Admin::AdminAuth');
//if uri (url) comes back with "page name" and a file exists it sets associative array value to the correct page which then displays in the index body.
//had to do it this way instead of switch statement so that stylesheet only needs referenced in the index.php file
if (strpos($_SERVER['REQUEST_URI'], "successPage") !== false) {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'successPage';
} else if (strpos($_SERVER['REQUEST_URI'], "product") !== false) {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'product';
} else if (strpos($_SERVER['REQUEST_URI'], "admin") !== false || $_SESSION['auth'] == 'authed') {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'adminPanel';
} else if (strpos($_SERVER['REQUEST_URI'], "edit") !== false || $_SESSION['auth'] == 'authed') {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'edit';
} else if (strpos($_SERVER['REQUEST_URI'], "admin") !== false || $_SESSION['auth'] == 'not-authed') {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'Index';
} else {
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'Index';
}

?>

<body>
    <?php
    include "./views/" . $page . '.php';
    ?>

</body>

</html>