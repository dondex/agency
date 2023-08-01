@extends('layouts.app')

@section('title', 'Application Form')

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="country-heading">
                    <h4 class="mb-0 text-white">Application Form with Specific Job Position</h4>
                </div>

                @if (session('message'))
                    <div class="alert alert-success my-3">{{ session('message')}}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="card card-shadow mt-4">
                    <div class="card-body job-desc">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="">Job Position</label>
                                <select name="job_name" class="form-control">
                                    @foreach ($job as $jobitem)
                                        <option value="{{ $jobitem->name }}">{{ $jobitem->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Contact Number</label>
                                <input type="number" name="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Cover Letter</label>
                                <textarea name="letter" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">CV / Resume</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="my-5">
                                <div class="row">
                                    <div class="col-md-4 d-flex">
                                        <input required type="checkbox" name="apply_status" class="form-control small-checkbox">
                                        <span class="px-3" style="font-size: 13px">Accept Terms & Conditions</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button  type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="border p-3 mb-3">
                    <h6>Advertisement Section</h6>
                </div>
                <div class="border p-3 mb-3">
                    <h6>Advertisement Section</h6>
                </div>
                <div class="border p-3 mb-3">
                    <h6>Advertisement Section</h6>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
