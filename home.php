<!DOCTYPE html>
<html lang="en">
<head>
	<title>TAPIT: Emergency Notification App</title>

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
		<a href="#" style="text-decoration: none">
		<h1 class="header">T <span><img src="assets/images/iWarning.png" width="30px" height="30px"></span> P I T</h1>
		<p class="tagline">Your Emergency Notification App</p>
		</a>
	</div>
	<br>
	
	<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    <div class="panel panel-default">
			        <div class="panel-body">
			            <h3 class="text-primary">Find Nearest Hospital <span class="fa fa-ambulance"></span></h3>
			            <hr>
			            <a href="#find">Find me</a>
			            <p><button type="button" class="btn btn-primary btn-md" id="hospital" data-name="Hospital" data-address="11A Idejo St, Lagos">
			            	<span class="fa fa-map-marker"></span> Find nearest hospital
			            </button></p>
			            <span id="address-waiting" style="display: none">We are currently looking for the emergency unit closest to you<img src="assets/images/spinner.gif" width="70"></span>
			            <p class="alert alert-success message-alert">Here is the nearest hospital to your area</p>
			            <!-- <div class="img-responsive">
			            	<img src="assets/images/lasemaResponseUnit.jpg" class="img-thumbnail">
			            </div> -->
			            <div class="img-responsive map-holder">
			            	<!-- <img src="https://maps.googleapis.com/maps/api/staticmap?center=Adesoji Aderemi road, Ife&zoom=14&size=400x400&key=AIzaSyBDiZor9pRFXVMz5Ala4rmDLeS89_ul1z4"> -->
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	
	
	<div class="frsc">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/efcc-logo.jpg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="#FFF"><strong>EFCC</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="efcc-office" data-address="No. 15 A, Awolowo Rd, Lagos 101233" data-name="EFCC Office"><i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="fireDept">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/fire-service-new-recruits-palava-21694101.jpg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="#FFF"><strong>THE FIRE DEPARTMENT</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="fire-department" data-address="Ikoyi, 27 Awolowo Rd, Lagos" data-name="Fire Service Station">
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="police">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/Nigeria-Police-Recruitment-2016.png" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="lightgreen"><strong>POLICE</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="police-station" data-address="No, 5, Oba Elegushi Rd, Lagos" data-name="Police Station">	
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:07055462708">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="lastma">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/LASTMA.jpeg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="#f9f"><strong>LASTMA</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="lastma-office" data-address="state goverment office, Lagos" data-name="LASTMA Office">
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>					
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="lasema">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/LASEMA logo.jpg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="yellow"><strong>LASEMA</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="lasema-office" data-address="Emergency Care service, Lagos state" data-name="LASEMA Office"> 
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="nafdac">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/nafdac.jpg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="yellow"><strong>NAFDAC</strong></font>
				</td>
				<td width="10%" align="center">
					<a href="#" id="nafdac-office" data-address="6 Apapa-Oshodi Express Way, Lagos" data-name="NAFDAC Office">
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>

	<br>

	<div class="ndlea">
		<table width="100%">
			<tr>
				<td width="100px" valign="top">
					<img src="assets/images/60_Logo_National Drug Law Enforcement Agency (NDLEA).jpg" width="100px" height="100px">
				</td>
				<td width="2%"></td>
				<td width="65%" valign="top">
					<font size="4" color="yellow"><strong>NDLEA</strong></font>
				</td>
				<td width="10%" align="center">
					
					<a href="#" id="ndlea-office" data-address="NDLEA office complex, idiroko" data-name="NDLEA Office">
						<i class="fa fa-map-marker fa-2x"></i>
						<p>Locate Station</p>
					</a>
				</td>
				<td width="10%" align="center">
					<a href="sendsos.php"><i class="fa fa-comments fa-2x"></i>
					<p>Send SOS</p></a>
				</td>
				<td width="10%" align="center">
					<a href="tel:112">
					<i class="fa fa-phone fa-2x"></i>
					<p>Call Station</p>
					</a>
				</td>
				<td width="3%">
					<i class="fa fa-chevron-right fa-1x"></i>
				</td>
			</tr>
		</table>
	</div>
</div>

<br>

<!-- Script files -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="assets/js/npm.js"></script> -->
<script src="assets/js/map-script.js"></script>

</body>
</html>