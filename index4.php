<?php
echo "VCAP_SERVICES / PostGreSQL Connection";

echo $_ENV["VCAP_SERVICES"];

$host = "10.244.1.90";
$port = "5435";
$dbname = "de92c80e1330543db92a0681bcba3f3e8";
$user = "ua9e6b628869340d3903211aca9747c26";
$password = "p01e5ace3bdb24b5e8414e6a6532b03b2";

try {
    $cs = "host=".$host;
    $cs .= " port=".$port;
    $cs .= " dbname=".$dbname;
    $cs .= " user=".$user;
    $cs .= " password=".$password;
    $dbh = pg_connect($cs);
    var_dump($dbh);

    $qry = "SELECT * ".
    "FROM information_schema.tables ".
    "WHERE table_type = 'BASE TABLE' ".
    "   AND table_schema = 'public' ". 
    "ORDER BY table_type, table_name";

    $result = pg_query($dbh, $qry) or die('Query failed: ' . pg_last_error());

    // Printing results in HTML
    echo "<table>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    // Free resultset
    pg_free_result($result);

    // Closing connection
    pg_close($dbh);

} catch(Exception $e) {
    print "Exception: " . $e->getMessage() . "<br/>";
    die();
}
?>
