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

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.edgeproject.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@edgeproject.net';                 // SMTP username
    $mail->Password = 'edgeproject2015';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = "25";                                    // TCP port to connect to

    $mail->setFrom('emergency@tapit.com', 'Emergency Mailer');
    $mail->addAddress('mookuyelu@gmail.com', 'Joe User');     // Add a recipient
                   // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    

    
    if (isset($file_name) AND $file_name !== NULL){
    	$mail->addAttachment('uploads/'.$file_name);         // Add attachments
    }
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
        $_SESSION['sos_message_alert'] = TRUE;
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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TAPIT: Send SOS</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="Clevoclick Technologies">
	<meta name="description" content="An emergency notification app">
	<meta name="keywords" content="emergency, notification, tapit">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	<!-- Custom Fonts by Font-Awesome -->
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
		<br>
		<div align="center">
			<a href="home.php" style="text-decoration: none">
			<h1 class="header">T <span><img src="assets/images/iWarning.png" width="30px" height="30px"></span> P I T</h1>
			<p class="tagline">Your Emergency Notification App</p>
			</a>
		</div>
		<br>
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<a href="home.php" style="color: #FFF; text-decoration: none;"><font size="6" style="font-family: 'Trebuchet MS','Comic Sans MS',Arial;"><span class="fa fa-chevron-left"></span> SEND SOS</font></a>
					</div>
					
					<div class="panel-body">
						<!-- Form -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
								<!-- <div class="container"> -->
									<form role="form" class="form-horizontal pull-left" method="post" autocomplete="no" action="" enctype="multipart/form-data">
										<h2 class="text-primary">Send SOS Message</h2>
										<div class="form-group" style="padding-left: 40px">
										<button class="btn btn-default btn-md" type="button" id="get-location-button">
											<i class="glyphicon glyphicon-map-marker"></i> Get Location
										</button>
										<span id="address-waiting" style="display: none">Please wait while we get your address<img src="assets/images/spinner.gif" width="70"></span>
										<!-- <button class="btn btn-primary btn-md" type="button">
											<i class="fa fa-camera"></i> Upload Image
										</button> -->
										<label class="btn btn-primary btn-md">
											<i class="fa fa-camera"></i> Upload Media<input type="file" name="fileToUpload" style="display: none" accept="image/*, video/*">
										</label>
										<!-- <button class="btn btn-danger btn-md" type="button">
											<i class="fa fa-film"></i> Upload Video
										</button> -->
<!-- 										<label class="btn btn-danger btn-md">
											<i class="fa fa-film"></i> Upload Video<input type="file" name="fileToUpload" style="display: none" accept="video/*">
										</label>
										<hr> -->
										</div>
										<div class="form-group">
											<label for="location" class="control-label col-sm-4">Location</label>
											<div class="col-sm-8">
												<span id="location-gotten" class="text-success"></span>
												<input type="text" name="location" placeholder="House 28, Ede Road, Ile Ife, Osun state" class="form-control" id="address-input">
											</div>
										</div>

										<div class="form-group">
											<label for="location" class="control-label col-sm-4">Message</label>
											<div class="col-sm-8">
												<textarea class="form-control" placeholder="Help!!! Someone just got into an accident now!" rows="6" name="message"></textarea>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-4 col-sm-8">
												<button type="submit" name="submit" class="btn btn-danger btn-md"><i class="fa fa-send-o"></i> Send</button>
											</div>
										</div>
										<?php if (isset($_SESSION['sos_message_alert'])): ?>
											<div class="alert alert-success">
												Your message has been sent. Help is on the way.
											</div>
											<?php $_SESSION['sos_message_alert'] = NULL ?>
										<?php endif; ?>
									</form>
								<!-- </div> -->
							</div>
						</div>
					</div> <!-- /.panel-body -->
					
					<div class="panel-footer">
						<em>TAPIT Emergency Notification App</em>
					</div> <!-- /.panel-footer -->
				</div>
			</div>
		</div>
	</div>

	<style>
		body {
			color: #000;
		}
	</style>

	<!-- Script files -->
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- <script src="assets/js/npm.js"></script> -->
	<script src="assets/js/map-script.js"></script>
</body>
</html>