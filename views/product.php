<?php
require_once "./controllers/ProductController.php";
// check url for id and calling get product id function
if (isset($_GET['id'])) {
    $call = new Products;
    $call->getProductByID();
} else {
    header('Location: http://localhost/Covideo_Final/');
}

?>
<section class="product-section">
    <h2><?php echo $product['consoleName'] ?></h2>
    <img src=<?php echo '"./assets/images/' . $product['consoleImg'] . '.jpg"'; ?>}>
    <p><?php echo 'Quantity in Stock: ' . $product['consoleInventory']; ?></p>
    <form action="successPage.php" method="GET">
        <label for="fName">First Name</label>
        <input type="name" id="fName" name="fName" value="<?php echo $_SESSION['custName']; ?>" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['custEmail']; ?>" required>
        <input type="hidden" name="consoleID" value="<?php print_r($product['consoleID']) ?>">
        <input type="submit" class="greenButton" value="Purchase">
    </form>
</section>