@extends('layouts.master')

@section('title', 'View Applicants')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Applicants</h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message')}}</div>
                @endif

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
                                <td>
                                    @if ($applicantitem->apply_status == '0')
                                        <span class="btn btn-warning btn-sm">Pending</span>
                                    @elseif ($applicantitem->apply_status == '1')
                                        <span class="btn btn-success btn-sm">Ongoing</span>
                                    @elseif ($applicantitem->apply_status == '2')
                                        <span class="btn btn-danger btn-sm">Denied</span>
                                    @elseif ($applicantitem->apply_status == '3')
                                        <span class="btn btn-primary btn-sm">Approved</span>
                                    @else
                                        <span class="btn btn-dark">Unknown</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ url('admin/show-applicant/'.$applicantitem->id)}}" type="button" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
