@component('mail::message')
# Introduction

Dear {{ $info['trait'] }} {{ $info['name'] }} {{ $info['surname'] }}

Your  interest to : {{ $info['article'] }}

Soon will recived ours notices


@component('mail::button', ['url' => 'https://sojournplanet.com/home'])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
