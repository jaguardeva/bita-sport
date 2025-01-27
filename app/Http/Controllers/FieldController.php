<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Field;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venue = Field::withAvg('reviews', 'rating')
            ->with('category')
            ->get();

        $categories = Category::all();

        return Inertia::render('Field/Index', [
            'venues' => $venue,
            'categories' => $categories
        ]);
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
    public function show(string $uuid)
    {
        $field = Field::where('uuid', $uuid)
            ->with('category')
            ->with('reviews')
            ->withAvg('reviews', 'rating')
            ->first();

        return Inertia::render('Field/Show', [
            'field' => $field
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
