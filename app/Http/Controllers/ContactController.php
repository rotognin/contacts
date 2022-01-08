<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $saverules = [
        'name' => ['required', 'min:6'],
        'contact' => ['digits:9', 'unique:contacts'],
        'email' => ['email', 'unique:contacts']
    ];

    public $updaterules = [
        'name' => ['required', 'min:6'],
        'contact' => ['digits:9'],
        'email' => ['email']
    ];

    public $feedback = [
        'required' => 'The field :attribute is required',
        'name.min' => 'Must have at least 6 characters',
        'digits' => 'Only numbers is accepted, must have 9 digits',
        'contact.unique' => 'Contact number already taken',
        'email.unique' => 'E-mail number already taken',
        'email' => 'Invalid e-mail'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
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
        $request->validate($this->saverules, $this->feedback);
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
        return view('site.showcontact', ['contact' => $contact]);
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
        $request->validate($this->updaterules, $this->feedback);

        //$contact = Contact::find($request->get('id'));
        $contact->update($request->all());

        return redirect()->route('contact.show', ['contact' => $contact]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index');
    }
}
