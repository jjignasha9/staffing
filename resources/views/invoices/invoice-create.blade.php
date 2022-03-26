<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pdf</title>
</head>
<body>

	<span class="text-bold">Avenue A Staffing, Inc.</span>
	<p>30 3rd Street, Floor 1</p>
	<p>Troy, NY 12180 US</p>
	<p>(212) 796-6930</p>
	<p>Mario@AvenueAstaffing.com</p>
	<p>www.avenueastaffing.com</p>

	<div class="row">
		<div class="column">
			<span class="text-bold">BILL TO</span>
			<p>Kuhic-Jaskolski</p>
			<p>69609 Raynor Plain</p>
			<p>South Ariel, MT 15465</p>
		</div> 


		<table id="invoice" class="column">
			<tr>
				<td class="text-bold">INVOICE #</td>
				<td>2479</td>
			</tr>
			<tr>
				<td class="text-bold">DATE</td>
				<td>05/15/2022</td>
			</tr>
			<tr>
				<td class="text-bold">DUE DATE</td>
				<td>06/15/2022</td>
			</tr>
			<tr>
				<td class="text-bold">TERMS Net</td>
				<td>30</td>
			</tr>
		</table>
	</div>
	<h1 class="heading">INVOICE</h1>



	<center>
		<table style="width:98%" id="invoice-table">
			<thead>
				<tr>
					<th>ACTIVITY</th>
					<th>HOURS</th>
					<th>RATE</th>
					<th>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Alivia Yundt</td>
					<td>40</td>
					<td>42.57</td>
					<td>1,702.80</td>
				</tr>
			</tbody>
		</table>

		<hr>

		<table id="invoicetotal">
			<tr>
				<td>BALANCE DUE</td>
				<td class="text-bold">$1,702.80</td>
			</tr>
		</table>
	</center>

</body>
</html>




<style type="text/css">
	p {
		font-size:small;
		font-family: sans-serif;
		margin-left: 20px;
	}

	#invoice {
		width: 20%;
		margin-left: 20px;
	}

	span {	
		margin-left: 20px;
	}	

	.text-bold {
		font-weight: bold;
	}   

	.heading {
		font-weight: bold;
		color: teal;
		text-align: center;
	}

	h1 {
		margin-left: 20px;
	}

	#invoice-table {
		padding: 7px;
		text-align: center;
	}

	th {
		background-color:#2dd4bf;
	}

	#invoicetotal {
		padding: 7px;
		width: 88%;
		text-align: right;

	}

	.row {
		margin-left:-5px;
		margin-right:-5px;
	}

	.column {
		float: left;
		width: 70%;
		padding: 5px;
	}

</style>