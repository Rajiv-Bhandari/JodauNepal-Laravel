@extends('userlayouts.admin')

@section('content')
 
<div>
    @if(session('message'))
        <h2 class="alert alert-success">{{session('message')}}</h2>    
    @endif
</div>

<h1>this is user dashboard page</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>


@endsection
   
