@extends('technicianlayout.main')
@section('title', 'Timeslot')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Time Slot</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('timeslot.create')}}" class="btn btn-primary px-4 m-2 float-right">Add</a>
            </ol>
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
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timeslot as $timeslot)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ \App\Enums\DayOfWeek::getDescription($timeslot->day) }}</td>
                                        <td>{{$timeslot->start_time}}</td>
                                        <td>{{$timeslot->end_time}}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{route('timeslot.edit', [$timeslot->id])}}" title="Edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form method="POST" action="{{ route('timeslot.destroy', $timeslot->id) }}" onsubmit="return confirm('Are you sure you want to delete this timeslot?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: none; border: none; color: red;" title="Delete">
                                                    <i class="fas fa-trash-alt fa-lg" style="color: red;"></i>
                                                </button>
                                            </form>
                                        </td>
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

