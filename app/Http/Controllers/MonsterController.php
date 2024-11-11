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
    public function index(Request $request, $dashboard = false)
    {
        $query = Monster::query();
        $recentMonster = Monster::latest()->first(); //For dashboard.blade recent display
    
        // Filtering by alignment
        if ($request->has('alignment_filter') && $request->alignment_filter != 'showingAll') {
            $query->where('alignment', $request->alignment_filter);
        }
    
        // Searching by monster name
        if ($request->has('search') && !empty($request->search)) {
            $query->where('monster_name', 'like', '%' . $request->search . '%');
        }

        if ($dashboard) {
            $query->orderBy('monster_name', 'asc'); // Alphabetical sorting only for dashboard
        } elseif ($request->has('sort') && $request->sort == 'az') {
            $query->orderBy('monster_name', 'asc');
        } elseif ($request->has('sort') && $request->sort == 'za') {
            $query->orderBy('monster_name', 'desc');
        }
    
        // Sorting
        if ($request->has('sort') && $request->sort == 'az') {
            $query->orderBy('monster_name', 'asc');
        } elseif ($request->has('sort') && $request->sort == 'za') {
            $query->orderBy('monster_name', 'desc');
        }
    
        // Get the monsters based on the filtering and sorting
        $monsters = $query->get();
    
        // Fetch all distinct alignments for the filter dropdown
        $alignments = Monster::distinct('alignment')->pluck('alignment');
    
        // Check if the request is for the dashboard
        if ($dashboard) {
            return view('dashboard', compact('monsters', 'alignments', 'recentMonster'));
        }
    
        return view('monsters.index', compact('monsters', 'alignments', 'recentMonster'));
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
        // Validates Input
        $request->validate([
            'monster_name' => 'required',
            'alignment' => 'required',
            'challenge_rating' => 'required|integer',
            'armour_class' => 'required|integer',
            'image_url' => 'required|image',
        ]);
    
        if ($request->hasFile('image_url')) {
            $imageName = time() . '.' . $request->file('image_url')->extension();
            $request->file('image_url')->move(public_path('images/monsters'), $imageName);
        } else {
            $imageName = null;
        }
    
        Monster::create([
            'monster_name' => $request->monster_name,
            'alignment' => $request->alignment,
            'challenge_rating' => $request->challenge_rating,
            'armour_class' => $request->armour_class,
            'description' => $request->description,
            'image_url' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return to_route('monsters.index')->with('success', 'Monster added successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Monster $monster)
    {
        $monster->loadCount('favouritedBy');
        return view('monsters.show')->with('monster', $monster);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monster $monster)
    {
        return view('monsters.edit', compact('monster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monster $monster)
    {
        // Validate the incoming request data
        $request->validate([
            'monster_name' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'challenge_rating' => 'required|integer',
            'armour_class' => 'required|integer',
            'image_url' => 'sometimes|image', // Use 'sometimes' if the image isn't required to be updated
            'description' => 'nullable|string', // Add validation for description if it's required
        ]);
    
        //Hi Matthew, here's the edited stuff.
        $data = $request->only(['monster_name', 'alignment', 'challenge_rating', 'armour_class', 'description']);
        
        if ($request->hasFile('image_url')) {
            if ($monster->image_url && file_exists(public_path($monster->image_url))) {
                unlink(public_path($monster->image_url));
            }
            
            // Store new image and update image path
            $imageName = time() . '.' . $request->file('image_url')->extension();
            $request->file('image_url')->move(public_path('images/monsters'), $imageName);
            $data['image_url'] = $imageName; // Add image path to the data array
        }
    
        $monster->update($data); 
    
        return redirect()->route('monsters.index')->with('success', 'Monster updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monster $monster)
    {
        // This part of the code will check if the row in the database contains an image. If it does, it also deletes that image.
        if ($monster->image_url && file_exists(public_path($monster->image_url))) {
            unlink(public_path($monster->image_url));
        }
        $monster->delete();
        return redirect()->route('monsters.index')->with('success', 'Monster deleted successfully!');
    }

    public function favourite($monsterId)
    {
        $monster = Monster::findOrFail($monsterId);
        $user = auth()->user();

        if ($user->favouriteMonsters->contains($monsterId)) {
            // If the monster is already favourited, unfavourite it
            $user->favouriteMonsters()->detach($monsterId);
        } else {
            // If the monster isn't favourited, favourite it
            $user->favouriteMonsters()->attach($monsterId);
        }

        return redirect()->back(); // Redirect back to the previous page
    }

    public function favourites()
    {
        $favouriteMonsters = auth()->user()->favouriteMonsters;
        $alignments = Monster::distinct('alignment')->pluck('alignment');

        return view('monsters.favourites', compact('favouriteMonsters', 'alignments'));
    }


}
