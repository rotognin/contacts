@include('site.layout.topdefault')

<div class="w3-container">
    <br>
    <a class="w3-btn w3-blue w3-small" href="{{ route('site.index') }}">Back</a><br>
    <h3>Edit Contact</h3>
    @component('site.layout.components.formcontact', ['contact' => $contact])
    @endcomponent
</div>

@include('site.layout.footerdefault')