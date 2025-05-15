<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nysc;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\Storage;

class NyscController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.nysc.index');
    }

    public function create()
    {
        return view('admin.nysc.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048',
        ]);

        try {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
                
                $imagePath = $image->storeAs('nysc', $imageName, 'public');
                $validated['image'] = $imagePath;
            }

            // Create the course
            $nysc = Nysc::create($validated);

            return redirect()->route('admin.nysc.index') // Change this to your desired redirect route
                            ->with('success', 'Nysc created successfully!');

        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while creating the nysc. Please try again.'.$e->getMessage()]);
        }
    }

   

    public function edit($id)
    {
        $nysc = Nysc::findOrFail(decrypt($id));
        return view('admin.nysc.edit', compact('nysc'));
    }

   
    public function update(Request $request, $id)
    {
        $nysc = Nysc::findOrFail(($id));

        // Validate the request data
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
        ]);

        try {
            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($nysc->image && Storage::disk('public')->exists($nysc->image)) {
                    Storage::disk('public')->delete($nysc->image);
                }

                $image = $request->file('image');
                $imageName = time() . '_'. $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('nysc', $imageName, 'public');
                $validated['image'] = $imagePath;
            } else {
                // Keep the existing image if no new image is uploaded
                $validated['image'] = $nysc->image;
            }

            // Update the nysc
            $nysc->update($validated);

            return redirect()->route('admin.nysc.index')
                            ->with('success', 'Nysc updated successfully!');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while updating the course. Please try again.']);
        }
    }

    public function destroy($id)
    {
        try {
            $nysc = Nysc::findOrFail(decrypt($id));

            if ($nysc->image && File::exists(public_path($nysc->image))) {
                File::delete(public_path($nysc->image));
            }

            $nysc->delete();

            return redirect()->route('admin.nysc.index')->with('success', 'nysc deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Nysc deletion failed. ' . $e->getMessage());
        }
    }

 
   
}
