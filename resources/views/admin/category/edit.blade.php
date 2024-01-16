@extends('extends.main')
@section('title', 'Edit')
@section('content')
    {{-- @include('validation-error-message') --}}
    {{--Pop up error msg  --}}
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
                            <li class="breadcrumb-item active">Edit</li>
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
                                <h2 class="card-title font-weight-bold">Edit Category</h2>
                            </div>
                            <form method="POST" action=" {{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                     name="name" value="{{ $category->name }}">
                                                @if ($errors->has('name'))
                                                    <x-validation-errors>
                                                        {{ $errors->first('name') }}
                                                    </x-validation-errors>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary px-3">Update</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
