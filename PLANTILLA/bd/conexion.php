<?PHP 
$host = "localhost";
$user = "root";
$pw   = "";
$bd   = "prueba";
//global $link;
$link = mysqli_connect($host,$user,$pw, $bd);
//$link->set_charset("utf8");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>