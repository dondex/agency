@extends('layouts.master')

@section('title', 'News & Events')

@section('content')

<div class="container-fluid px-4">

   <div class="card mt-4">
    <div class="card-header">
        <h1 class="mt-4">News & Events <a href="{{ url('admin/add-news')}}" class="btn btn-primary float-end">Add News</a>
        </h1>
    </div>

    <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif

        <table id="myDataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $newsitem)
                    <tr>
                        <td>{{$newsitem->id}}</td>
                        <td>{{$newsitem->name}}</td>
                        <td>
                            <img src="{{ asset('uploads/news/'.$newsitem->image)}}" width="50px" height="50px" alt="img">
                        </td>
                        <td>{{$newsitem->status == '1' ? 'Hidden' : 'Shown'}}</td>
                        <td>
                            <a href="{{ url('admin/edit-news/'.$newsitem->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-news/'.$newsitem->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
   </div>
</div>

@endsection
