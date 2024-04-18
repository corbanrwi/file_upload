<?php
$c=mysqli_connect('localhost','root','','fileupload');


// $targetDirectory = ; // Directory where files will be uploaded
$targetFile = "uploads/" . basename($_FILES["file_name"]["name"]); // Path to save the file

$filename=basename($_FILES["file_name"]["name"]);
// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    exit();
}

// Check file size (optional)
// if ($_FILES["file_name"]["size"] > 5000000) { // Adjust the file size limit as needed
//     echo "Sorry, your file is too large.";
//     exit();
// }

// Allow only certain file formats (optional)
// $allowedFormats = array("jpg", "png", "jpeg", "gif");
// $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
// if (!in_array($fileExtension, $allowedFormats)) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

//     exit();
// }

// Move the file from temporary directory to the target directory
if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $targetFile)) {
   
   if (mysqli_query($c,"INSERT INTO `files`(`id`, `name`) VALUES (null,'$filename')")){
    echo "The file ". basename( $_FILES["file_name"]["name"]). " has been uploaded.";
    
   }
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
