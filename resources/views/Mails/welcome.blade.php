@component('mail::message')
# Welcome to my test app

This is a mail to test the emailing service.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
