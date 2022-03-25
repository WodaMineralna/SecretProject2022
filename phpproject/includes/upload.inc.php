<?php
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileDescription = $_POST['description'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'txt', 'pdf', 'gif', 'doc', 'docx', 'mp3', 'mp4');

        if(in_array($fileActExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 35000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActExt;
                    $fileDest = '../documents/' . $fileNameNew;
                    
                    $fileDestToPanelPHP = 'documents/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);

                    include_once 'dbh.inc.php';

                    // podatne na SQL injection (przez fileDesc [POPRAW JAK STARCZY CZASU I CHECI])
                    
                    $sql = "INSERT INTO filesinfo (filesName, filesSize, filesDest, filesExt, filesDesc) VALUES ('$fileNameNew', '$fileSize', '$fileDestToPanelPHP', '$fileActExt', '$fileDescription');";
                    mysqli_query($conn, $sql);

                    header("location: ../panel.php");
                    exit();
                } else {
                    header("location: ../panel.php?error=filetoobig"); 
                    exit();
                }
            } else {
                header("location: ../panel.php?error=fileerror"); 
                exit();
            }
        } else {
            header("location: ../panel.php?error=extnotallowed"); 
            exit();
        }
    }
    else {
        header("location: ../panel.php"); 
        exit();
    }