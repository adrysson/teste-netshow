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
        <form id="contact-form" action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="name">
                            @lang('Seu nome')
                        </label>
                        <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="email">
                            @lang('Seu e-mail')
                        </label>
                        <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md-form mb-0">
                <label for="phone">
                    @lang('Telefone')
                </label>
                <input type="tel" value="{{ old('phone') }}" id="phone" name="phone" class="form-control phone @error('phone') is-invalid @enderror" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="md-form">
                <label for="message">
                    @lang('Mensagem')
                </label>
                <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="custom-file @error('file') was-validated @enderror">
                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file" aria-describedby="file" required>
                <label class="custom-file-label" for="file">
                    @lang('Escolha um arquivo para anexar')
                </label>
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="text-md-left mt-3">
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