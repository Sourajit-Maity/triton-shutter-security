@component('mail::message')
# Account Verification Request
{{ $details['title'] }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
