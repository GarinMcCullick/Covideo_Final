<?php
require "./controllers/ProductController.php";
// check url for id and calling get product id function
if (isset($_GET['id'])) {
    $call = new Products;
    $call->getProductByID();
}
echo $_GET['id'];
?>
<section class="product-section">
    <h2><?php echo $product['consoleName'] ?></h2>
    <img src=<?php echo '"./assets/images/' . $product['consoleImg'] . '.jpg"'; ?>}>
    <p><?php echo 'Quantity in Stock: ' . $product['consoleInventory']; ?></p>
    <form action="./successPage.php" method="POST">
        <label for="fName">First Name</label>
        <input id="fName" name="fName">
        <label for="email">Email</label>
        <input id="email" name="email">
        <input type="hidden">
        <input type="submit" value="Purchase">
    </form>
</section>