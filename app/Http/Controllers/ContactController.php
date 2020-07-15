<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        if (Contact::create($request->all())) {
            return redirect(route('contacts.create'))->with('success', trans('Email enviado com sucesso! Aguarde nosso contato!'));
        }
        return redirect(route('contacts.create'))->with('error', trans('Não foi possível enviar o e-mail. Tente novamente.'));
    }
}
