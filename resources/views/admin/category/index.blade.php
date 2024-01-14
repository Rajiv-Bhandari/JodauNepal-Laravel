@extends('extends.main')
@section('title', 'Category')
@section('content')

@include('sweetalert::alert')
<div class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item active">Category</li>
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
                            <h1 class="card-title font-weight-bold">Category</h1>
                            <a href="{{route('category.create')}}" class="btn btn-primary px-4 m-2 float-right">Add</a>
                           
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table class="datatable table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $category)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td class="text-center">
                                       
                                                @if ($category->status == Status::Active)
                                                  <a id="status" href="{{route ('category.toggle', $category->id)}}" class="badge p-2 rounded" style="background-color:#ceefd1;color:#007b0bba">Active</a>
                                                @else
                                                  <a id="status" href="{{route('category.toggle', $category->id)}}" class="badge p-2 rounded" style="background-color: #efdace;color:#cb642a">Inactive</a>
                                                 @endif
                                   
                                        </td>
                                       
                                        <td class="text-center">
                                            <a href="{{route('category.edit', $category->id)}}" title="Edit Category">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>
                                        </td>
                                    
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
