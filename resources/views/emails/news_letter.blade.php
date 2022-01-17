@component('mail::message')
<strong>#Email : </strong> {{$email }}
<br>

Has been added to news letter list
@endcomponent --}}
<br>

Thanks,
{{ config('app.name') }}
@endcomponent
