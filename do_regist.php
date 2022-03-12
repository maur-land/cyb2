<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check login</title>
</head>
<body>
    <?php
        $user = $_REQUEST['user'];
        $hash = hash("sha256", $_REQUEST['pwd']);

        include("../../../params/billing.php");
        $conn = mysqli_connect($db_server,$db_user,$db_pwd,"billing");
        $sql = "INSERT INTO users(Login, Pwdhash) VALUES('$user', '$hash')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "Сейчас вы будете перенаправлены на cраницу логина.";
        echo '<meta http-equiv="refresh" content="2; URL=login.php"> ';
    ?>
</body>
</html>