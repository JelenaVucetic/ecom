<!DOCTYPE html>
<html>
<body>

<?php
if (file_exists('C:\xampp\htdocs\www\ecom\resources\views\test.xml')) {
    $xml = simplexml_load_file('C:\xampp\htdocs\www\ecom\resources\views\test.xml');
   dd($xml->returnData->creditcardData->type);
} else {
    exit('Failed to open test.xml.');
}


?>

</body>
</html>