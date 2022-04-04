<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
     <header>Congratulations {{ $booking->employee->name }}, You are booked</header>
     <table>
     	<tr>
     		<td><b>Client name:</b></td>
     		<td>{{ $booking->client->name }}</td>
     	</tr>

     	<tr>
     		<td><b>Start date and time:</b></td>
     		<td>{{ $booking->start }}</td>
     	</tr>

     	<tr>
     		<td><b>End date and time:</b></td>
     		<td>{{ $booking->end }}</td>
     	</tr>
   		
     </table>

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

  }
</style>