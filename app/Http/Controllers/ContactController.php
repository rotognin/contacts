<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $rules = [
        'name' => ['required', 'min:6'],
        'contact' => ['digits:9', 'unique:contact'],
        'email' => ['email', 'unique:contact']
    ];

    public $feedback = [
        'required' => 'The field :attribute is required',
        'name.min' => 'Must have at least 6 characters',
        'digits' => 'Only numbers is aceepted, must have 9 digits',
        'unique' => ':atribute already taken',
        'email' => 'Invalid e-mail'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $user = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';

        $contacts = Contact::all();

        return view('site.index', ['contacts' => $contacts, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.createcontact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate($this->rules, $this->feedback);
        Contact::create($request->all());

        return redirect()->route('site.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('site.editcontact', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {   
        $request->validate($this->rules, $this->feedback);

        $contact = Contact::find($request->id);
        $contact->update($request->all());

        return redirect()->route('contact.show', ['contact' => $contact->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
