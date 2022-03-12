<?php
    session_start();
    $user = $_SESSION["user"];

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo "<h1>Твой счет, $user! </h1>";

?>
    <table border ="1">

    <?php
     include("params/billing.php");
     $conn = mysqli_connect($db_server,$db_user,$db_pwd,"billing");

     // Это довольно нудный код, но использование параметрического
     // запроса избавляет от уязвимости SQL Injection
     $sql = "SELECT * FROM calcs WHERE User=?";
     $statement = mysqli_prepare($conn, $sql);
     mysqli_stmt_bind_param($statement, "s", $user,);
     mysqli_stmt_execute($statement);
     $cursor = mysqli_stmt_get_result($statement);
     $result = mysqli_fetch_all($cursor);
     mysqli_close($conn);

     for ($i=0; $i < count($result); $i++) {
        echo "<tr>";
        echo"<td>".$result[$i][1]."</td><td>".$result[$i][2]."</td><td>".$result[$i][3]."</td>";
        echo "</tr";
     }
    ?>
    </table>
    <?php
        $backs = count($result);
        echo "<h2>Вы должны заплатить $backs.00 $</h2>";
        echo "<h2>Ниже приведены ваша таблица вычислений:</h2>";
    ?>
</body>
</html>