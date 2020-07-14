@extends('layouts.app')

@section('content')
<section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">
        @lang('Entre em contato')
    </h2>

    <p class="text-center w-responsive mx-auto mb-5">
        @lang('Você tem alguma dúvida? Caso tenha, preencha o formulário abaixo para nos contatar.')
    </p>

    <div class="col-md-8 offset-md-2 mb-5">
        <form id="contact-form" action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name">
                            @lang('Seu nome')
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="email" id="email" name="email" class="form-control">
                        <label for="email">
                            @lang('Seu e-mail')
                        </label>
                    </div>
                </div>
            </div>

            <div class="md-form mb-0">
                <input type="tel" id="phone" name="phone" class="form-control phone">
                <label for="phone">
                    @lang('Telefone')
                </label>
            </div>

            <div class="md-form">
                <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea>
                <label for="message">
                    @lang('Mensagem')
                </label>
            </div>

            <div class="md-form">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="attachment" aria-describedby="attachment">
                        <label class="custom-file-label" for="attachment">
                            @lang('Escolha um arquivo para anexar')
                        </label>
                    </div>
                </div>
            </div>

            <div class="text-md-left">
                <button type="submit" class="btn btn-primary">
                    @lang('Enviar')
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
    <script src="js/contact.js"></script>
@endpush