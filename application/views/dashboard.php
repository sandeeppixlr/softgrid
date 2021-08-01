<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<style type="text/css">

	
	</style>
</head>
<body>

<div class="container mt-4">
	<div class="float-right">filter By date/time from <input type="datetime-local" name="from-date" id="from-date"> to <input type="datetime-local" name="to-date" id="to-date"> <button type="button" class="btn btn-primary" id="filterbtn">Filter</button></div>
	<div class="clearfix"></div>
	<div class="row mt-4">
		<div class="col-md-4">
			<div class="card ">
			  <div class="card-header bg-primary">Total Request</div>
			  <div class="card-body" id="total"><?php echo count($all_request); ?></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card ">
			  <div class="card-header bg-success">Total Request Partner A</div>
			  <div class="card-body" id="totalA"><?php echo count($partner1); ?></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card ">
			  <div class="card-header bg-info">Total Request Partner A</div>
			  <div class="card-body" id="totalB"><?php echo count($partner2); ?></div>
			</div>
		</div>

	</div>

	
</div>


<script type="text/javascript">
	$( function() {

		$('#filterbtn').click(function(){
		    $.post( "<?php echo base_url('welcome/get_requests'); ?>",
		    	{'from_date': $('#from-date').val(), to_date : $('#to-date').val() }, 
		    	function( ressponse ) {
				    if ( ressponse.status == 1 ) {
				      $('#total').html(ressponse.data.all_request.length);
				      $('#totalA').html(ressponse.data.partner1.length);
				      $('#totalB').html(ressponse.data.partner2.length);
				    }
				} , 
				'json'
			);
  		} );
  	} );
</script> 
</body>
</html>