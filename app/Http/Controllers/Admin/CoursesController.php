<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Mail\ApplicationStatusNotification;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Course::findOrFail(decrypt($id));
        return view('admin.application.show', compact('data'));
    } 

    public function update(Request $request, $id)
    {
        $application = Course::findOrFail($id);
        $application->applicant_status = $request->input('applicant_status');
        $application->save();
        $message = '';

        if ($application->applicant_status === 'rejected') {
            $message = "Dear {$application->name}, we regret to inform you that your submitted documents failed the verification process and your application has been rejected.";
        } elseif ($application->applicant_status === 'approved') {
            $message = "Dear {$application->name}, congratulations! Your submitted documents have been verified successfully and your application has been approved.";
        }
        $this->sendMessage($application->user_email, $message);

        return redirect()->back()
                     ->with('success', 'Application status updated successfully.');
    }

    private function sendMessage($email, $message)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($email)->send(new ApplicationStatusNotification($message));
        } else {
            return redirect()->back()->with('error', 'Invalid or missing email address.');
        }
    }
    
    public function destroy($id)
    {
        try {
            $application = ApplicationForm::findOrFail($id);
    
            if ($application->transactions()->exists()) {
                $application->transactions()->delete();
            }
    
            $application->delete();
    
            return redirect()->back()->with('success', 'Application and transactions deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete application: ' . $e->getMessage());
        }
    }

}

