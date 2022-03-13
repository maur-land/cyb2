<?php
    session_start();
    $user = $_SESSION["user"];
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

//Здесь имеются существенные нарушения безопасности
//1. Слабый пароль (его нету)
//2. Использование учетки рута (Нарушение принципа нименьших привелегий)
//3. Секрет в коде
include("../params/billing.php");
$conn = mysqli_connect("$db_server","$db_user","$db_pwd","billing");

date_default_timezone_set('Europe/Moscow');
$nowTime = date("Y-m-d H:i:s");

$sql = "INSERT INTO calcs(Number1, Number2, Operation, User, TimesTamp) VALUES($x, $y, 'minus', '$user', '$nowTime')";
//echo $sql;
mysqli_query($conn, $sql);

mysqli_close($conn);
$z = $x - $y;
echo $z;