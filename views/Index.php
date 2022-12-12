<?php
$stmt = $pdo->prepare('SELECT * FROM consoles');
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array
require_once './controllers/IndexView.php';
?>
<h1>Welcome to Covideo Games!</h1>
<section>
    <div>
        <h2><?php echo $products[1]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[1]['consoleImg'] . '.jpg"'; ?>>
        <p>
            <?php
            call_user_func('ReleaseTimes::xboxReleaseTime');
            ?>
        </p>
        <a><button>Purchase</button></a>
    </div>
    <div>
        <h2><?php echo $products[0]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[0]['consoleImg'] . '.jpg"'; ?>>
        <p>
            <?php echo $products[0]['consoleRelease']; ?>
        </p>
        <a><button>Purchase</button></a>

    </div>
    <div>
        <h2><?php echo $products[2]['consoleName']; ?></h2>
        <img src=<?php echo '"./assets/images/' . $products[2]['consoleImg'] . '.jpg"'; ?>>
        <p>
            Timer
        </p>
        <a><button>Purchase</button></a>
    </div>
</section>