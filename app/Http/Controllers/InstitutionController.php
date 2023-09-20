<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        $institution = Institution::find(1);
        if($institution){
            return view('institution.index', compact('institution'));
        }
        return redirect("home");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:50',
            'contacts' => 'nullable|string',
            'about' => 'nullable|string',
            'terms' => 'nullable|string',
            'privacy' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5126',
            'visible_apps' => 'nullable',
            'address' => 'nullable|string|max:500'
        ]);

        $institution->update($validatedData);

        $carr_file  = $request->file('logo');
        if($carr_file){
            FileStorage::delete($institution->logo, 'img/system');
            $image = FileStorage::upload($carr_file, $carr_file->getClientOriginalName(), 'img/system');
            $institution->logo = $image;
        }
        $institution->save();

        return redirect()->back()->with("success","Actualización exitosa...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        //
    }
}
