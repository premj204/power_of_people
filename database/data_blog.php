<?php
$conn = mysqli_connect( 'localhost', 'root', '', 'power_of_people');

if (isset($_POST['submit'])) {

     
    $headline = (isset($_POST['headline']) && $_POST['headline'] != "") ? $_POST['headline'] : "";
    $description = (isset($_POST['description']) && $_POST['description'] != "") ? $_POST['description'] : "";
    $uploadFile = (isset($_POST['uploadFile']) && $_POST['uploadFile'] != "") ? $_POST['uploadFile'] : "";
    $status = (isset($_POST['status']) && $_POST['status'] != "") ? $_POST['status'] : "";
    $added_on = (isset($_POST['added_on']) && $_POST['added_on'] != "") ? $_POST['added_on'] : "";

    // $newsimage = "";
    // $fileMsg = "";
    // if(isset($_FILES['newsimage']) && !empty($_FILES['newsimage'])){
    //     $file = $_FILES['newsimage'];

    //     $fileName = $_FILES['newsimage']['name'];
    //     $fileTempName = $_FILES['newsimage']['tmp_name'];
    //     $fileSize = $_FILES['newsimage']['size'];
    //     $fileError = $_FILES['newsimage']['error'];
    //     $fileType = $_FILES['newsimage']['type'];

    //     //Getting the file ext
    //     $fileExt = explode('.',$fileName);
    //     $fileActualExt = strtolower(end($fileExt));

    //     //Array of Allowed file type
    //     $allowedExt = array("jpg","jpeg","png");

    //     //Checking, Is file extentation is in allowed extentation array
    //     if(in_array($fileActualExt, $allowedExt)){
    //         //Checking, Is there any file error
    //         if($fileError == 0){
    //             //Checking,The file size is bellow than the allowed file size
    //             if($fileSize < 10000000){
    //                 //Creating a unique name for file
    //                 $fileNemeNew = uniqid('',true).".".$fileActualExt;
    //                 //File destination
    //                 $fileDestination = 'photostore/'.$fileNemeNew;
    //                 //function to move temp location to permanent location
    //                 if(move_uploaded_file($fileTempName, $fileDestination)){
    //                     $newsimage = $fileNemeNew;
    //                     $fileMsg = "File Uploaded successfully";
    //                 }else{
    //                     $fileMsg = "Error while uploading the file";
    //                 }
    //                 //Message after success
                    
    //             }else{
    //                 //Message,If file size greater than allowed size
    //                 $fileMsg =  "File Size Limit beyond acceptance";
    //             }
    //         }else{
    //             //Message, If there is some error
    //             $fileMsg =  "Something Went Wrong Please try again!";
    //         }
    //     }else{
    //         //Message,If this is not a valid file type
    //         $fileMsg =  "You can't upload this extention of file";
    //     }
    // }
    // echo $fileMsg;
    
    $sql = "INSERT INTO `blog`(`id`, `headline`, `description`, `uploadFile`, `status`, `added_on`) 
            VALUES ('$headline','$description','$uploadFile','$status','$added_on')";


     $res = mysqli_query($conn, $sql);
    

}

?>