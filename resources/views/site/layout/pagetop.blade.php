<br>
@if ($user != '')
    <p>Welcome, <b>{{ $user }}</b>
        <a class="w3-btn w3-blue w3-small" href="{{ route('site.logout') }}">Logout</a>
    </p>
@else
    <a class="w3-btn w3-blue w3-small" href="{{ route('site.login') }}">Login</a>
@endif
<hr>