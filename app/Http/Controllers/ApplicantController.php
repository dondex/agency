<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreApplicantFormRequest;
use App\Http\Requests\Frontend\ApplicantFormRequest;
use App\Http\Requests\Frontend\ApplicantJobFormRequest;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicant = Applicant::all();
        return view('admin.applicant.index', compact('applicant'));
    }

    public function show($applicant_id)
    {
        $applicant = Applicant::find($applicant_id);
        return view('admin.applicant.show', compact('applicant'));
    }

    public function edit($applicant_id)
    {
        $applicant = Applicant::find($applicant_id);
        return view('admin.applicant.edit', compact('applicant'));
    }

    public function update(Request $request, $applicant_id)
    {
        $applicant = Applicant::find($applicant_id);
        if ($applicant) {
            $applicant->apply_status = $request->apply_status;
            $applicant->update();
            return redirect('admin/applicants')->with('message', 'Status Updated Successfully');
        }
        return redirect('admin/applicants')->with('message', 'Applicant Status Not Found');
    }

    public function create()
    {
        $job = Job::where('status', '0')->get();
        return view('frontend.applicant.create', compact('job'));
    }

    public function store(ApplicantFormRequest $request)
    {
        $data = $request->validated();

        $applicant = new Applicant;
        $applicant->job_name = $data['job_name'];
        $applicant->name = $data['name'];
        $applicant->email = $data['email'];
        $applicant->number = $data['number'];
        $applicant->letter = $data['letter'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/applicant/', $filename);
            $applicant->image = $filename;
        }

        $applicant->apply_status = $request->apply_status == true ? '0' : '1';
        $applicant->apply_by = Auth::user()->id;

        $applicant->save();

        return redirect('applicant/apply-job')->with('message', 'Application Submit Successfully');
    }



    public function applyJob(string $job_name)
    {
        $job = Job::where('name', $job_name)->where('status', '0')->get();
        return view('frontend.applicant.applyjob', compact('job'));
    }

    public function applyJobStore(ApplicantJobFormRequest $request)
    {
        $data = $request->validated();

        $applicant = new Applicant;
        $applicant->job_name = $data['job_name'];
        $applicant->name = $data['name'];
        $applicant->email = $data['email'];
        $applicant->number = $data['number'];
        $applicant->letter = $data['letter'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/applicant/', $filename);
            $applicant->image = $filename;
        }

        $applicant->apply_status = $request->apply_status == true ? '0' : '1';
        $applicant->apply_by = Auth::user()->id;

        $applicant->save();

        return redirect('applicant/apply-job')->with('message', 'Application Submit Successfully');
    }

    public function destroy($applicant_id)
    {
        $applicant = Applicant::find($applicant_id);
        if ($applicant) {
            $applicant->delete();
            return redirect('admin/applicants')->with('message', 'Application Deleted Successfully');
        } else {
            return redirect('admin/applicants')->with('message', 'No Application Id Found');
        }
    }

    public function createApplicant()
    {
        $job = Job::where('status', '0')->get();
        return view('admin.applicant.create', compact('job'));
    }

    public function storeApplicant(StoreApplicantFormRequest $request)
    {
        $data = $request->validated();

        $applicant = new Applicant;
        $applicant->job_name = $data['job_name'];
        $applicant->name = $data['name'];
        $applicant->email = $data['email'];
        $applicant->number = $data['number'];
        $applicant->letter = $data['letter'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/applicant/', $filename);
            $applicant->image = $filename;
        }

        $applicant->apply_status = $request->apply_status == true ? '0' : '1';
        $applicant->apply_by = Auth::user()->id;

        $applicant->save();

        return redirect('admin/applicants')->with('message', 'Application Submit Successfully');
    }
}
