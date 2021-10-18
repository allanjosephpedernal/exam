@component('mail::message')
# Introduction

Hello Dear,<br>
Here's your 6 digit pin: {{ $pin }}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
