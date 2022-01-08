@if(isset($contact->id))
    <form method="post" action="{{ route('contact.update', ['contact' => $contact->id]) }}">
         @csrf
         @method('PUT')
@else
    <form method="post" action="{{ route('contact.store') }}">
        @csrf
@endif

    <label for="name">Name</label><br>
    <input type="text" name="name" value="{{ $contact->name ?? old('name') }}" autofocus>
    <span style="color:red"><i>{{ $errors->has('name') ? $errors->first('name') : '' }}</i></span>
    <br>
    <label for="contact">Contact Number</label><br>
    <input type="text" name="contact" value="{{ $contact->contact ?? old('contact') }}">
    <span style="color:red"><i>{{ $errors->has('contact') ? $errors->first('contact') : '' }}</i></span>
    <br>
    <label for="email">E-mail</label><br>
    <input type="text" name="email" value="{{ $contact->email ?? old('email') }}">
    <span style="color:red"><i>{{ $errors->has('email') ? $errors->first('email') : '' }}</i></span>
    <br><br>
    <button class="w3-btn w3-blue w3-small">Save</button>
</form>