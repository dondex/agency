@extends('layouts.app')

@section('title', "$country->meta_title")

@section('meta_description', "$country->meta_description")

@section('meta_keyword', "$country->meta_keyword")

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <div class="country-heading">
                        <h4 class="mb-0">{{ $country->name}}</h4>
                    </div>

                    @forelse ($job as $jobitem)
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <a class="text-decoration-none" href="{{ url('jobs/'.$country->slug.'/'.$jobitem->slug) }}">
                                    <h2 class="job-heading">{{$jobitem->name}}</h2>
                                </a>
                                <div class="">
                                    <span class="span-text ">Posted On: {{$jobitem->created_at->format('d-m-Y')}}</span>
                                    <span class="span-text ms-3">Posted By: {{$jobitem->user->name}}</span>
                                </div>

                            </div>
                        </div>


                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h2>No Job Available</h2>
                            </div>
                        </div>
                    @endforelse

                    <div class="your-paginate my-3">
                        {{ $job->links() }}
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="country-image-style">
                        <img src="{{ asset('uploads/country/'.$country->image)}}" alt="img">
                    </div>
                    <div class="border p-3">
                        <h6>Advertisement Section</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
