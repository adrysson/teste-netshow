<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactRegistered;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $path = $request->file('file')->store('attachments');

        $request->request->add(['attachment' => $path]);

        if ($contact = Contact::create($request->all())) {
            Mail::to($contact)->send(new ContactRegistered($contact));
            return redirect(route('contacts.create'))->with('success', trans('Email enviado com sucesso! Aguarde nosso contato!'));
        }

        Storage::delete($path);
        return redirect(route('contacts.create'))->with('error', trans('Não foi possível enviar o e-mail. Tente novamente.'));
    }
}
