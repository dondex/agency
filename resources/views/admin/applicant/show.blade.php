@extends('layouts.master')

@section('title', 'Show Applicant Profile')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Applicant Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="d-flex align-items-center ">
                            <h6 class="text-success">ID: <span class="fst-normal text-dark">{{ $applicant->id }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="text-success">Job Position: <span class="fst-normal text-dark">{{ $applicant->job_name }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="text-success">Full Name: <span class="fst-normal text-dark">{{ $applicant->name }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="text-success">Email: <span class="fst-normal text-dark">{{ $applicant->email }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="text-success">Contact Number: <span class="fst-normal text-dark">{{ $applicant->number }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="text-success">Cover Letter: <span class="fst-normal text-dark">{{ $applicant->letter }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center my-4">
                            <h6 class="text-success">Apply Status:
                                <span class="fst-normal text-dark">{{ $applicant->apply_status == '0' ? 'Pending': 'Ongoing'}}</span>
                            </h6>
                        </div>

                        <div class="d-flex align-items-center my-4">
                            <h6 class="text-success">Resume:
                                <a href="" target="_blank" class="btn btn-primary">Click to view Resume</a>
                            </h6>
                        </div>

                        <div class="d-flex align-items-center my-4">
                            <a href="{{ url('admin/edit-applicant/'.$applicant->id) }}" class="btn btn-success">Edit</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection



