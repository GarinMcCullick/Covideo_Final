<?php
$_SESSION['custName'] = $_GET['fName']; //setting form data to session data to store
$_SESSION['custEmail'] = $_GET['email'];
include "./controllers/ProductController.php";
include './controllers/custController.php';
if ($_GET['consoleID'] = 1) {
    call_user_func('Products::deleteProductByOrderPlaystation');
} else if ($_GET['consoleID'] = 0) {
    call_user_func('Products::deleteProductByOrderSwitch');
} else if ($_GET['consoleID'] = 2) {
    call_user_func('Products::deleteProductByOrderXbox');
}
call_user_func('Cust::AddOrder');

?>
<script>
    setTimeout(function() { //js timeout function
        window.location.href = 'http://localhost/Covideo_Final/'; // the redirect goes here

    }, 6000); //6 sec delay
    function countDown(secs, elem) {

        var element = document.getElementById(elem);

        element.innerHTML = "if you have not been re-directed after " + secs + ' seconds please click <a href="http://localhost/Covideo_Final/"> here </a>';


        secs--;

        var timer = setTimeout('countDown(' + secs + ',"' + elem + '")', 1000);

    }
</script>



</script>
<section class="product-section">
    <span class="product-success-container">
        <h1>Thank You for your Purchase!</h1>
        <p id="status">
            <script>
                countDown(6, "status")
            </script>
        </p>
        <svg class="hiThere" xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
        </svg>
    </span>
</section>