<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048',
        ]);

        try {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
                
                $imagePath = $image->storeAs('slider', $imageName, 'public');
                $validated['image'] = $imagePath;
            }

            // Create the course
            $slider = Slider::create($validated);

            return redirect()->route('admin.slider.index') // Change this to your desired redirect route
                            ->with('success', 'Slider created successfully!');

        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while creating the slider. Please try again.'.$e->getMessage()]);
        }
    }

   

    public function edit($id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        return view('admin.slider.edit', compact('slider'));
    }

   
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail(($id));

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
        ]);

        try {
            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                    Storage::disk('public')->delete($slider->image);
                }

                $image = $request->file('image');
                $imageName = time() . '_'. $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('slider', $imageName, 'public');
                $validated['image'] = $imagePath;
            } else {
                // Keep the existing image if no new image is uploaded
                $validated['image'] = $slider->image;
            }

            // Update the slider
            $slider->update($validated);

            return redirect()->route('admin.slider.index')
                            ->with('success', 'Slider updated successfully!');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while updating the course. Please try again.']);
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail(decrypt($id));

            if ($slider->image && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $slider->delete();

            return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Slider deletion failed. ' . $e->getMessage());
        }
    }

 
   
}
