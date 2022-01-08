@include('site.layout.topdefault')
<div class="w3-container">

    @include('site.layout.pagetop', ['user' => $user])

    <h3>Contacts</h3>
    @if($user != '')
        <a class="w3-btn w3-blue" href="{{ route('contact.create') }}">New Contact</a>
    @endif

    <table class="w3-table w3-striped w3-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>E-mail</th>
            @if ($user != '')
                <th>-</th>
                <th>-</th>
            @endif
        </tr>

    @foreach($contacts as $contact)
        <tr>
            <th>{{ $contact->id }}</th>
            <th>{{ $contact->name }}</th>
            <th>{{ $contact->contact }}</th>
            <th>{{ $contact->email }}</th>
            @if ($user != '')
                <th><a href="{{ route('contact.edit', ['contact' => $contact->id]) }}">Edit</a></th>
                <th>Delete</th>
            @endif
        </tr>
    @endforeach
    </table>

</div>

@include('site.layout.footerdefault')