<?php
session_start();
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $address = isset($_POST['location']) ? $_POST['location'] : NULL;
    $message = isset($_POST['message']) ? $_POST['message'] : NULL;
    $file_name = "";
    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
        $data = uploadFile("fileToUpload");
        if ($data['upload_ok'] === 1){
            $file_name = $data['file_name'];
        }
    }
    require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'user@example.com';                 // SMTP username
    // // $mail->Password = 'secret';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('emergency@tapit.com', 'Emergency Mailer');
    $mail->addAddress('mookuyelu@gmail.com', 'Joe User');     // Add a recipient
                   // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    

    $mail->addAttachment('/uploads/'.$file_name);         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'New emergency alert at ' . $address;
    $mail->Body    = '<b> ' .$message . ' ';
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

function uploadFile($file_name){
    $validation_errors = [];
    $data = [];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES[$file_name]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES[$file_name]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $validation_errors['file_mime'] = "File is not an image";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $validation_errors["file_exits"] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$file_name]["size"] > 20000000) {
        // echo "Sorry, your file is too large.";
        $validation_errors["size"] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $validation_errors['allowed_types'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        $validation_errors['upload_ok'] = 0;
        return $validation_errors;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES[$file_name]["name"]). " has been uploaded.";
            $data['file_name'] = basename( $_FILES[$file_name]["name"]);
            $data['upload_ok'] = 1;
            return $data;
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>