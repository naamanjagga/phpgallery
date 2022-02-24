<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Gallery</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image" value="upload more" multiple> <br><br><br>
    <input type="submit" value="submit" name="submit"> <br>

<?php 
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image ";
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            //echo $_FILES["image"]["tmp_name"];
                            
                            echo '<br>';
                        } else {
                            echo '<br>';
                            echo "Sorry, there was an error uploading your file.";
                        }

        } else {
             echo '<br>';
             echo "File is not an image.";
        }

   
   
            $_SESSION = glob($target_dir."*");

            foreach($_SESSION as $image) {
            echo '<table><tr><td><img style="width: 100px; height: 100px;" src="'.$image.'" /></td></tr>';
            echo '<tr><td>naman'. basename($_FILES["image"]["name"]).'</td></tr></table>';
}

      }
    ?>
    
</body>
</html>