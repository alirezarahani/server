<?php

// Initialize variable for database credentials


require 'serverConnection.php';
//recive  id after /
$id = substr($url, strrpos($url, '/')+1 );


if ($id>0)
{
    $result = $dblink->query("SELECT * FROM ketab where ID=".$id);

    $dbdata = array();

    $row = $result->fetch_assoc();
    $dbdata =
        [
            "id" => $row["ID"],
            "book" => $row["book"],
            "writer" => $row["writer"],
            "translator" => $row["translator"],
            "bookSummry" => $row["bookSummary"],
            "inventory" => $row["inventory"],
            "imageURL" => $row["imageURL"]
        ];
    header('Content-Type: application/json');

    echo json_encode($dbdata, JSON_UNESCAPED_UNICODE);

}else
{
    //Fetch into associative array
    $result = $dblink->query("SELECT * FROM ketab");
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
    echo json_encode(array('books'=>$dbdata), JSON_UNESCAPED_UNICODE);
}



?>