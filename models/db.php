<?php
//////////////////////////////////////////////////////////////////////
/*connecting database*/
function pdo_connect_mysql()
{
    // setting db name and password
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'covideodb';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) { //catches errors and returns error
        exit('Failed to connect to database!');
    }
}
