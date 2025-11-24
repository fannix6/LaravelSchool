<?php

namespace App\Http\Controllers;

use App\Models\playingSport;
use App\Http\Requests\StoreplayingSportRequest;
use App\Http\Requests\UpdateplayingSportRequest;

class PlayingSportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreplayingSportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(playingSport $playingSport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplayingSportRequest $request, playingSport $playingSport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playingSport $playingSport)
    {
        //
    }
}
