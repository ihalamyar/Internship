<?php
 session_start();
 ob_start();
class Middleware
{
    public function loggedIn()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: /');
        }
    }
    public function isLoggedIn()
    {
        if (isset($_SESSION['loggedin'])) {
            header('Location: /../../../public/dashboard/dashboard.php');
        }
    }
}
