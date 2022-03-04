<?php

$pwd="123456";
$hashedpwd = hash("sha256", $pwd);
echo $hashedpwd;