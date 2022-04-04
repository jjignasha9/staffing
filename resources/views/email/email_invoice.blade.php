<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
		<div class="box">
		<header>Timesheet, Inc.</header>
		<header class="invoice">Invoice</header>


		<div>
			<p class="name"><b>Dear  {{ $invoice->client->name }}:</b></p>
			<p class="name"><b>Your invoice(s) for week ended {{ $invoice->day_weekend }}</b></p>
			<p><b>Thank you for your business</b></p>	
			<p class="name"><b>Sincerely</b></p>
			<p class="name"><b>Timesheet, Inc. (212) 796-6930</b></p>
			<h1 class="blue"></p>
		</div>

	
		</div>

	</center>

</body>
</html>

<style type="text/css">

	header {
		background-color: #5D91B4;
		color: white;
		text-align: left;
		font-size: 30px;
		padding-left:50px;
		padding-top: 10px; 
		padding-bottom: 10px;
		width: 50%;
	}

	.invoice {
		background-color: #D9E8F2;
		color: black;
		text-align: left;
		font-size: 30px;
		padding-left:50px;
		padding-top: 20px; 
		padding-bottom: 20px;
		width: 50%;
	}

	p {
		color: #585858;
		text-align: left;
	    width: 42%;

	}

	.name {
		margin-top: 40px;
		
	}

	/*.box {
		border-radius: 25px;
	    border: 2px solid #73AD21; 
	    height: 480px;  
	}*/

	.blue {
		border-bottom: 25px solid #123456;
		width: 50%;		
	}


</style>

