<?php
$stmt = $pdo->prepare('SELECT * FROM consoles');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array
require_once './controllers/IndexController.php';
$password = isset($_POST['password']);
if ($password) {
    $_SESSION['password'] = $_POST['password'];
    header('location: http://localhost/Covideo_Final/adminPanel.php'); //since i'm setting session password here i'm redirecting to the admin page rather than in the action of my form
}

?>
<div class="banner">
    <h1>Welcome to Covideo Games!</h1>
    <form class="adminSignIn" action="" method="POST">
        <label for="password">Admin:</label>
        <input type="password" id="password" name="password">
        <!--setting admin password to $_POST['password'] then verifying $_POST['password'] in logincontroller-->
        <input type="Submit" name="submit" value="Login">
    </form>
</div>
<section class="index-section">
    <div class="index-div">
        <h2><?php echo $products[1]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[1]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::playstationReleaseTime'); ?>
            Releases:
            <!--call back function-->
        </h3>
        <?php
        $playstationID = $products[1]['consoleID'];
        if (isset($beforePlaystation)) { //checking if variable isset if so goes through if statement to determine button
            echo   '<p>' . $beforePlaystation . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterPlaystation)) {
            echo    '<p>' . $afterPlaystation . '</p>' . '<a href="product.php?id=' . $playstationID . '"><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterPlaystation;
        }
        ?>
    </div>
    <div class="index-div">
        <h2><?php echo $products[0]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[0]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::xboxReleaseTime'); ?>
            Releases:
        </h3>
        <?php
        $xboxID = $products[0]['consoleID'];
        if (isset($beforeXbox)) {
            echo '<p>' . $beforeXbox . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterXbox)) {
            echo  '<p>' . $afterXbox . '</p>' . '<a href="product.php?id=' . $xboxID . '"><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterXbox;
        }
        ?>
    </div>
    <div class="index-div">
        <h2><?php echo $products[2]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[2]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::switchReleaseTime'); ?>
            Releases:
        </h3>
        <?php
        $switchID = $products[2]['consoleID'];
        if (isset($beforeSwitch)) {
            echo   '<p>' . $beforeSwitch . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterSwitch)) {
            echo  '<p>' . $afterSwitch . '</p>' . '<a href="product.php?id=' . $switchID . '"><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterSwitch;
        }
        ?>
    </div>
</section>