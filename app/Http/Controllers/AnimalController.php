<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Exports\AnimalsExport;
use Maatwebsite\Excel\Facades\Excel;


class AnimalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
{
    $query = Animal::query();
    
    if ($request->has('search')) {
        $search = $request->search;
        $query->where('type', 'like', "%$search%")
              ->orWhere('breed', 'like', "%$search%")
              ->orWhere('location', 'like', "%$search%");
    }
    
    $animals = $query->get();
    
    return view('animals.index', compact('animals'));
}

    public function create()
    {
        return view('animals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'health_notes' => 'nullable|string',
            'feeding_schedule' => 'nullable|string',
        ]);

        Animal::create($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal registered successfully.');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'health_notes' => 'nullable|string',
            'feeding_schedule' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);

        $animal->update($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal removed successfully.');
    }
    public function export()
    {
        return Excel::download(new AnimalsExport, 'animals.xlsx');
    }

    
    
    
}
