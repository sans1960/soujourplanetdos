@component('mail::message')
# Welcome to Sojourplanet

Dear {{ $data['trait'] }} {{ $data['name'] }} {{ $data['surname'] }}

Your travel interest to : {{ $data['subregion'] }}

Soon will recived ours notices

{{ $data['triptype'] }}

{{ $data['postname'] }}

{{ $data['countryname'] }}


@component('mail::button', ['url' => 'https://sojournplanet.com/home'])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
