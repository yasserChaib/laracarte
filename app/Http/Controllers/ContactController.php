<?php

namespace App\Http\Controllers;

use Flashy;
use App\Model\Message;
use Illuminate\Http\Request;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FormController;
// use App\Model\Message;


class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Contact.create');
    }

    public function store(FormController $request)
    {

        $message = Message::create($request->only('name', 'email', 'message'));

        Mail::to(config('Laracarte.admin_email'))
            ->send(new ContactMessageCreated($message));

        Flashy::message('Email envoyer avec succes avec queue');

        return redirect(route('root_path'));
    }
}
