@extends('technicianlayout.main')
@section('title', 'Payments')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payments</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
              
                    <div class="card">
                      
                        <div class="card-body table-responsive p-2">
                            <table class="datatable table">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Booking Id</th>
                                        <th>Amount (Rs.)</th>
                                        <th>Mobile Number</th>
                                        <th>Paid By</th>
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
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
              </div>
         </div>
     </section>
</div>

@endsection

