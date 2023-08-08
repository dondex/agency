@extends('layouts.app')

@section('title', "Philworld Recruitment Agency Inc.")

@section('meta_description', "Philworld Recruitment Agency Inc.")

@section('meta_keyword', "Philworld Recruitment Agency Inc.")

@section('content')

<section class="page-title bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Philworld Recruitment Agency Inc.</span>
            <h1 class="text-capitalize mb-4 text-lg">News & Events</h1>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item text-white-50">News & Events</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>


    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($news as $newsitem)
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="blog-item">
                                <img loading="lazy" src="{{ asset('uploads/news/'.$newsitem->image)}}" class="img-fluid img-fluid-news-main rounded" alt="img">

                                <div class="blog-item-content bg-white p-4">
                                    <div class="blog-item-meta  py-1 px-2">
                                        <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>Philworld</span>
                                        <span class="text-black text-capitalize d-inline-block mr-3"><i class="ti-time mr-1"></i> {{$newsitem->created_at->format('d-m-Y')}}</span>
                                    </div>

                                    <h3 class="mt-3 mb-3">{{ $newsitem->name}}</h3>


                                    <a href="{{ url('news/'.$newsitem->slug)}}" class="btn btn-small btn-main btn-round-full">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <div class="your-paginate my-3">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="sidebar-wrap">

                        <div class="sidebar-widget card border-0 mb-3">
                            <img loading="lazy" src="{{ asset('assets/images/phil-logo.png')}}" alt="blog-author" class="img-fluid">
                            <div class="card-body p-4 text-center">
                                <h5 class="mb-0 mt-4">Philworld</h5>
                                <p>Recruitment Agency, Inc.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

                                <ul class="list-inline author-socials">
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5>Latest Jobs</h5>

                            @foreach ($latest_jobs as $jobsitem)
                            <div class="media border-bottom py-3">
                                <a href="{{url('/')}}"><img loading="lazy" class="mr-4 img-fluid" width="100px" height="100px" src="{{ asset('assets/images/hiring.jpg')}}" alt="blog"></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="{{url('/')}}">{{$jobsitem->name}}</a></h6>
                                    <span class="text-sm text-muted">{{ $jobsitem->created_at->format('d-m-Y')}}</span>
                                </div>
                            </div>
                            @endforeach


                        </div>

                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Countries</h5>
                            @foreach ($countries as $countryitem)
                            <a href="{{url('jobs/'.$countryitem->slug)}}">{{ $countryitem->name}}</a>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
