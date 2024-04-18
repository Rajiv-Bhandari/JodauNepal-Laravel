@extends('extends.main')
@section('title', 'Payments')
@section('content')

<div class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item active">Users Payments</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
              
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title font-weight-bold">Payments</h1>
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table class="datatable table">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Booking Id</th>
                                        <th>Amount (Rs.)</th>
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
                                        <td>{{$payment->amount_in_paisa / 100 }}</td>
                                        <td>{{$payment->mobile}}</td>
                                        <td>{{$payment->technician->fullname}}</td>
                                        <td>{{$payment->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
