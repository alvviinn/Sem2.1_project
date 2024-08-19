<?php

$myarray =  array(

    array("Ankit","Ram","Shyam"),
    array("Unnao","Trichy","Kanpur")

);
echo "<pre";
print_r($myarray);
echo"</pre>";

$people = [
    'Joe'=> 22,
    'Adam'=> 25,
    'David'=> 30,

];
foreach($people as $name => $age){
    echo "My name is $name , and age is $age".'<br>';
}

$data = [
    'Game of Thrones'=> ['Jaime Lannister ','Catelyn Stark','Cersei Lannister'],
    'Black Mirror'=>['Nanette Cole', 'Selma Hayek','Karin Parke'],

];
echo'<h1>Famous TV series and Actors';
foreach($data as $series => $actors){
    echo"<h2>$series<h2>";
    foreach($actors as $actor){
        echo"<div>$actor</div>";
    }
}


?>