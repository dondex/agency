@extends('layouts.master')

@section('title', 'View Jobs')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

        <div class="card-header">
            <h4>View Jobs
                <a href="{{ url('admin/add-jobs')}}" class="btn btn-primary float-end">Add Jobs</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif

            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Country</th>
                        <th>Job Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $jobitem)
                        <tr>
                            <td>{{ $jobitem->id }}</td>
                            <td>{{ $jobitem->country->name }}</td>
                            <td>{{ $jobitem->name }}</td>
                            <td>{{ $jobitem->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/jobs/'.$jobitem->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-jobs/'.$jobitem->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
