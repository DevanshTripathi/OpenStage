<?php
    include "TextFile1.php"; 


    $mname = $_POST['mname'];
    
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    
    $poster = $_FILES['poster']['name'];
    $target = "uploads/".basename($_FILES['poster']['name']);

    $conn = new mysqli('localhost' , 'root' , '' , 'OpenStageProject');
    if($conn -> connect_error){
        die('connection failed ' .$conn -> connect_error);
    }else{
        $state = $conn->prepare("insert into content(mname , year , genre , description , email , poster )values(?,?,?,?,?,?)");
        $state->bind_param('ssssss' , $mname , $year , $genre , $description , $email , $poster );
        $state-> execute();
        echo "Movie Submitted ";
        $state->close();
        $conn->close();

    }



?>