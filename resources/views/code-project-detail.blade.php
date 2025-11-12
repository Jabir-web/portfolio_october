@extends('layouts.layout')
@section('content')
    <section>
        <div class="row mb-3 p-4">
            <div class="col-12">
                <div class="d-inline-block border-2 p-4">

                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{ asset($project->image) }}" class="rounded img-thumbnail" width="100%" alt="">

                        </div>
                        <div class="col-md-7 p-3 d-flex flex-column justify-content-center">
                            <div class=" rounded-circle heart-icon  d-inline-block d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px;">
                                <i class="icon icon-heart "></i>
                            </div>
                            <h1 class="font-weight-bold mb-3">{{ $project->title }}</h1>
                            <p class="text-capitalize mb-3">{{ $project->level }} Level</p>
                            <div class="row ">
                                <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Likes:
                                    <span
                                        class="font-weight-bold">{{ \App\Models\Like::where('project_id', $project->id)->count() }}</span>
                                </div>
                                <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Views:
                                    <span class="font-weight-bold">{{ $project->views }}</span>
                                </div>
                                <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Size:
                                    <span class="font-weight-bold">{{ $project->size }}</span>
                                </div>
                                <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Version:
                                    <span class="font-weight-bold text-uppercase">{{ $project->version }}</span>
                                </div>
                                {{-- <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Downloads: 
                                    <span class="font-weight-bold">{{ $project->downloads }}</span>
                                </div> --}}
                                <div class="view-box bg-white rounded p-3 w-25 col-md-3 m-1" style="font-size: 18px">
                                    Amount:
                                    <span class="font-weight-bold">{{ number_format((int) $project->amount) }}</span>
                                </div>

                            </div>
                            <div class="d-flex">
                                <div class="view-box bg-primary rounded d-flex justify-content-center align-items-center  col-md-3 m-1"
                                    style="font-size: 18px">
                                    <a href="{{ $project->video_link }}" target="_blank" class="btn btn-primary">Live
                                        Demo</a>
                                </div>
                                @if ($project->amount > 0)
                                   <div></div>
                                @else
                                    {{-- <div class="view-box bg-dark rounded d-flex justify-content-center align-items-center  col-md-3 m-1"
                                        style="font-size: 18px">
                                        <a href="{{ $project->download_link }}" target="_blank"
                                            class="btn btn-dark">Free
                                            Download</a>
                                    </div> --}}
                                @endif

                            </div>

                        </div>
                        <div class="col-md-12 py-3">
                            <h3 class="font-weight-bold mb-3">Description:</h3>
                            <p style="font-size: 20px !important;">{{ $project->description }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
