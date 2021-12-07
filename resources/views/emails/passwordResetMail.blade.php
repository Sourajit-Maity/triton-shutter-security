@component('mail::message')
# Password Reset Request
{{ $details['title'] }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
