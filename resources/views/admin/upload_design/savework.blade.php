
<?php 

$image = $_POST['image'];
$title = $_POST['name'];
$tags = $_POST['tag'];
$description = $_POST['description1']; 
$original = $_POST['originalName1'];
$price = 0;

if($original='Phone Case'){
    $price = 10;
}else if($original='T-shirt'){
    $price = 15;
}else if($original='Mugs'){
    $price = 12;
}else if($original='Hoodie'){
    $price = 25;
}else{
    $price = 0;
}

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


DB::table('product')->insert([
'name'=> $title, 'description'=> $description, 'price'=>$price,'image'=>'images/'.$string.'.png'
]);



echo 'Done';
