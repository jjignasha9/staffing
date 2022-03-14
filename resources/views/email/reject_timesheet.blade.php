<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
     <header>Timesheet</header>
     <table>
     	<tr>
     		<td>Client name:</td>
     		<td>{{ $timesheet->client->name }}</td>
     	</tr>
     </table>

     <div>Your Timesheet Has Been rejected</div>

    </center>
</body>
</html>
 <!--  <div class="list">Client name: {{ $timesheet->client->name }}</div>
     <div class="expenses">Employee name: {{ $timesheet->employee->name }} - {{ $timesheet->workdays->sum('total_hours') }} hrs</div>
     <div class="list">Supervisor name: {{ $timesheet->supervisor->name }}</div>
     <div class="list"> Weekending date: {{ $timesheet->day_weekend }}</div> -->



<style type="text/css">

	header {
		background-color: rgb(52, 152, 219);
		color: white;
		font-size: 30px;
		text-align: center;
		padding:20px;
		width: 50%;
	}

	div {
		background-color:red;
		color: white;
		font-size: 20px;
		text-align: center;
		padding:20px;
		width: 50%;
	}

	body {
		background-color: rgb(231 229 228);;
	}
  }
</style>