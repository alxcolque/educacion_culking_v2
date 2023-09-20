<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarruselRequest;
use App\Models\Carrusel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrusels = Carrusel::orderBy('id', 'desc')->get();
        return view('carrusels.index' , compact('carrusels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrusels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarruselRequest $request)
    {
        $carrusel = Carrusel::create([
            'title' => $request->title,
            'description' => $request->description,
            'visible' => '1',
            'type' => 'carrusel',
            'status' => '2',
            'position' => 'left'
        ]);
        $carr_file  = $request->file('image');
        if($carr_file){
            $image = FileStorage::upload($carr_file, $carr_file->getClientOriginalName(), 'img/carrusels');
            $carrusel->url_image = $image;
            $carrusel->save();
        }
        return redirect()->route('carrusels.index')
            ->with('success','Carrusel se ha creado.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrusel  $carrusel
     * @return \Illuminate\Http\Response
     */
    public function show(Carrusel $carrusel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrusel  $carrusel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrusel $carrusel)
    {
        return view('carrusels.edit', compact('carrusel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrusel  $carrusel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrusel $carrusel)
    {
        //$carrusel->update($request->all());
        $carrusel->update([
            'title' => $request->title,
            'description' => $request->description,
            'title_button' => $request->title_button,
            'url_button' => $request->url_button,
            'color_button' => $request->color_button,
            'visible' => $request->visible,
            'status' => $request->status,
            'position' => $request->position
        ]);
        $carr_file  = $request->file('image');
        if($carr_file){
            FileStorage::delete($carrusel->url_image, 'img/carrusels');
            $image = FileStorage::upload($carr_file, $carr_file->getClientOriginalName(), 'img/carrusels');
            $carrusel->url_image = $image;
        }
        $carrusel->save();
        return redirect()->route('carrusels.index')->with('success','Carrusel actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrusel  $carrusel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrusel $carrusel)
    {
        /* if (file_exists(public_path('img/carrusels/'.$carrusel->url_image))){
            unlink(public_path('img/carrusels/'.$carrusel->url_image));
        } */
        FileStorage::delete($carrusel->url_image, 'img/carrusels');
        $carrusel->delete();
        return redirect()->route('carrusels.index')->with('success', 'El carrusel se eliminó correctamente');
    }
}
