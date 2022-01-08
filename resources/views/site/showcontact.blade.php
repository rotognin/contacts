@include('site.layout.topdefault')
<div class="w3-container">
    <a class="w3-btn w3-blue" href="{{ route('site.index') }}">Home</a><br>

    <h3>Contact updated!</h3>
    <br>
    <table class="w3-table w3-striped w3-bordered">
        <tr><td>ID</td><td>{{ $contact->id }}</td></tr>
        <tr><td>Name</td><td>{{ $contact->name }}</td></tr>
        <tr><td>Contact</td><td>{{ $contact->contact }}</td></tr>
        <tr><td>E-mail</td><td>{{ $contact->email }}</td></tr>
    </table>

</div>

@include('site.layout.footerdefault')