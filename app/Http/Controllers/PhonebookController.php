<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phonebookrequest;
use App\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Phonebook::orderBy('name','DESC')->get();
    }

    public function getData(){
        return Phonebook::orderBy('name','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Phonebookrequest $request)
    {
        $phonebook = new Phonebook;
        $phonebook->name =$request->name;
        $phonebook->phone = $request->phone;
        $phonebook->email = $request->name;
        $phonebook->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Phonebookrequest $request)
    {
        $phonebook = Phonebook::find($request->id);
        $phonebook->name =$request->name;
        $phonebook->phone = $request->phone;
        $phonebook->email = $request->email;
        $phonebook->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Phonebook::find($id)->delete();
    }
}
