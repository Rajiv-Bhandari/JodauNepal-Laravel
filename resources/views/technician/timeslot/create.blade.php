@extends('technicianlayout.main')
@section('title', 'Create Timeslot')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('timeslot.technician') }}">Timeslot</a>
                        </li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->
    <div class="card-body table-responsive p-2">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">Add Timeslot</h2>
                            </div>
                            <form method="POST" action="{{route('timeslot.store')}}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="day">Day</label>
                                                <select class="form-control" id="day" name="day">
                                                    @foreach (\App\Enums\DayOfWeek::asAssociativeArray() as $value => $label)
                                                        <option value="{{ $value }}" {{ old('day') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('day'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('day') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="technician">Technician</label>
                                                <input type="text" class="form-control" id="technician"
                                                    placeholder="Enter Start Time" name="technician" value="{{ auth()->user()->name }}" readonly>
                                                @if ($errors->has('technician'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('technician') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_time">Start Time</label>
                                                <input type="time" class="form-control" id="start_time"
                                                    placeholder="Enter Start Time" name="start_time" value="{{ old('start_time') }}">
                                                @if ($errors->has('start_time'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('start_time') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="end_time">End Time</label>
                                                <input type="time" class="form-control" id="end_time"
                                                    placeholder="Enter End Time" name="end_time" value="{{ old('end_time') }}">
                                                @if ($errors->has('end_time'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('end_time') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary px-3">Submit</button>
                                    </div>
                            </form>
                            <p style="margin-top:20px;">*please put 2 hours gap or average of your time to fix a customer problem</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

