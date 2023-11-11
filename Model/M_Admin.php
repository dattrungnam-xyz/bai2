<?php
include_once("E_Admin.php");
class Model_Admin
{
    public $connection;
    public function __construct()
    {
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "dulieu2");
        $this->connection = $connection;
    }
    public function login($username,$password)
    {
        $sql = "SELECT * FROM admin WHERE Username = '"  . $username .  "'";
        $result = false;
        $Username = "";
        $Id = "";
        $rs = mysqli_query($this->connection, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            if ($row['Password'] == $password) {
                $result = true;
                $Id = $row['Id'];
                $Username = $row['Username'];
                break;
            }
        }
        if ($result == true) {
            session_start();
            $_SESSION['Login'] = true;
            $_SESSION['Username'] = $Username;
            $_SESSION['Id'] = $Id;

        }
        return $result;
    }
    
}
