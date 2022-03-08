<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdf</title>
</head>
<body>
    <p >WEEK ENDING SUNDAY <span>{{ $timesheet->day_weekend }}</span></p>
    <p >FIRM NAME <h3>{{ Auth::user()->client_by_employee->client->name }}</h3></p>
    <p >EMPLOYEE'S NAME <h3>{{ Auth::user()->client_by_employee}}</h3></p>

    <table style="width:100%">
        <tr>
            <th>DATE</th>
            <th>TIME IN</th>
            <th>TIME OUT</th>
            <th>BREAK</th>
            <th>TOTAL</th>
            <th>SIGNATURE</th>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td>Mon 2/28</td>
            <td>9:30 AM</td>
            <td>3:15 AM</td>
            <td></td>
            <td>17.75</td>
            <td></td>
        </tr>

        <tr>
            <td colspan="4">TOTAL HOURS WORKED TO NEAREST 1/4 HOUR</td>
            <td>118.25</td>
            <td></td>
        </tr>
    </table>

    <span>
        <div>EMPLOYEE'S SIGNATURE</div>


        <div>SUPERVISOR'S NAME</div>


        <div>SUPERVISOR'S SIGNATURE</div>

    </span>
</body>
</html>




<style type="text/css">
    p{
        font-size:small;
        font-family: sans-serif;
    }

    table,th,td{
        border:1px solid black;
        border-collapse: collapse;
        padding: 7px;
    }

    span{
        height:50px;
    }

    div{
        margin-top:15px;
    }
</style>