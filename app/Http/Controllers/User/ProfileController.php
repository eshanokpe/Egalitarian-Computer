<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
 
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
 
    public function index(){
             $user = Auth::user();
        $data['user'] = User::where('id', $user->id)->where('email', $user->email)->first();

        return view('user.pages.profile.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail(decrypt($id));
        return view('user.pages.profile.edit',$data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
    public function update(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:15',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'referral_code' => 'nullable|string|exists:users,referral_code',
                'dob' => [
                    'nullable',
                    'date',
                    'before:' . now()->subYears(18)->format('Y-m-d'),
                ]
            ], [
                'dob.before' => 'You must be at least 18 years old to update.',
            ]);

            $user = Auth::user();

            // Update basic info
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;

            if ($request->filled('dob')) {
                $user->dob = Carbon::parse($request->dob)->format('Y-m-d');
            }

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time() . '.' . $image->extension();
                $destinationPath = public_path('assets/profile/');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true); // Ensure the directory exists
                }

                $image->move($destinationPath, $imageName);
                $user->profile_image = 'assets/profile/' . $imageName;
            }

            $user->save(); // Save all changes at once

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Profile updated successfully!',
                    'user' => [
                        'first_name' => $user->first_name,
                        'last_name' => $user->last_name,
                        'phone' => $user->phone,
                        'dob' => $user->dob,
                        'profile_image' => asset($user->profile_image),
                    ],
                ], 200);
            }

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {  // Fixed Exception handling
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong! ' . $e->getMessage(),
                ], 500);
            }
            return redirect()->back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
