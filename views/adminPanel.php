<?php
isset($_SESSION['password']);
if ($_SESSION['password'] !== 'password') {
    header('Location: http://localhost/Covideo_Final/'); //protects against typing in the url path
}


/*if ($_POST['password'] !== 'password') {
    header('Location: http://localhost/Covideo_Final/'); //protects against typing in the url path
}*/
include './controllers/custController.php';
include './controllers/ProductController.php';
$products = new Products;
$products->getProducts(); //getting all products and information

// check url for id and calling get product id function
if (isset($_GET['id'])) {
    $call = new Products;
    $call->getProductByID();
}

if (isset($_POST['logout'])) {
    call_user_func('Admin::Logout'); //calling logout function if logout button is pressed
}
call_user_func('Cust::AllOrders'); //getting all orders
?>
<form action="" method="POST"><input name="logout" type="Submit" value="Logout" class="logout"></form>


<section class="admin-section">

    <h1 class="admin-h1">Admin panel</h1>
    <div class="admin-container">
        <div class="admin-left">
            <h2>Edit Consoles</h2>
            <div>
                <span>
                    <?php echo '<a href="./edit.php?id=' . $products[0]['consoleID'] . '"><button class="greenButton">Edit</button></a>'; ?>
                    <p><?php echo $products[0]['consoleName']; ?></p>
                    <p>Qty: &nbsp;<?php echo $products[0]['consoleInventory']; ?></p>
                </span>
                <span>
                    <?php echo '<a href="edit.php?id=' . $products[1]['consoleID'] . '"><button class="greenButton">Edit</button></a>'; ?>
                    <p><?php echo $products[1]['consoleName']; ?></p>
                    <p>Qty: &nbsp;<?php echo $products[1]['consoleInventory']; ?></p>
                </span>
                <span>
                    <?php echo '<a href="/Covideo_Final/edit.php?id=' . $products[2]['consoleID'] . '"><button class="greenButton">Edit</button></a>'; ?>
                    <p><?php echo $products[2]['consoleName']; ?></p>
                    <p>Qty: &nbsp;<?php echo $products[2]['consoleInventory']; ?></p>
                </span>
            </div>
        </div>
        <div class="admin-left">
            <h2>Customer Orders</h2>
            <div>
                <span>
                    <p><?php echo $orders[0]['custName']; ?></p>
                    <p><?php echo $orders[0]['custEmail']; ?></p>
                    <P></P>
                </span>
            </div>
        </div>
    </div>
</section>