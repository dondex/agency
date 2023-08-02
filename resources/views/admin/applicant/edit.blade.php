@extends('layouts.master')

@section('title', 'Edit Applicant Status')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Applicant Status</h4>
            </div>
            <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>Applicant ID</label>
                        <p class="form-control">{{$applicant->id}}</p>
                    </div>

                    <div class="mb-3">
                        <label>Job Position</label>
                        <p class="form-control">{{$applicant->job_name}}</p>
                    </div>
                    <div class="mb-3">
                        <label>Full Name</label>
                        <p class="form-control">{{$applicant->name}}</p>
                    </div>
                    <div class="mb-3">
                        <label>Email Address</label>
                        <p class="form-control">{{$applicant->email}}</p>
                    </div>
                    <div class="mb-3">
                        <label>Contact Number</label>
                        <p class="form-control">{{$applicant->number}}</p>
                    </div>
                    <div class="mb-3">
                        <label>Cover Letter</label>
                        <p class="form-control">{{$applicant->letter}}</p>
                    </div>

                    <form action="{{ url('admin/update-applicant/'.$applicant->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Apply Status</label>
                            <select name="apply_status" class="form-control">
                                <option value="0" {{ $applicant->apply_status  == '0' ? 'selected' : ''}}>Pending</option>
                                <option value="1" {{ $applicant->apply_status == '1' ? 'selected' : ''}} >Ongoing</option>
                                <option value="2" {{ $applicant->apply_status == '2' ? 'selected' : ''}} >Denied</option>
                                <option value="3" {{ $applicant->apply_status == '3' ? 'selected' : ''}} >Approved</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Applicant Status</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
