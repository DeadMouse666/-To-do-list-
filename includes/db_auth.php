<?php

require "/OpenServer/domains/ToDoList/libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=to_do_list',
'root', '' ); //for both mysql or mariaDB
session_start();
?>