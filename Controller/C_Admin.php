<?php
include_once("../Model/M_Admin.php");
class Ctrl_Admin
{
    public function __construct()
    {
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
                $modelAdmin = new Model_Admin();
                $rs = $modelAdmin->login($_REQUEST["username"], $_REQUEST["password"]);
                if ($rs == true) {
                    header('Location:../View/Index.php');
                } else {
                    header("Location:C_Admin.php");
                }
            }
        } else {
            include_once("../View/Form_Login.php");
        }
    }
    public function logout()
    {
        session_start();
        session_unset();
        header('Location:../View/Index.php');
    }
}

$C_Admin = new Ctrl_Admin();
if (isset($_GET["mod1"])) {
    $C_Admin->logout();
} else {
    $C_Admin->login();
}
