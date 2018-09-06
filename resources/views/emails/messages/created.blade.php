@component('mail::message')
# Hey Admin

- {{ $email}}

@component('mail::panel')
{{ $msg }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
