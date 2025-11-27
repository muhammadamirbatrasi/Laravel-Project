<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobsController extends Controller
{
    public function all_jobs()
    {
        $jobs = Jobs::where('is_deleted', 0)->orderBy('id', 'desc')->get();
        return view('jobs.all_jobs',compact('jobs'));
    }
    public function add_job_form()
    {
        return view('jobs.add_job_form'); // form show view
    }
    public function add_job(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'location'    => 'nullable|string',
            'last_date'   => 'nullable|date'
        ]);

        Jobs::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'location'     => $request->location,
            'last_date'    => $request->last_date,
            'is_deleted'   => 0,
            'added_date'   => now(),
            'updated_date' => now(),
        ]);

        return redirect('/all_jobs')->with('success', 'Job Added Successfully!');
    }

    public function edit_job(string $id)
    {
        $job = Jobs::findOrFail($id); // DB se job fetch
        return view('jobs.edit_job_form', compact('job'));
    }

    public function update_job(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string',
            'location'    => 'nullable|string',
            'last_date'   => 'nullable|date'
        ]);

        // Find the job
        $job = Jobs::findOrFail($id);

        // Update job
        $job->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'location'     => $request->location,
            'last_date'    => $request->last_date,
            'updated_date' => now(),
        ]);

        // Redirect with success message
        return redirect('/all_jobs')->with('success', 'Job Updated Successfully!');
    }

    public function delete_job($id)
    {
        // Find the job
        $job = Jobs::findOrFail($id);

        // Option 1: Soft delete (is_deleted = 1)
        $job->update(['is_deleted' => 1, 'updated_date' => now()]);

        // Option 2: Permanent delete (uncomment if you want permanent)
        // $job->delete();

        // Redirect with success message
        return redirect('/all_jobs')->with('success', 'Job Deleted Successfully!');
    }

}
