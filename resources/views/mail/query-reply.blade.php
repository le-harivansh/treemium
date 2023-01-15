<x-mail::message>
# Hi {{ $recipient }}

{{ $reply }}

Thanks,<br>
{{ config('app.name') }} team

<small>
    <strong>Your query:</strong><br>
    {{ $query }}
</small>
</x-mail::message>
