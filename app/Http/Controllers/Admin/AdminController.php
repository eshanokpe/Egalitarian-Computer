<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactMessage;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Slider;
use App\Models\Course; // Assuming you have a Course model here
use App\Http\Traits\AdminTrait;
 
class AdminController extends Controller
{ 
   
    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }
    
    public function index() 
    { 
        // Fetch counts
        $userCount = User::count();
        $courseCount = Course::count(); 
        $contactMessageCount = ContactMessage::count(); 
        $latestUsers = User::latest()->take(5)->get(); 

        return view('admin.dashboard', compact('userCount', 'contactMessageCount', 'courseCount', 'latestUsers'));
    } 

    public function getUser(){
        $data['data'] = User::latest()->get();
        return view('admin.users.index', $data);
    }

    public function deleteUser($id){
        
        try {
            $user = User::findOrFail(decrypt($id));
            $user->delete();

            return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while deleting the user: ' . $e->getMessage()]);
        }
    }

    public function transaction(){
        $data['data'] = Transaction::latest()->get();
        return view('admin.transaction.index', $data);
    }

}
