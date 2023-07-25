@extends('layouts.master')

@section('title', 'Add Job')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

        @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
        @endif

        <div class="card-header">
            <h4>Add Jobs
                <a href="{{ url('admin/add-jobs')}}" class="btn btn-primary float-end">Add Jobs</a>
            </h4>
        </div>
        <div class="card-body">

            <form action="{{ url('admin/add-jobs')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="">Country</label>
                    <select name="country_id" class="form-control">
                        @foreach ($country as $countryitem)
                            <option value="{{ $countryitem->id}}">{{ $countryitem->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Job Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea rows="4" name="description" id="mySummernote" class="form-control" ></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" class="form-control" />
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea rows="3" name="meta_description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea rows="3" name="meta_keyword" class="form-control"></textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Job</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
