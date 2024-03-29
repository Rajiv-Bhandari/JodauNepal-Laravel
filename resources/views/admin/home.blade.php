@extends('extends.main')

@section('title', 'Dashboard')

@section('content')
<style>
    .box {
        padding: 5px;
        text-align: center;
        cursor: pointer;
        background-color: #f4f4f4;
        transition: background-color 0.3s;
        border-radius: 10px;
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
    }
   
    .box h2 {
        margin: 0;
        font-size: 28px;
    }

    .box p {
        margin: 0;
        font-size: 15px;
    }

    .box:hover {
        background-color: #a16c6c;
    }

    .box-branch {
        background-color: #3498db;
        color: white;
    }

    .box-department {
        background-color: #2ecc71;
        color: white;
    }

    .box-booking {
        background-color: #8B4513;
        color: white;
    }

    .box-category {
        background-color: #e74c3c;
        color: white;
    }

    .box-vendor {
        background-color: #f39c12;
        color: white;
    }

    .box-assets {
        background-color: #9b59b6;
        color: white;
    }

    .box-bg {
        margin-bottom: 20px;
    }

    .box-icon {
        font-size: 36px;
        margin-bottom: 10px;
    }
    .box-reqassets{
        background-color: #b72a73;
        color: white;
    }
   
    .box-request{
        background-color: #6C747C;
        color: white;
    }
    .box-return{
        background-color: #39a74d;
        color: white;
    }
    .box-reject{
        background-color: #DC3545;
        color: white;
    }
    .box-approve{
        background-color: #17A3B9;
        color: white;
    }
    .box-confirm{
        background-color: #0069D9;
        color: white;
    }
    .box-cancel{
        background-color: #c94c59;
        color: white;
    }

    /* Remove box borders */
    .box {
        border: none;
    }
    .box-chart {
    background-color: #f4f4f4;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s;
    border-radius: 10px;
    box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
    height: 350px; /* Set a fixed height for both boxes */
}

.box-chart:hover {
    background-color: transparent;
}

.chart-container {
    width: 100%;
    height: 100%; /* Make sure the chart takes the full height of the container */
}


</style>
<div class="container">
    <div class="row" style="margin-top:30px;">
        
        <div class="col-md-4 box-bg">
            <a href="{{ url('/admin-technicians?status=requested') }}">
                <div class="box box-vendor">
                    <i class="fas fa-truck box-icon"></i>
                    <h2>{{ $pending }}</h2>
                    <p>Requested Technicians</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 box-bg">
            <a href="{{ url('/admin-technicians?status=approved') }}">
                <div class="box box-assets">
                    <i class="fas fa-laptop box-icon"></i>
                    <h2>{{ $approved }}</h2>
                    <p>Approved Technicians</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 box-bg">
            <a href="{{ url('/admin-technicians?status=rejected') }}">
                <div class="box box-reqassets">
                    <i class="fas fa-laptop box-icon"></i>
                    <h2>{{ $rejected }}</h2>
                    <p>Rejected Technicians</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 box-bg">
            <a href="{{route('user.index')}}">
                <div class="box box-branch">
                    <i class="fas fa-code-branch box-icon"></i>
                    <h2>{{ $users }}</h2>
                    <p>Users</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 box-bg">
            <a href="{{ route('category.index') }}">
                <div class="box box-department">
                    <i class="fas fa-tags box-icon"></i>
                    <h2>{{ $category }}</h2>
                    <p>Category</p>
                </div>
            </a>
        </div>
        <div class="col-md-4 box-bg">
            <a href="#">
                <div class="box box-booking">
                    <i class="fas fa-tags box-icon"></i>
                    <h2>{{ $totalbooking }}</h2>
                    <p>Completed Bookings</p>
                </div>
            </a>
        </div>
    </div><br>
    <div class="row">
        <!-- First Box -->
        <div class="col-md-6">
            <div class="box box-chart">
                <h2>Booking Status</h2>
                <div class="chart-container">
                    <canvas id="bookingStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Second Box (Add your content here) -->
        <div class="col-md-6">
            <div class="box box-chart">
                <h2>Users Gained (Last 5 Weeks)</h2>
                <div class="chart-container">
                    <canvas id="totalUsersChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Draw the pie chart
        const pieChartData = @json($pieChartData);

        const ctx = document.getElementById('bookingStatusChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(pieChartData),
                datasets: [{
                    data: Object.values(pieChartData),
                    backgroundColor: ['#3498db', '#e74c3c', '#2ecc71', '#f39c12'],
                }],
            },
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Bar chart for total users in the last five weeks
        const totalUsersData = @json($totalUsersLastFiveWeeks);
        const labels = @json($labels);

        const ctxTotalUsers = document.getElementById('totalUsersChart').getContext('2d');
        new Chart(ctxTotalUsers, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Users',
                    data: totalUsersData,
                    backgroundColor: '#3498db',
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>

@endsection