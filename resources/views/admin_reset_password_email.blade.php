<x-mail::message>
# Introduction



<x-mail::panel :url="''">
reset code is     {{ $resetCode}}
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
