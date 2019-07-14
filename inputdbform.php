<!DOCTYPE html>

<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<?php

require  'serverConnection.php';

// define variables and set to empty values
$book = $writer = $translator = $bookSummary = $inventory =$imageURL="";
$bookErr = $writerErr = $translatorErr = $bookSummaryErr = $inventoryErr =$imageURLErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["book"])) {
        $bookErr= "book is required";
    } else {
        $book = test_input($_POST["book"]);
    }
    if (empty($_POST["writer"])) {
        $writerErr= "writer is required";
    } else {
        $writer = test_input($_POST["writer"]);
    }
    if (empty($_POST["translator"])) {
        $translatorErrErr= "";
    } else {
        $translator = test_input($_POST["translator"]);
    }
    if (empty($_POST["bookSummary"])) {
        $bookSummaryErr= "";
    } else {
        $bookSummary = test_input($_POST["bookSummary"]);
    }
    if (empty($_POST["inventory"])) {
        $inventoryErr= "inventory is required";
    } else {
        $inventory = test_input($_POST["inventory"]);
    }
    if (empty($_POST["imageURL"])) {
        $imageURLErr= "";
    } else {
        $imageURL= test_input($_POST["imageURL"]);
    }
}




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if(isset($_POST['submit'])){
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // Selecting Database from Server
    $dblink->set_charset("utf8");
    if ($dblink->connect_error) {
        die("Connection failed: " . $dblink->connect_error);
    }
    //Insert Query of SQL
    $sql="INSERT INTO ketab (book,writer,translator,bookSummary,inventory,imageURL) VALUES ('$book','$writer','$translator','$bookSummary',$inventory,'$imageURL')";

    if ($dblink->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $dblink->error;
    }

    $dblink->close();
}



?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    book:   <input type="text" name="book">
    <span class="error">* <?php echo $bookErr;?></span>
    <br><br>
    writer: <input type="text" name="writer">
    <span class="error">* <?php echo $writerErr;?></span>
    <br><br>
    translator: <input type="text" name="translator"><br><br>
    bookSummary: <textarea rows="5" name="bookSummary" cols="50"></textarea><br><br>
    inventory: <input type="text" name="inventory">
    <span class="error">* <?php echo $inventoryErr;?></span>
    <br><br>
    imageURL: <input type="text" name="imageURL"><br><br>


    <input type="submit" name="submit">




</form>



</body>
</html>
