@component('mail::message')
# From, {{$contact_info['first_name'].' '.$contact_info['last_name']}}

<strong>#Email : </strong> {{$contact_info['email'] }}
<br>
<strong>#Phone : </strong> {{$contact_info['phone'] ?? 'not provided'}}
<br>
<strong>#Message : </strong> {{$contact_info['message']}}
{{-- @component('mail::button', ['url' => 'ayatacademy.com'])
Click Here
@endcomponent --}}
<br>
If you did not request a signup , no further action is required.

Thanks,
{{ config('app.name') }}
@endcomponent