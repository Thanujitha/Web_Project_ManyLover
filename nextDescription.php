<?php

$title =$_POST["t"];
$brand =$_POST["b"];
$price =$_POST["p"];

if(empty($title)){
    echo "Please enter the title of your GIG";
}else if (strlen($title) > 80 || strlen($title) < 10 ) {
    echo "Max Text Legnth 80 and Min Text Legnth 10";
}  else if ($brand == "0") {
    echo "Please select the Brand";
}else if(empty($price)){
    echo "Please enter GIG price";
}else if ($price > 1000 || $price < 10){
    echo "Please enter valide price";
}else{

    echo "sucsess";
}
