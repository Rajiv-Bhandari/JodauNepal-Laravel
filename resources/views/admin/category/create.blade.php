@extends('extends.main')
@section('title', 'Create')
@section('content')
    
<div class="content">
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
</div>
{{--  --}}

    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('category.index') }}">Category</a>
                            </li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title font-weight-bold">Add Category</h2>
                            </div>
                            <form method="POST" action=" {{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter Name Here" name="name" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('name') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary px-3">Create</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
