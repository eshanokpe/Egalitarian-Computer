<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
 
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
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        try{
            $user = Auth::user();
        
            // Update name and phone
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
        
            // Handle profile image upload
            
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image');
                $imageName = time() . '.' . $imagePath->extension();
                $imagePath->move(public_path('assets/profile/'), $imageName);
                $user->update(['profile_image' =>  'assets/profile/' . $imageName]);
            }
        
            $user->save();
        
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!.' .$e->getMessage());
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
