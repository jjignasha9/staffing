<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>invoice pdf</title>
</head>
<body>
	<div style="page-break-after: always;">
			<span class="text-bold">Timesheet, Inc.</span>
			<p>30 3rd Street, Floor 1</p>
			<p>Troy, NY 12180 US</p>
			<p>(212) 796-6930</p>
			<span class="text-bold">WEEK ENDING</span>
			<p>{{ $invoice->timesheet->day_weekend }}</p>
			<span class="heading text-bold">Invoice</span>

		<div class="row">
			<div class="column">
				<span class="text-bold">BILL TO</span>
				<p>{{ $invoice->timesheet->client->name }}</p>
				<p>{{ $invoice->timesheet->client->address }}</p>
			</div> 


			<table id="invoice" class="column">
				<tr>
					<td class="text-bold free ls">INVOICE #</td>
					<td class="free are">{{ $invoice->id }}</td>
				</tr>
				<tr>
					<td class="text-bold free ls">DATE</td>
					<td class="free are">{{ $invoice->bill_date }}</td>
				</tr>
				<tr>
					<td class="text-bold free ls">DUE DATE</td>
					<td class="free are">{{ $invoice->due_date }}</td>
				</tr>
				<tr>
					<td class="text-bold free ls">TERMS Net</td>
					<td class="free are">{{ $invoice->term->name }}</td>
				</tr>
			</table>
		</div>

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
						<td>{{ $invoice->timesheet->employee->name }}</td>
						<td>{{ $invoice->invoices->sum('hours') }}</td>
						<td>$ {{ $invoice->invoices->sum('bill_rate') }}</td>
						<td>$ {{ $invoice->invoices->sum('total_amount') }}</td>
					</tr>
				</tbody>
			</table>

			<hr>

			<table id="invoicetotal">
				<tr>
					<td class="free">BALANCE DUE</td>
					<td class="text-bold free">$ {{ $invoice->invoices->sum('total_amount') }}</td>
				</tr>
			</table>
		</center>

	</div>

	<span class="heading text-bold">Timesheet</span>
	<p >WEEK ENDING SUNDAY <span class="text-bold">{{ $timesheet->day_weekend }}</span></p>
	<p >EMPLOYEE'S NAME <span class="text-bold">{{ $timesheet->employee->name }}</span></p>
	<p >CLIENT NAME <span class="text-bold">{{ $timesheet->client->name }}</span></p>
	<p >SUPERVISOR NAME <span class="text-bold">{{ $timesheet->supervisor->name }}</span></p>


	<table style="width:100%">
		<tr>
			<th>DATE</th>
			<th>TIME IN</th>
			<th>TIME OUT</th>
			<th>BREAK</th>
			<th>TOTAL</th>
		</tr>
		@foreach($timesheet->workdays as $workday)
		<tr>
			<td>{{ Carbon\carbon::parse($workday->date)->format('D m/d') }}</td>
			<td>{{ Carbon\carbon::parse($workday->in_time)->format('H:i A') }}</td>
			<td>{{ Carbon\carbon::parse($workday->out_time)->format('H:i A') }}</td>
			<td>{{ $workday->break }}</td>
			<td>{{ $workday->total_hours }} hrs</td>
		</tr>
		@endforeach

		<tr>
			<td colspan="4" class="text-bold">TOTAL HOURS WORKED</td>
			<td class="text-bold">{{ $timesheet->workdays->sum('total_hours') }} hrs</td>
		</tr>
	</table>

</body>
</html>

<style type="text/css">
	table, th, td {
		border:1px solid black;
		border-collapse: collapse;
		padding: 7px;
		text-align: center;
	}

	div {
		margin-top:15px;
	}

	.text-bold {
		font-weight: bold;
	}   

	.free {
		border : 1px solid white;
	}

	p {
		font-size:small;
		font-family: sans-serif;
		margin-left: 20px;
	}

	#invoice {
		width: 20%;
		margin-left: 120px;
	}

	span {	
		margin-left: 20px;
		font-family: sans-serif;
		height:50px;
	}	

	.text-bold {
		font-weight: bold;
	}   

	h1 {
		font-weight: bold;
		color: teal;
		text-align: center;
		font-family: sans-serif;
	}

	#invoice-table {
		padding: 7px;
		text-align: left;
		padding-top: 200px;
	}

	.heading {
		text-align: left;
		color: teal;
		font-size: 30px;
		font-weight: bold;
	}

	th {
		background-color:#2dd4bf;
		font-family: sans-serif;
	}

	#invoicetotal {
		padding: 7px;
		width: 85%;
		text-align: right;
		margin-left: 120px;
	}

	.row {
		margin-left:-5px;
		margin-right:-5px;
		margin-top: 20px;
	}

	.column {
		float: left;
		width: 66%;
		padding: 5px;
	}

	.ls { 
		text-align: right;

	}

	.are { 
		text-align: left;

	}

</style>