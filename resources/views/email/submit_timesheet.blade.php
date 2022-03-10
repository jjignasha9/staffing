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

     <div class="list">Client name: {{ $timesheet->client->name }}</div>
     <div class="expenses">Employee name: {{ $timesheet->employee->name }} - {{ $timesheet->workdays->sum('total_hours') }} hrs</div>
     <div class="list">Supervisor name: {{ $timesheet->supervisor->name }}</div>
     <div class="list"> Weekending date: {{ $timesheet->day_weekend }}</div>

     <a href="{{ route('timesheets') }}">View and approve</a>

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
	}

	.expenses{
		font-size:30px;
		margin-top:30px;
		color: black;
	}

	.list{
		font-size:20px;
		margin-top:5px;
		font-size:20px;
		color: black;

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

	body {
		background-color: rgb(231 229 228);;
	}
  }
</style>