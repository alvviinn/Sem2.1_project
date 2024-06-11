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

?>