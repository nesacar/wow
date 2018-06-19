@component('mail::message')
# Message from contact form

Name: {{ $message->name }} <br>
Email: {{ $message->email }} <br>
Country: {{ $message->country }} <br>
Phone: {{ $message->phone }} <br>
Message: {{ $message->message }} <br>

Thanks,<br>
WowMalta
@endcomponent
