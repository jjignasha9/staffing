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

     Employee name: {{ $timesheet->employee->name }}
     Client name: {{ $timesheet->client->name }}
     Supervisor name: {{ $timesheet->supervisor->name }}
     Weekending date: {{ $timesheet->workdays->sum('total_hours') }} hrs

     <div class="expenses">{{ $timesheet->employee->name }} {{ $timesheet->workdays->sum('total_hours') }} hrs and $45 expenses</div>

     <div class="list">{{ $timesheet->supervisor->name }}</div>
     <div class="list">weekending {{ $timesheet->day_weekend }}</div>

     <button class="button">View and approve</button>

    </center>
</body>
</html>

<style type="text/css">

	header {
		background-color: rgb(52, 152, 219);
		color: white;
		font-size: 30px;
		width: 50%;
		text-align: center;
	}

	.name{
		background-color:rgb(52, 152, 219);
		font-size:20px;
		color:white;
		padding-bottom:15px;
	}

	.expenses{
		font-size:30px;
		margin-top:30px;
	}

	.list{
		font-size:20px;
		margin-top:5px;
		font-size:20px;

	}

	button{
		background-color: rgb(0, 163, 108);
		color:white;
	    border: none;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 16px;
	    margin: 14px 2px;
	    cursor: pointer;
	}
  }
</style>