<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Str;
use Illuminate\Support\Facades\Storage;
use App\Mail\ApplicationStatusNotification;

class CoursesController extends Controller
{ 
   
    public function index()
    {
        $data = Course::all();
        return view('admin.courses.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:6048',
        ]);

        try {
            // Handle the image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
                
                // Store the image in the public disk (you can change this to any disk you've configured)
                $imagePath = $image->storeAs('courses', $imageName, 'public');
                $validated['image'] = $imagePath;
            }

            // Create the course
            $course = Course::create($validated);

            return redirect()->route('admin.courses.index') // Change this to your desired redirect route
                            ->with('success', 'Course created successfully!');

        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while creating the course. Please try again.'.$e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $course = Course::findOrFail(decrypt($id));
        return view('admin.courses.edit', compact('course'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('home.course.show', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail(decrypt($id));

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($course->image && Storage::disk('public')->exists($course->image)) {
                    Storage::disk('public')->delete($course->image);
                }

                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('courses', $imageName, 'public');
                $validated['image'] = $imagePath;
            } else {
                // Keep the existing image if no new image is uploaded
                $validated['image'] = $course->image;
            }

            // Update the course
            $course->update($validated);

            return redirect()->route('admin.courses.index')
                            ->with('success', 'Course updated successfully!');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'An error occurred while updating the course. Please try again.']);
        }
    }

    
    public function destroy($id)
    {
        $course = Course::findOrFail(decrypt($id));

        try {
            // Delete associated image
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }

            $course->delete();

            return redirect()->route('admin.courses.index')
                            ->with('success', 'Course deleted successfully!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while deleting the course. Please try again.']);
        }
    }

}

