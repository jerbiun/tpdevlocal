<?php
function parcourir($tab1=[]){
    for($i=0;$i<sizeof($tab1);$i++){
        echo $tab1[$i]."<br>";
    }
}

function conx(){
    $host="localhost";
    $user="root";
    $pwd="";
    $dbname="tsig";


    $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
    return $con;
}
