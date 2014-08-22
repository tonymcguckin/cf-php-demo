<?php
echo "Connecting to PostgreSQL service...";

$host = "10.244.1.90";
$port = "5435";
$dbname = "de92c80e1330543db92a0681bcba3f3e8";
$username = "ua9e6b628869340d3903211aca9747c26";
$password = "p01e5ace3bdb24b5e8414e6a6532b03b2";

$dbh = new PDO("pgsql:dbname=$dbname;host=$host;port=$port", $username, $password);

var_dump($dbh);
?>
