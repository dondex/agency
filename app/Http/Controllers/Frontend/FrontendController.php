<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Job;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $all_news = News::where('status', '0')->paginate(6);
        return view('frontend.index', compact('all_news'));
    }

    public function viewCountryJob(string $country_slug)
    {
        $country = Country::where('slug', $country_slug)->where('status', '0')->first();
        if ($country) {
            $job = Job::where('country_id', $country->id)->where('status', '0')->paginate(10);
            return view('frontend.job.index', compact('job', 'country'));
        } else {
            return redirect('/');
        }

        return view('frontend.index');
    }

    public function viewJob(string $country_slug, string $job_slug)
    {
        $country = Country::where('slug', $country_slug)->where('status', '0')->first();
        if ($country) {
            $job = Job::where('country_id', $country->id)->where('slug', $job_slug)->where('status', '0')->first();

            $latest_jobs = Job::where('country_id', $country->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);

            return view('frontend.job.view', compact('job', 'latest_jobs'));
        } else {
            return redirect('/');
        }

        return view('frontend.index');
    }
}
