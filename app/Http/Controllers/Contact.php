<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as ContactMail;

class Contact extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        Mail::to( SITE_EMAIL )
            ->queue(new ContactMail( $request->get('contact') ));

        return back()->withErrors(['success'=> translate(373)]);
    }
}
