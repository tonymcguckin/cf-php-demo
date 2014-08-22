<?php
echo "Showing VCAP_SERVICES context...";

$host = "10.244.1.90";
$port = "5435";
$dbname = "de92c80e1330543db92a0681bcba3f3e8";
$user = "ua9e6b628869340d3903211aca9747c26";
$password = "p01e5ace3bdb24b5e8414e6a6532b03b2";

try {
    $vcap_services = $_ENV["VCAP_SERVICES"];
    var_dump($vcap_services);

    $cs = "host=".$host;
    $cs .= " port=".$port;
    $cs .= " dbname=".$dbname;
    $cs .= " user=".$user;
    $cs .= " password=".$password;
    $dbh = pg_connect($cs);
    var_dump($dbh);
} catch(Exception $e) {
    print "Exception: " . $e->getMessage() . "<br/>";
    die();
}
?>
