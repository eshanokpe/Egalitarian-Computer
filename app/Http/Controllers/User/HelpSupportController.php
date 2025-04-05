<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetials;
use App\Models\Sociallink;
use App\Models\Privacy;
use App\Models\Terms;
use Auth;

class HelpSupportController extends Controller
{
    public function index(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        
        return view('user.pages.support.index', $data);
    }

    public function helpCenter(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        
        return view('user.pages.support.helpCenter', $data);
    }

    public function contactSupport(){
        $data['user'] = Auth::user(); 
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;

        $terms = Terms::first();
        $privacy = Privacy::first();
        $sociallink = Sociallink::first();
        $contactDetials = ContactDetials::first();

        if (request()->wantsJson()) {
            return response()->json([
                'terms' => $terms,
                'privacy' => $privacy,
                'sociallink' => $sociallink,
                'contactDetials' => $contactDetials,
            ]);
        }
        
        return view('user.pages.support.contactSupport', $data);
    }

    public function socialMedia(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        
        return view('user.pages.support.socialMedia', $data);
    }
}
