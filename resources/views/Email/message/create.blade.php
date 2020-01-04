@component('mail::message')
# Hey Yasser

<ul>
    <li>
        Name : {{$msg->name}}
    </li>
    <li>
        Email : {{$msg->email}}
    </li>
</ul>


@component('mail::panel')
Message : {{$msg->message}}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
