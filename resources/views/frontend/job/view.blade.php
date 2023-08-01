@extends('layouts.app')

@section('title', "$job->meta_title")

@section('meta_description', "$job->meta_description")

@section('meta_keyword', "$job->meta_keyword")

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="country-heading">
                        <h4 class="mb-0 text-white">{{ $job->country->name}} / {!! $job->name !!}</h4>
                    </div>

                    <div class="card card-shadow mt-4">
                        <div class="card-body job-desc">
                            {!! $job->description !!}

                            <div class="py-3">
                                <a href="{{ url('applicant/apply-job/'.$job->name)}}"><button class="btn btn-primary">Apply Now</button></a>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-md-4">
                    <div class="border p-3 mb-3">
                        <h6>Advertisement Section</h6>
                    </div>
                    <div class="border p-3 mb-3">
                        <h6>Advertisement Section</h6>
                    </div>
                    <div class="border p-3 mb-3">
                        <h6>Advertisement Section</h6>
                    </div>

                    <div class="card mt-3 rounded-0">
                        <div class="card-header">
                            <h4>Latest Jobs</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_jobs as $latest_job_item)
                                <a href="{{ url('jobs/'.$latest_job_item->country->slug.'/'.$latest_job_item->slug)}}" class="text-decoration-none">
                                    <h6> > {{ $latest_job_item->name }}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
