<!DOCTYPE html>

<html>
<body>
<?php
// define variables and set to empty values
$book = $writer = $translator = $bookSummary = $inventory =$imageURL="";
$bookErr = $writerErr = $translatorErr = $bookSummaryErr = $inventoryErr =$imageURLErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["book"])) {
        $bookErr= "book is required";
    } else {
        $name = test_input($_POST["book"]);
    }
    if (empty($_POST["writer"])) {
        $writerErr= "writer is required";
    } else {
        $name = test_input($_POST["writer"]);
    }
    if (empty($_POST["translator"])) {
        $translatorErrErr= "";
    } else {
        $name = test_input($_POST["translator"]);
    }
    if (empty($_POST["bookSummary"])) {
        $translatorErrErr= "";
    } else {
        $name = test_input($_POST["bookSummary"]);
    }
    if (empty($_POST["inventory"])) {
        $translatorErrErr= "inventory is required";
    } else {
        $name = test_input($_POST["inventory"]);
    }
    if (empty($_POST["imageURL"])) {
        $translatorErrErr= "";
    } else {
        $name = test_input($_POST["imageURL"]);
    }



}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form  method="post" action="Test.php/">
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

<?php
if($book)
echo "your input !!!!<br>";
echo $book;
echo "<br>";
echo $writer;
echo "<br>";
echo $translator;
echo "<br>";
echo $bookSummary;
echo "<br>";
echo $inventory;
echo "<br>";
echo $imageURL;
echo "<br>";


?>

</body>
</html>
