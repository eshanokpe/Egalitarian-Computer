<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Transaction;
use App\Models\DropdownItem;
use App\Models\User;
use App\Models\Slider;
use App\Http\Traits\AdminTrait;
 
class AdminController extends Controller
{ 
   
    // public function __construct()
    // {
    //     $this->middleware('auth.admin');
    // }
    
    public function index() 
    { 
        $data['data'] = User::latest()->get();
        return view('admin.dashboard', $data);
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
