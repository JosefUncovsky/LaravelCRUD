<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        // $contacts = Contact::all();
        $contacts = $contact->sortable()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

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
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'interpret'=>'required|string',
            'genre'=>'required|string',
            'release_year'=>'required|integer|min:1909|max:2020',
             'obal' => 'required|image|mimes:jpeg,jpg,png|max:2048'


        ]);
         $obal = $request->file('obal');
         $obalName = rand() . '.' . $obal->getClientOriginalExtension();
         $obalPath = request('obal')->storeAs('images', $obalName);
        //$obal->storeAs('images', $obalName);
        $contact = new Contact([
            'name' => $request->get('name'),
            'interpret' => $request->get('interpret'),
            'genre' => $request->get('genre'),
            'release_year' => $request->get('release_year'),
            'obal' => $obalPath
            //public_path('images')
            //obal->store(public_path('images'), $obalName)
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Cd vytvořeno!')->with('path', $obalName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'interpret'=>'required|string',
            'genre'=>'required|string',
            'release_year'=>'required|integer|min:1909|max:2020',
            'obal' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $obal = $request->file('obal');
        $obalName = rand() . '.' . $obal->getClientOriginalExtension();
        $obalPath = request('obal')->storeAs('images', $obalName);
        $contact = Contact::find($id);
        $contact->name =  $request->get('name');
        $contact->interpret = $request->get('interpret');
        $contact->genre = $request->get('genre');
        $contact->release_year = $request->get('release_year');
        $contact->obal = $obalPath;
        $contact->save();

        return redirect('/contacts')->with('success', 'CD editováno!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');
    }
}
