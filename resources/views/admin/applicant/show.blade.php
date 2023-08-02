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
                                @if ($applicant->apply_status == '0')
                                        <span class="btn btn-warning btn-sm">Pending</span>
                                    @elseif ($applicant->apply_status == '1')
                                        <span class="btn btn-success btn-sm">Ongoing</span>
                                    @elseif ($applicant->apply_status == '2')
                                        <span class="btn btn-danger btn-sm">Denied</span>
                                    @elseif ($applicant->apply_status == '3')
                                        <span class="btn btn-primary btn-sm">Approved</span>
                                    @else
                                        <span class="btn btn-dark">Unknown</span>
                                @endif
                            </h6>
                        </div>

                        <div class="d-flex align-items-center my-4">
                            <h6 class="text-success">Resume:
                                <img src="{{ asset('uploads/applicant/'.$applicant->image)}}" width="450px" height="auto" alt="img">
                            </h6>
                        </div>
                        <div class="action-button d-flex">
                            <div class="my-4 px-3">
                                <a href="{{ url('admin/edit-applicant/'.$applicant->id) }}" class="btn btn-success">Edit</a>
                            </div>

                            <div class="my-4 px-3">
                                <a href="{{ url('admin/delete-applicant/'.$applicant->id) }}" class="btn btn-danger">Delete</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection




