<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rice;

class RiceController extends Controller
{
    public function index()
    {
        $rice = Rice::all();
        return view('rice.index', compact('rice'));
    }

    public function create()
    {
        return view('rice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable'
        ]);

        Rice::create($request->all());

        return redirect()->route('rice.index')->with('success', 'Rice added successfully!');
    }

    public function edit($id)
    {
        $rice = Rice::findOrFail($id);
        return view('rice.edit', compact('rice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rice_name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable'
        ]);

        $rice = Rice::findOrFail($id);
        $rice->update($request->all());

        return redirect()->route('rice.index')->with('success', 'Rice updated!');
    }

    public function destroy($id)
    {
        $rice = Rice::findOrFail($id);
        $rice->delete();

        return redirect()->route('rice.index')->with('success', 'Rice deleted!');
    }
}