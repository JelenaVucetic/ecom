
<?php 
$image = $_POST['image'];
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
echo "Done";