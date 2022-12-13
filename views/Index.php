<?php
$stmt = $pdo->prepare('SELECT * FROM consoles');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array
require_once './controllers/IndexController.php';
?>
<div class="banner">
    <h1>Welcome to Covideo Games!</h1>
    <form class="adminSignIn">
        <label for="adminPassword">Admin:</label>
        <input type="password" id="adminPassword" name="adminPassword">
        <input type="submit" name="submit" value="Login">
    </form>
</div>
<section>
    <div>
        <h2><?php echo $products[1]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[1]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::playstationReleaseTime'); ?>
            Releases:
            <!--call back function-->
        </h3>
        <?php
        if (isset($beforePlaystation)) { //checking if variable isset if so goes through if statement to determine button
            echo   '<p>' . $beforePlaystation . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterPlaystation)) {
            echo    '<p>' . $afterPlaystation . '</p>' . '<a><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterPlaystation;
        }
        ?>
    </div>
    <div>
        <h2><?php echo $products[0]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[0]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::xboxReleaseTime'); ?>
            Releases:
        </h3>
        <?php
        if (isset($beforeXbox)) {
            echo '<p>' . $beforeXbox . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterXbox)) {
            echo  '<p>' . $afterXbox . '</p>' . '<a><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterXbox;
        }
        ?>
    </div>
    <div>
        <h2><?php echo $products[2]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[2]['consoleImg'] . '.jpg"'; ?>>
        <h3>
            <?php call_user_func('ReleaseTimes::switchReleaseTime'); ?>
            Releases:
        </h3>
        <?php
        $consoleID = $products[2]['consoleID'];
        if (isset($beforeSwitch)) {
            echo   '<p>' . $beforeSwitch . '</p>' . '<a><button class="greyButton">Purchase</button></a>';
        } else if (isset($afterSwitch)) {
            echo  '<p>' . $afterSwitch . '</p>' . '<a href="product.php?id=' . $consoleID . '"><button class="greenButton">Purchase</button></a>';
        } else {
            echo 'unavailable' . $afterSwitch;
        }
        ?>
    </div>
</section>