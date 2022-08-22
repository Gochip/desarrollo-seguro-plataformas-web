<?php
session_set_cookie_params([
    'secure' => true,
    'samesite' => 'None'
]);
session_start();
?>
<html>
<body>
<?php
if (isset($_SESSION["user"])) {
    echo "<p>Bienvenido de vuelta, " . $_SESSION["user"] . "!<br>";
    echo '<a href="process.php?action=logout">Logout</a></p>';
}
else {
    ?>
    <form action="process.php?action=login" method="post">
        <p>El nombre de usuario es: admin</p>
        <input type="text" name="user" size="20">
        <p>La contraseña es: test</p>
        <input type="password" name="pass" size="20">
        <input type="submit" value="Login">
    </form>
    <?php
}
?>
</body>
</html>
