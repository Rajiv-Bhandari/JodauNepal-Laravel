@extends('extends.main')
@section('title','Category')
@section('content')
    {{-- work here --}}
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
               <h1>this is category page</h1>
            </div>
        </section>
    </div>
    
@endsection
