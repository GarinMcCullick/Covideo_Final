<?php
class ReleaseTimes
{

    static function xboxReleaseTime()
    {
        $pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM consoles');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetching all table data and putting into associative array

        date_default_timezone_set('America/Los_Angeles');
        $setDate = $products[0]['consoleRelease'];
        $current = new DateTime('');
        $interval = $setDate->diff($current);
        //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds')
        if ($interval < 0) {
            $before = $setDate;
            return $before;
        } else {
            $after = $setDate;
            return $after;
        }
    }
}
