<?PHP
require 'serverConnection.php';

$bookName = substr($url, strrpos($url, '/')+1 );


$result = $dblink->query("SELECT * FROM ketab LIKE '%$bookName%'");
$dbdata = array();



while ( $row = $result->fetch_assoc())
{
    $data=array();

    $dbdata[]=
        [
            "id" => $row["ID"],
            "book" => $row["book"],
            "writer" => $row["writer"],
            "translator" => $row["translator"],
            "bookSummry" => $row["bookSummary"],
            "inventory" => $row["inventory"],
            "imageURL" => $row["imageURL"]
        ];
}

header('Content-Type: application/json');

echo json_encode($dbdata, JSON_UNESCAPED_UNICODE);

?>