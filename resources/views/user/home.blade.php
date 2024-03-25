@extends('userlayouts.admin')

@section('content')
<div>
    @if(session('message'))
        <h2 class="alert alert-success">{{ session('message') }}</h2>    
    @endif
</div>

<div class="row">
    <div class="col-md-6">
        <canvas id="combinedChart" width="400" height="400"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="technicianPieChart" width="400" height="200"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Combined chart
    var ctxCombined = document.getElementById('combinedChart').getContext('2d');
    var combinedChart = new Chart(ctxCombined, {
        type: 'bar',
        data: {
            labels: ['Total Bookings', 'Total Comments', 'Total Addresses'],
            datasets: [{
                label: 'Total Bookings',
                data: [{{ $totalBookings }}, 0, 0],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Total Comments',
                data: [0, {{ $totalComments }}, 0],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Total Addresses',
                data: [0, 0, {{ $totalAddresses }}],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

// Technician pie chart
var ctxTechnicianPie = document.getElementById('technicianPieChart').getContext('2d');
var technicianPieChart = new Chart(ctxTechnicianPie, {
    type: 'pie',
    data: {
        labels: {!! json_encode($technicianCounts->pluck('skill_name')) !!},
        datasets: [{
            label: 'Total Technicians',
            data: {!! json_encode($technicianCounts->pluck('count')) !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Available Technician Details',
                position: 'bottom'
            },
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
});

</script>

@endsection
