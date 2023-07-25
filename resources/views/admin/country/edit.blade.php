@extends('layouts.master')

@section('title', 'Country')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Country
                <a href="{{ url('admin/country')}}" class="btn btn-danger float-end">BACK</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/update-country/'.$country->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Country Name</label>
                    <input type="text" name="name" value="{{ $country->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $country->slug }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea  name="description" rows="5" id="mySummernote"  class="form-control">{{ $country->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $country->meta_title }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $country->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{ $country->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $country->navbar_status == '1' ? 'checked': '' }} />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $country->status == '1' ? 'checked': '' }} />
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Country</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
