<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $limited=5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons=Person::latest()->simplePaginate($this->limited);
        return view('persons.index',compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'city'=>'required',
            'email'=>'required'
        ]);

        $person=new Person();
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->city=$request->city;
        $person->email=$request->email;
        $person->save();
        return redirect()->route('all.persons')->with('successMsg','person created successfully');
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
        $person=Person::findOrFail($id);
        return view('persons.edit',compact('person'));
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
        $person=Person::findOrFail($id);
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->city=$request->city;
        $person->email=$request->email;
        $person->save();
        return redirect()->route('all.persons')->with('successMsg','person updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person=Person::findOrFail($id);
        $person->delete();
        return redirect()->route('all.persons')-> 
               with('alertMsg','person deleted successfully');
    }
}
