<?php

if(isset($_POST['id'])){
    require '/OpenServer/domains/ToDoList/includes/db.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $connect->prepare("SELECT id, checked FROM todolist WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $connect->query("UPDATE todolist SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }

        exit();
    }
}else {
    header("Location: ../php/to-do.php?mess=error");
}