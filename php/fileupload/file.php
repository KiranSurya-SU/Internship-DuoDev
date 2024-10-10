<?php
if(isset($_FILES['profile'])){
    $file = $_FILES['profile'];

    $fileName = $file['name'];
    $fileSize = $file['size'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = ['png', 'jpg', 'jpeg'];

    if(in_array($fileExt, $allowed)){
        if($fileSize < 2000000) {
            $targetPath = "./img/"; 
            try {
                if(!file_exists($targetPath)){
                    mkdir($targetPath, 0777, true); 
                }
                $filePath = $targetPath . time() . "." . $fileExt;

                if(file_exists($filePath)) {
                    unlink($filePath);
                }

                if(move_uploaded_file($file['tmp_name'], $filePath)) {
                    echo "File uploaded";
                } else {
                    echo "File not uploaded";
                }
            } catch(Exception $e) {
                echo "File upload failed";
            }
        } else {
            echo "File is too large";
        }
    } else {
        echo "Only jpg, jpeg, png supported";
    }
}
?>
