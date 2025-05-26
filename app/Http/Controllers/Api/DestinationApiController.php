<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DestinationApiController extends Controller
{
    public function index()
    {
        return response()->json(Destination::with('category')->get());
    }

    public function show($id)
    {
        return response()->json(Destination::with('category')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|file|image|max:2048',
            'price' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
            $data['image'] = url(Storage::url($data['image']));
        }

        $destination = Destination::create($data);
        return response()->json($destination, 201);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'description' => 'sometimes|required|string',
            'image' => 'nullable|file|image|max:2048',
            'price' => 'sometimes|required|string',
            'latitude' => 'sometimes|required|string',
            'longitude' => 'sometimes|required|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('destinations', 'public');
            $data['image'] = url(Storage::url($data['image']));
        }

        $destination->update($data);
        return response()->json($destination);
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return response()->json(null, 204);
    }
}
