@if ($user != '')
    <p>Welcome, <b>{{ $user }}</b>
        <a class="w3-btn w3-blue" href="{{ route('site.logout') }}">Logout</a>
    </p>
@else
    <a class="w3-btn w3-blue" href="{{ route('site.login') }}">Login</a>
@endif
<hr>