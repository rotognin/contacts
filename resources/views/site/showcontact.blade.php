@include('site.layout.topdefault')
<div class="w3-container">
    <br>
    <a class="w3-btn w3-blue w3-small" href="{{ route('site.index') }}">Home</a><br>

    <h3>Contact details:</h3>
    <br>
    <table class="w3-table w3-striped w3-bordered">
        <tr><td>ID</td><td>{{ $contact->id }}</td></tr>
        <tr><td>Name</td><td>{{ $contact->name }}</td></tr>
        <tr><td>Contact</td><td>{{ $contact->contact }}</td></tr>
        <tr><td>E-mail</td><td>{{ $contact->email }}</td></tr>
    </table>
    <br>
    <a class="w3-btn w3-blue w3-small w3-left" style="margin-right:10px;" href="{{ route('contact.edit', ['contact' => $contact->id]) }}">Edit</a>
    <form id="form_{{ $contact->id }}" method="POST" action="{{ route('contact.destroy', ['contact' => $contact->id]) }}">
        @csrf
        @method('DELETE')
        <a class="w3-btn w3-red w3-small" href="#" onclick="document.getElementById('form_{{ $contact->id }}').submit()">Delete</a>
    </form>

</div>

@include('site.layout.footerdefault')