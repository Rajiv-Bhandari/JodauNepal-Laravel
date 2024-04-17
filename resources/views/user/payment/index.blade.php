@extends('userlayouts.admin')
@section('title', 'Payment')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Payments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="bookingTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Booking Id</th>
                                        <th>Amount In Paisa</th>
                                        <th>Mobile Number</th>
                                        <th>Paid To</th>
                                        <th>Transaction Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment as $payment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$payment->booking_id}}</td>
                                        <td>{{$payment->amount_in_paisa}}</td>
                                        <td>{{$payment->mobile}}</td>
                                        <td>{{$payment->paid_to}}</td>
                                        <td>{{$payment->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>



@endsection
