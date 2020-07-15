@component('mail::message')
@lang('Um novo e-mail foi enviado na página de contato:')
<br>
{{ $contact->message }}
<br>
@lang('Atenciosamente'),
<br>
<br>
{{ $contact->name }}
<br>
{{ $contact->phone }}
@endcomponent
