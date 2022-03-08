<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdf</title>
</head>
<body>
    <h1 class="heading">TIMESHEET</h1>
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
            <td>{{ $workday->total_hours }}</td>
        </tr>
        @endforeach

    

        <tr>
            <td colspan="4" class="text-bold">TOTAL HOURS WORKED</td>
            <td class="text-bold">{{ $timesheet->workdays->sum('total_hours') }}</td>
        </tr>
    </table>

    
</body>
</html>




<style type="text/css">
    p {
        font-size:small;
        font-family: sans-serif;
    }

    table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        padding: 7px;
        text-align: center;
    }

    span {
        height:50px;
    }

    div {
        margin-top:15px;
    }

    .text-bold {
        font-weight: bold;
    }   

    .heading {
        font-weight: bold;
        text-align: center;
    }
</style>