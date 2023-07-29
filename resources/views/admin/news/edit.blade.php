@extends('layouts.master')

@section('title', 'News & Events')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Edit News & Events</h1>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-news/'.$news->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">News Name</label>
                    <input type="text" name="name" value="{{ $news->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $news->slug }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea rows="5" id="mySummernote" name="description" class="form-control">{{ $news->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $news->status == '1' ? 'checked':''}} />
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
