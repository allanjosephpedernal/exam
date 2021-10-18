@component('mail::message')
# Introduction

Hello Dear,<br>
Please click the button below to register in our website.<br>

@component('mail::button', ['url' => '/registration/'.$email])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
