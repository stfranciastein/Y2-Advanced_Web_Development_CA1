<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monsters = Monster::all();
        return view('monsters.index', compact('monsters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monsters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validates Input
        $request-validate([
            'monster_name' => 'required',
            'alignment' => 'required',
            'challenge_rating' => 'required|interger',
            'armour_class' => 'required|interger',
            'image_url' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time(). '.' .$request-image->extension();
            $request->image->move(public_path('image/monsters'), $imageName);
        }

        Monster::create([
            'monster_name' => $request->monster_name,
            'alignment' => $request->alignment,
            'challenge_rating' => $request->challenge_rating,
            'armour_class' => $request->armour_class,
            'image_url' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('monsters.index')->with('success', 'Monster added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monster $monster)
    {
        return view('monsters.show')->with('monster', $monster);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monster $monster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monster $monster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monster $monster)
    {
        //
    }
}
