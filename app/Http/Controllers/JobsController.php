<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Services\JobService;

class JobsController extends Controller
{
    public function all_jobs()
    {
        $jobs = Jobs::with('photos')
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->get();
        return view('jobs.all_jobs', compact('jobs'));
    }
    public function add_job_form()
    {
        return view('jobs.add_job_form'); // form show view
    }
    public function add_job(StoreJobRequest $request, JobService $service)
    {
        // Validation is handled automatically by StoreJobRequest

        $service->createJob($request->validated());

        return redirect('/all_jobs')->with('success', 'Job Added Successfully!');
    }

    public function edit_job(string $id)
    {
        $job = Jobs::findOrFail($id); // DB se job fetch
        return view('jobs.edit_job_form', compact('job'));
    }

    public function update_job(UpdateJobRequest $request, $id, JobService $service)
    {
        // Find the job
        $job = Jobs::findOrFail($id);

        // Validation is handled automatically by UpdateJobRequest

        // Update job using service
        $service->updateJob($job, $request->validated());

        // Redirect with success message
        return redirect('/all_jobs')->with('success', 'Job Updated Successfully!');
    }

    public function delete_job($id, JobService $service)
    {
        // Find the job
        $job = Jobs::findOrFail($id);

        // Delete using service (soft delete)
        $service->deleteJob($job);

        // Redirect with success message
        return redirect('/all_jobs')->with('success', 'Job Deleted Successfully!');
    }
}
