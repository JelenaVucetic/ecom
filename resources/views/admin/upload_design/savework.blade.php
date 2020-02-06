
<?php 

$image = $_POST['image'];
$title = $_POST['name'];
$tags = $_POST['tag'];
$description = $_POST['description1']; 

$image = explode(";" , $image)[1];
$image = explode("," , $image)[1];
$image = str_replace(" ", "+", $image);

$image = base64_decode($image);

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$name = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

$string = str_shuffle($name);

file_put_contents("images/". $string . ".png", $image);

echo "done";