@extends('userlayouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Welcome , {{ auth()->user()->name }}
                </div>
                <div class="card-body">
                    <p class="lead">Thank you for choosing our platform. We provide a comprehensive job portal for technicians such as home tutors, electricians, plumbers, nurses, and barbers. In the user portal, you can easily hire technicians for various tasks. Our admin portal provides detailed reports and allows administrators to verify technicians.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Our Goals
                </div>
                <div class="card-body">
                    <p class="card-text">Our goal is to revolutionize the way people find skilled professionals for their tasks. We aim to:</p>
                    <ul class="list-group">
                        <li class="list-group-item">Provide a comprehensive job portal for technicians such as home tutors, electricians, plumbers, nurses, and barbers.</li>
                        <li class="list-group-item">Offer a user-friendly portal for easy hiring of technicians for various tasks.</li>
                        <li class="list-group-item">Enable administrators to access detailed reports for better management.</li>
                        <li class="list-group-item">Implement a robust verification process for technicians to ensure reliability and safety.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container mt-5" style="background-color: #ffffff;">
    <div class="row">
        <div class="col-md-6">
            <canvas id="combinedChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="technicianPieChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Combined chart
    var ctxCombined = document.getElementById('combinedChart').getContext('2d');
    var combinedChart = new Chart(ctxCombined, 
    {
        type: 'bar',
        data: {
        labels: ['Total Bookings', 'Total Comments', 'Total Addresses'],
        datasets: [{
            label: 'Total Bookings',
            data: [{{ $totalBookings }}, 0, 0],
            backgroundColor: 'rgba(54, 162, 235, 0.6)', // Adjust the alpha (opacity) value to darken
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, 
        {
            label: 'Total Comments',
            data: [0, {{ $totalComments }}, 0],
            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Adjust the alpha (opacity) value to darken
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, 
        {
            label: 'Total Addresses',
            data: [0, 0, {{ $totalAddresses }}],
            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Adjust the alpha (opacity) value to darken
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
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
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
