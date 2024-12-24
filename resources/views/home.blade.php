@extends('layouts.master')

@section('content')

<div class="h-screen py-10">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-3 bg-white text-cenfullr rounded-full"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl text-white rounded-l h-full bg-teal-600 px-7 py-5">
                    <span>{{ count($employees) }}</span>
                </div>
                <div class="col-span-9 px-7 py-6 rounded-r bg-teal-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('employees') }}" class="text-black text-xl">Total Employees</a>
                        </div>  
                    </div>
                </div>
            </div>   
        </div>
    
        <div class="col-span-3 bg-white rounded-full text-center"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-blue-500 px-7 py-5">
                    <span>{{ count($clients) }}</span>
                </div>
                <div class="col-span-9 px-7 py-6 rounded-r bg-blue-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('clients') }}" class="text-black text-xl">Total Clients</a>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>

        <div class="col-span-3 bg-white rounded-full text-center"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-rose-400 px-7 py-5">
                    <span>{{ count($supervisors) }}</span>
                </div>
                <div class="col-span-9 bg-white px-7 py-6 rounded-r bg-rose-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-black text-xl">Total Supervisors</span>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>

        <div class="col-span-3 bg-white rounded-full text-center">
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-yellow-400 px-7 py-5">
                    <span>{{ count($shifts) }}</span>
                </div>
                <div class="col-span-9 bg-white px-7 py-6 rounded-r bg-yellow-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('shifts') }}" class="text-black text-xl">Total Shifts</a>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 mt-2">
        <div class="col-span-3 bg-white rounded-full text-center"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-cyan-600 px-7 py-5">
                    <span>{{ count($bookings) }}</span>
                </div>
                <div class="col-span-9 px-7 py-6 rounded-r bg-cyan-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('bookings') }}" class="text-black text-xl">Total Bookings</a>
                        </div>  
                    </div>
                </div>
            </div>  
        </div>

        <div class="col-span-3 rounded-full text-center"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-purple-400 px-7 py-5">
                    <span>{{ count($timesheets) }}</span>
                </div>
                <div class="col-span-9 px-7 py-6 rounded-r bg-purple-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('timesheets') }}" class="text-black text-xl">Total Timesheets</a>
                        </div>  
                    </div>
                </div>
            </div>  
        </div>

        <div class="col-span-3 bg-white rounded-full text-center">
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-orange-400 px-7 py-5">
                    <span>{{ count($payrolls) }}</span>
                </div>
                <div class="col-span-9 px-7 py-6 rounded-r bg-orange-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('payrolls') }}" class="text-black text-xl">Total Payrolls</a>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>

        <div class="col-span-3 bg-white rounded-full text-center"> 
            <div class="grid grid-cols-12">
                <div class="col-span-3 text-3xl rounded-l text-white h-full bg-cyan-400 px-7 py-5">
                    <span>{{ count($invoices) }}</span>
                </div>
                <div class="col-span-9 bg-white px-7 py-6 rounded-r bg-cyan-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('invoices') }}" class="text-black text-xl">Total Invoices</a>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div>
        <div class="mt-5" id="curve_chart" style="width: 100%; height: 600px;"></div>
    </div>
    <div>

    </div>
</div>

@endsection


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        
        var data = google.visualization.arrayToDataTable(<?= $data ?>);

        var options = {
            title: 'Payment Performance',
            curveType: 'function',
            legend: { position: 'bottom' },
            colors: ['#db2777', 'teal']
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }   
    
</script>