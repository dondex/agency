@extends('layouts.master')

@section('title', 'Country')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Country
                <a href="{{ url('admin/add-country')}}" class="btn btn-primary btn-small float-end">Add Country</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($country as $item)
                        <tr>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                <img src="{{ asset('uploads/country/'.$item->image)}}" width="50px" height="50px" alt="img">
                            </td>
                            <td>{{ $item->status == '1' ? 'Hidden':'Shown'}}</td>
                            <td>
                                <a href="{{ url('admin/edit-country/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-country/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



</div>

@endsection
