<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobFormRequest;
use App\Models\Country;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.job.index', compact('jobs'));
    }

    public function create()
    {
        $country = Country::where('status', '0')->get();
        return view('admin.job.create', compact('country'));
    }

    public function store(JobFormRequest $request)
    {
        $data = $request->validated();

        $job = new Job;
        $job->country_id = $data['country_id'];
        $job->name = $data['name'];
        $job->slug = $data['slug'];
        $job->description = $data['description'];
        $job->yt_iframe = $data['yt_iframe'];
        $job->meta_title = $data['meta_title'];
        $job->meta_description = $data['meta_description'];
        $job->meta_keyword = $data['meta_keyword'];
        $job->status = $request->status == true ? '1' : '0';
        $job->created_by = Auth::user()->id;
        $job->save();

        return redirect('admin/jobs')->with('message', 'Job Added Successfully');
    }

    public function edit($job_id)
    {
        $country = Country::where('status', '0')->get();
        $job = Job::find($job_id);
        return view('admin.job.edit', compact('job', 'country'));
    }

    public function update(JobFormRequest $request, $job_id)
    {
        $data = $request->validated();

        $job =  Job::find($job_id);
        $job->country_id = $data['country_id'];
        $job->name = $data['name'];
        $job->slug = $data['slug'];
        $job->description = $data['description'];
        $job->yt_iframe = $data['yt_iframe'];
        $job->meta_title = $data['meta_title'];
        $job->meta_description = $data['meta_description'];
        $job->meta_keyword = $data['meta_keyword'];
        $job->status = $request->status == true ? '1' : '0';
        $job->created_by = Auth::user()->id;
        $job->update();

        return redirect('admin/jobs')->with('message', 'Job Updated Successfully');
    }

    public function destroy($job_id)
    {
        $job = Job::find($job_id);
        $job->delete();
        return redirect('admin/jobs')->with('message', 'Job Deleted Successfully');
    }
}
