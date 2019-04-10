<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    try{
    $con = new PDO("mysql:host=127.0.0.1;dbname=webofart","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'connection established';
    $sql="create table user (
        username varchar(15) primary key,
        name VARCHAR(30) not null,
        password varchar(10),
        email varchar(30),
        contact int(10),
        gender varchar(6),
        dob date,
        posted datetime	
  
        )";
        $con->exec($sql);
    }
    catch( Exception $e)
    {
        echo $e->getMessage();
    }
?>