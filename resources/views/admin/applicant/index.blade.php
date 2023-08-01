@extends('layouts.master')

@section('title', 'View Applicants')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Applicants</h4>
            </div>
            <div class="card-body">
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Position</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Apply Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicant as $applicantitem)
                            <tr>
                                <td>{{ $applicantitem->id}}</td>
                                <td>{{ $applicantitem->job_name}}</td>
                                <td>{{ $applicantitem->name}}</td>
                                <td>{{ $applicantitem->email}}</td>
                                <td>{{ $applicantitem->number}}</td>
                                <td>{{ $applicantitem->apply_status == '0' ? 'Pending': 'Ongoing'}}</td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
