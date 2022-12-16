<?php
class Admin
{
    static function AdminAuth()
    {
        isset($_SESSION['password']);
        isset($_POST['password']);
        //just hard coded password here instead of making new table in db.
        if ($_SESSION['password'] == 'password') {
            return $_SESSION['auth'] = 'authed';
        } else {
            return $_SESSION['auth'] = 'not-authed';
        }
    }
    static function Logout()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['password']);
        session_destroy();
        header('Location: http://localhost/Covideo_Final/');
    }
}
