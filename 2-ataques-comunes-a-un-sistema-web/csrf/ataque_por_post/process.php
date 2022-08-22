<?php
session_set_cookie_params([
    'secure' => true,
    'samesite' => 'None'
]);
session_start();
switch($_GET["action"]) {
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = (isset($_POST["user"])) &&
            ctype_alnum($_POST["user"]) ? $_POST["user"] : null;
            $pass = (isset($_POST["pass"])) ? $_POST["pass"] : null;
            $salt = '$2a$07$my.salt.mUy.Secr3t0';

        if (isset($user, $pass) && (crypt($user . $pass, $salt) ==
                crypt("admintest", $salt))) {
                $_SESSION["user"] = $_POST["user"];
            }
        }
        break;
    case "logout":
        $_SESSION = array();
        $ok = session_destroy();
        break;
}
header("Location: login.php");
?>
