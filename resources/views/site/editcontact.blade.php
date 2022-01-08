@include('site.layout.topdefault')

<div class="w3-container">
    <a class="w3-btn w3-blue" href="{{ route('site.index') }}">Back</a><br>
    <h3>Edit Contact</h3>
    @component('site.layout.components.formcontact', ['contact' => $contact])
    @endcomponent
</div>

@include('site.layout.footerdefault')