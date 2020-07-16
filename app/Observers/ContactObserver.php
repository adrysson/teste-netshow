<?php

namespace App\Observers;

use App\Mail\ContactRegistered;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function creating(Contact $contact)
    {
        $contact->id = Uuid::uuid4();
        $contact->ip = request()->getClientIp();

        // Upload do arquivo
        $contact->attachment = request()->file('file')->store('attachments');
    }

    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        Mail::to($contact)->send(new ContactRegistered($contact));
    }
}
