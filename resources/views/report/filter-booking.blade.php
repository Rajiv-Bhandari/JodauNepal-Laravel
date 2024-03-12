@extends('extends.main')
@section('title', 'Report')
@section('content')

    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2">
                            <div class="card-body col-md-12">
                                <div class="card-header text-bold">Bookings Report :</div>
                                <div class="col-12 py-1" style="clear:both;">&nbsp;</div>
                                    <form type="GET" action="#">
                                        <input type="hidden" value="false" name="isPdf">                                    

                                        <!-- Booking Status -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-title">Booking Status</label>
                                                <select class="form-control" name="booking_status">
                                                    <option value="">Select Status</option>
                                                    @foreach(App\Enums\BookingStatus::getKeys() as $status)
                                                        <option value="{{ $status }}">{{ ucwords($status) }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('booking_status'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('booking_status') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Technician -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-title">Technician</label>
                                                <select class="form-control" name="technician">
                                                    <option value="">Select Technician</option>
                                                    @foreach($technicians as $technician)
                                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('technician'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('technician') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="row p-2">
                                            <div class="col-2 px-2" style="float: inline-block">
                                                <label class="control-label">From Date</label>
                                                <br/>
                                                <input type="date" name="from_date" class="date" value="{{ old('from_date') }}" style="padding-inline: 20px"/>
                                                @if ($errors->has('from_date'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('from_date') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                            <div class="col-2 mx-10 px-4" style="float: inline-end">
                                                <label class="control-label">To Date</label> <br/>
                                                <input type="date" name="to_date" class="date" value="{{ old('to_date', now()->toDateString()) }}" style="padding-inline: 20px" />
                                                @if ($errors->first('to_date'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('to_date') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        <div style="clear:both;">&nbsp;</div>
                                        <div class="col-md-12 py-2">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection
