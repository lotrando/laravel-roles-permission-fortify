<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use App\Http\Requests\StorePaintRequest;
use App\Http\Requests\UpdatePaintRequest;

class PaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePaintRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaintRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function show(Paint $paint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function edit(Paint $paint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaintRequest  $request
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaintRequest $request, Paint $paint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paint $paint)
    {
        //
    }
}
