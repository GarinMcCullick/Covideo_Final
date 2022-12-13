<?php
class ReleaseTimes
{

    static function xboxReleaseTime()
    {
        global $afterXbox;
        global $beforeXbox;
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array
        date_default_timezone_set('America/Los_Angeles');
        $setDate = $products[0]['consoleRelease'];
        $current = date('m/d/Y h:i:s', time());
        $currentTime = strtotime($current);
        $setTime = strtotime($setDate);
        $format = date(' m/d/Y @ h:i a', $setTime);
        $inventory = $products[0]['consoleInventory'];
        if ($currentTime < $setTime && $inventory <= 0) {
            $beforeXbox = $format;
            return $beforeXbox;
        } else if ($currentTime < $setTime && $inventory >= 0) {
            $beforeXbox = $format;
            return $beforeXbox;
        } else if ($currentTime > $setTime && $inventory <= 0) {
            $beforeXbox = 'out of stock ' . $inventory . ' left';
            return $beforeXbox;
        } else {
            $afterXbox = $format;
            return $afterXbox; //returning the set date but with different varibales. then in the view depending on varible returned will toggle clickable button.
        }
    }
    static function playstationReleaseTime()
    {
        global $afterPlaystation;
        global $beforePlaystation;
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array

        date_default_timezone_set('America/Los_Angeles');
        $setDate = $products[1]['consoleRelease'];
        $current = date('m/d/Y h:i:s', time());
        $currentTime = strtotime($current);
        $setTime = strtotime($setDate);
        $format = date(' m/d/Y @ h:i a', $setTime);
        $inventory = $products[0]['consoleInventory'];
        if ($currentTime < $setTime && $inventory <= 0) {
            $beforePlaystation = $format;
            return $beforePlaystation;
        } else if ($currentTime < $setTime && $inventory >= 0) {
            $beforePlaystation = $format;
            return $beforePlaystation;
        } else if ($currentTime > $setTime && $inventory <= 0) {
            $beforePlaystation = 'out of stock ' . $inventory . ' left';
            return $beforePlaystation;
        } else {
            $afterPlaystation = $format;
            return $afterPlaystation; //returning the set date but with different varibales. then in the view depending on varible returned will toggle clickable button.
        }
    }
    static function switchReleaseTime()
    {
        global $afterSwitch;
        global $beforeSwitch;
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array

        date_default_timezone_set('America/Los_Angeles');
        $setDate = $products[2]['consoleRelease'];
        $current = date('m/d/Y h:i:s', time()); //string format
        $currentTime = strtotime($current);
        $setTime = strtotime($setDate);
        $format = date(' m/d/Y @ h:i a', $setTime);
        $inventory = $products[2]['consoleInventory'];
        if ($currentTime < $setTime && $inventory <= 0) {
            $beforeSwitch = $format;
            return $beforeSwitch;
        } else if ($currentTime < $setTime && $inventory >= 0) {
            $beforeSwitch = $format;
            return $beforeSwitch;
        } else if ($currentTime > $setTime && $inventory <= 0) {
            $beforeSwitch = 'out of stock ' . $inventory . ' left';
            return $beforeSwitch;
        } else {
            $afterSwitch = $format;
            return $afterSwitch; //returning the set date but with different varibales. then in the view depending on varible returned will toggle clickable button.
        }
    }
}
