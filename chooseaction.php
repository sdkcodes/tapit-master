<?php require("header.php"); ?>
<title>Tapit|Choose Action</title>

<div class="container">
	<br>
	<div align="center">
		<a href="home.php" style="text-decoration: none">
		<h1 class="header">T <span><img src="assets/images/iWarning.png" width="30px" height="30px"></span> P I T</h1>
		<p class="tagline">Your Emergency Notification App</p>
		</a>
	</div>
	<br>

	<!-- <div class="row">
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
		            <p class="alert alert-success message-alert">Here is the nearest hospital to your area</p> -->
		            <!-- <div class="img-responsive">
		            	<img src="assets/images/lasemaResponseUnit.jpg" class="img-thumbnail">
		            </div> -->
		            <!-- <div class="img-responsive map-holder"> -->
		            	<!-- <img src="https://maps.googleapis.com/maps/api/staticmap?center=Adesoji Aderemi road, Ife&zoom=14&size=400x400&key=AIzaSyBDiZor9pRFXVMz5Ala4rmDLeS89_ul1z4"> -->
		            <!-- </div>
		        </div>
		    </div>
		</div>
	</div> -->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Choose Action
				</div>
				<div class="panel-body">
					<a href="#" class="btn btn-primary btn-block btn-lg"><span class="fa fa-map-marker"></span> Locate Station</a>

					<!-- <div class="map-holder">
						Map displays here
					</div> -->

					<a href="sendsos.php" class="btn btn-danger btn-block btn-lg"><span class="fa fa-comments"></span> Send SOS</a>
					<a href="tel:112" class="btn btn-success btn-block btn-lg"><span class="fa fa-phone"></span> Call Station</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require("footer.php"); ?>