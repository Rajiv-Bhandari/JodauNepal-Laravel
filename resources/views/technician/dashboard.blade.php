<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
<h1>this is technician dashboard</h1>
<div>
    <a href="{{ route('profile.edit') }}">Edit Profile</a>
</div>