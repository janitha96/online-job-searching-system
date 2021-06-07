<?php include_once 'top.php';
	  include_once 'header.php';

	  			 	$retrive="host";
			 	$data=  $database->getReference($retrive)->getValue();
			 	foreach ($data as $key => $row) {
			 		
			 	}
     ?>

  <div class="container" style="background-color: ;">
  <div class="row justify-content-center">
  	<form action="includes/beahost.inc.php" method="post" enctype="multipart/form-data">
<div class="col-11 col-sm-12 col-md-10 col-lg-10" id="logSubHome">
<h4>Business Profile Details</h4>
<img src="" class="rounded-circle" id="blah" style="background-color: red;width:250px; height:250px;">
	<input type='file' name="image1" onchange="readURL(this);" />
<div class="row ">

	<input type="text" name="ref" class="form-control" value="host/<?php echo $key; ?>">
	<div class="col-12 col-sm-12 col-md-6 col-lg-6">
				<p id="logInTextFields">Company Name</p>
	<input type="text" name="cname" class="form-control" id="logInTextBox">
	</div>

</div>
<div class="row ">
		<div class="col-12 col-sm-12 col-md-6 col-lg-6">
		<p id="logInTextFields">E-mail</p>

	<input type="text" name="email" class="form-control" id="logInTextBox">
</div>
</div>

<div class="row ">
		<div class="col-12 col-sm-12 col-md-6 col-lg-6">
		<p id="logInTextFields">Address</p>
<textarea type="text" name="add"  class="form-control" id="logInTextBox" style="height: 100px;"></textarea>
	
</div>
</div>
<p id="logInTextFields">Contact Numbers</p>
<div class="row ">
	
	<div class="col-6 col-sm-6 col-md-3 col-lg-3">
		<input type="text" name="conNum1" class="form-control" id="logInTextBox">
	</div>

		<div class="col-6 col-sm-6 col-md-3 col-lg-3">
		<input type="text" name="conNum2" class="form-control" id="logInTextBox">
	</div>

		<div class="col-6 col-sm-6 col-md-3 col-lg-3">
		<input type="text" name="conNum3" class="form-control" id="logInTextBox">
	</div>

		<div class="col-6 col-sm-6 col-md-3 col-lg-3">
		<input type="text" name="conNum4" class="form-control" id="logInTextBox">
	</div>

</div>

<div class="row ">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
		<p id="logInTextFields">Overview</p>
<textarea type="text" name="over"  class="form-control" id="logInTextBox" style="height: 200px;"></textarea>
	
</div>
</div>
<br>
<button type="submit" name="submit-next" class="btn btn-link" id="loginButton">Next</button>
<br>
</form>

</div>
</div>
</div>


<script type="text/javascript">
	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>