@component('mail::message')
# Price dropped

You wanted an alert when the price goes under {{ $watcher->price }}

@component('mail::panel')
Currently the price is {{ $price }}
@endcomponent

@component('mail::button', ['url' => $watcher->url])
Go buy it
@endcomponent

@component('mail::subcopy')
If you no longer want to get these emails, you can remove the watchers here: <a href="{{ url('watchers') }}">{{
    url('watchers') }}</a>
@endcomponent

Your welcome,<br>
{{ config('app.name') }}
@endcomponent
