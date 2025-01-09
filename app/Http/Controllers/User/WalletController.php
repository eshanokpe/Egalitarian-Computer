<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    // 
    public function index(){ 
        $data['user'] = Auth::user();
       

        return view('user.pages.wallet.index', $data); 
    }
}
