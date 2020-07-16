@component('mail::message')
@lang('Um novo e-mail foi enviado na página de contato:')
<br>
<br>
{{ $contact->message }}
<br>
<br>
@lang('Atenciosamente'),
<br>
<br>
{{ $contact->name }}
<br>
{{ $contact->phone }}
@endcomponent
