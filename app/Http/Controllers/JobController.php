<?php

namespace App\Http\Controllers;

use App\Mail\jobPosted;
use App\Models\Job;
use Auth;
use Illuminate\Http\Request;
use Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer')->orderByDesc("id")->paginate(10);
        return view("jobs.index", ["jobs" => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // *validate request
        request()->validate([
            'title' => ['required', "min:3"],
            'salary' => ['required']
        ]);


        // *create Job
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::id()
        ]);
        Mail::to(Auth::user()->email)->queue(new jobPosted(Auth::user()->name));
        
        return redirect("/jobs");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobs.show", ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view("jobs.edit" , ["job" => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        Job::destroy($job->id);

        return redirect("/jobs");
    }
}
