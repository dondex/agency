@extends('layouts.master')

@section('title', 'Edit Job')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

        <div class="card-header">
            <h4>Edit Jobs
                <a href="{{ url('admin/jobs')}}" class="btn btn-danger float-end">BACK</a>
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

            <form action="{{ url('admin/update-jobs/'.$job->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Country</label>
                    <select name="country_id" required class="form-control">
                        <option value="">-- Select Country -- </option>
                        @foreach ($country as $countryitem)
                            <option value="{{ $countryitem->id}}" {{ $job->country_id == $countryitem->id ? 'selected' : '' }}>{{ $countryitem->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Job Name</label>
                    <input type="text" name="name" value="{{ $job->name }}" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $job->slug }}"  class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea rows="4" name="description" id="mySummernote" class="form-control">{!! $job->description !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Iframe Link</label>
                    <input type="text" name="yt_iframe" value="{{ $job->yt_iframe }}"  class="form-control" />
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $job->meta_title }}"  class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea rows="3" name="meta_description"  class="form-control">{!! $job->meta_description !!}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea rows="3" name="meta_keyword" class="form-control">{!! $job->meta_keyword !!}</textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{ $job->status == '1' ? 'checked':''}} />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Job</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
