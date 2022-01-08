@include('site.layout.topdefault')

<div class="w3-container">
    <br>
    <a class="w3-btn w3-blue w3-small" href="{{ route('site.index') }}">Back</a><br>
    <h3>Login</h3>

    <form method="post" action="{{ route('site.authenticate') }}">
        @csrf
        <label for="user">User:</lable><br>
        <input id="user" value="{{ old('user') }}" type="text" name="user" autofocus>
        <span style="color:red"><i>{{ $errors->has('user') ? $errors->first('user') : '' }}</i></span>
        <br>
        <label for="password">Password:</label><br>
        <input type="password" name="password">
        <span style="color:red"><i>{{ $errors->has('password') ? $errors->first('password') : '' }}</i></span>
        <br><br>
        <button type="submit" class="w3-btn w3-blue w3-small">Login</button>
    </form>

    @if($message != '')
        <div class="w3-panel w3-red">
            <p>{{ $message }}</p>
        </div>
    @endisset
</div>

@include('site.layout.footerdefault')