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
                <th> </th>
                <th> </th>
                <th> </th>
            @endif
        </tr>

    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            @if ($user != '')
                <td style="padding:0px"><a class="w3-btn w3-blue w3-small" style="margin-top:2px" href="{{ route('contact.show', ['contact' => $contact->id]) }}">Details</a></td>
                <td style="padding:0px"><a class="w3-btn w3-blue w3-small" style="margin-top:2px" href="{{ route('contact.edit', ['contact' => $contact->id]) }}">Edit</a></td>
                <td style="padding:0px">
                    <form id="form_{{ $contact->id }}" method="POST" action="{{ route('contact.destroy', ['contact' => $contact->id]) }}">
                        @csrf
                        @method('DELETE')
                        <a class="w3-btn w3-red w3-small" style="margin-top:2px" href="#" onclick="document.getElementById('form_{{ $contact->id }}').submit()">Delete</a>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
    </table>

</div>

@include('site.layout.footerdefault')