@include('site.layout.topdefault')

<div class="w3-container">
    <br>
    <a class="w3-btn w3-blue w3-small" href="{{ route('site.index') }}">Back</a><br>
    <h3>New Contact</h3>
    @component('site.layout.components.formcontact')
    @endcomponent
</div>

@include('site.layout.footerdefault')