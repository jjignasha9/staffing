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
     <p class="message">Your timesheet has been rejected, please update and resubmit it.</p>
     <table>
     	<tr>
     		<td><b>Client name:</b></td>
     		<td>{{ $timesheet->client->name }}</td>
     	</tr>

     	<tr>
     		<td><b>Employee name:</b></td>
     		<td>{{ $timesheet->employee->name }}</td>
     	</tr>

     	<tr>
     		<td><b>Supervisor name:</b></td>
     		<td>{{ $timesheet->supervisor->name }}</td>
     	</tr>

     	<tr>
     		<td><b>Total hours:</b></td>
     		<td>{{ $timesheet->workdays->sum('total_hours') }} hrs</td>
     	</tr>

     	<tr>
     		<td><b>Weekending date:</b></td>
     		<td>Week Ending {{ Carbon\carbon::parse($timesheet->day_weekend)->format('m/d') }}</td>

     	</tr>
     </table>

     <a href="{{ route('timesheets.create', $timesheet->id) }}">View and approve</a>

    </center>
</body>
</html>

<style type="text/css">

	header {
		background-color: rgb(52, 152, 219);
		color: white;
		font-size: 30px;
		text-align: center;
		padding:20px;
		width: 50%;
	}

	a:link, a:visited {
	  background-color: rgb(0, 163, 108);
	  color: white;
	  padding: 15px 25px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: 14px 2px;
	}

	table {
	  width: 30%;
	  margin-top: 15px;
	  color: black;
	}

	td {
	  font-size: 17px;

	}

	p {
		text-align: center;
	}

	.message{
		text-align: center;
		background-color: rgba(255, 99, 71, 0.5);
		border: red;
		padding: 2px;
		display: inline-block;
		margin: 5px;
		color: black;

	}

  }
</style>