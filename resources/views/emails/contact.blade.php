@component('mail::message')
# Introduction

## Hello There {{ $contactName }}!

Janus Nic has sent you a message.
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
