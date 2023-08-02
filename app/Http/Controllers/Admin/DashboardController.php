<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Country;
use App\Models\Job;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applicants = Applicant::count();
        $applicantsWithPending = Applicant::where('apply_status', '0')->count();
        $applicantsWithApproved = Applicant::where('apply_status', '3')->count();

        $countries = Country::count();
        $jobs = Job::count();
        $news = News::count();
        $users = User::where('role_as', '0')->count();

        return view('admin.dashboard', compact('applicants', 'jobs', 'countries', 'news', 'users', 'applicantsWithPending', 'applicantsWithApproved'));
    }
}
