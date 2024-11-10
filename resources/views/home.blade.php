@extends('layouts.app')

@section('content')
<div class="container px-5">

@if(auth()->user())
    @if(auth()->user()->is_admin == 1)
    <div class="col-12 row text-right py-3">
        <div class="div">
            <a class='btn btn-primary' href='{{route("service.create")}}'>Create</a> 
            <a class='btn btn-success' href='{{route("service.index")}}'>View All</a> 
        </div>
    </div>
    @endif
@endif

<div class="row col-12 py-5">
    <div class="col-6">
        <h3>HomeCare service Shop</h3>
        <p>At HomeCare, we’re dedicated to transforming your living space into a haven of comfort and style. Our comprehensive suite of services caters to all your home needs, from routine maintenance to major renovations. Whether it’s a minor plumbing issue, a fresh coat of paint, or a complete home makeover, our skilled professionals are here to assist you. Experience the convenience of booking reliable and efficient services at your fingertips, saving you time and effort. Elevate your home, elevate your lifestyle.</p>
    </div>
    <div class="col-6">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($allService as $key => $service)
                <div class="carousel-item">
                    <img src="{{ Storage::url($service->image)}}" alt="Service Image" width="100%" height="300">
                </div> 
                @endforeach 
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

<div class="row py-5">
    <div class="col-12 text-center">
        <h3>Our Services</h3>
    </div>
</div>

<div class="row">
    @foreach($allService as $key => $service)
    <div class="col-3">
        <div class="card text-center">
            <img class="m-auto" src="{{ Storage::url($service->image)}}" width="200" height="100">
            <div class="card-body text-center">
                <h4 class="card-title text-uppercase">{{ $service->name }}</h4>
                <p class="card-text text-center">Rs. {{ $service->price }}</p>

                @if(auth()->user())
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $service->id }}">
                    Book Now
                </button>
                @endif
            </div>
        </div>
    </div> 

    <!-- The Modal -->
    <div class="modal" id="myModal{{ $service->id }}">
        <div class="modal-dialog">
            <div class="modal-content"> 
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('home.store',$userid = optional(auth()->user())->id ?? 0 )}}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-3">  
                                <div class="row">
                                    <div class="col-2">
                                        <img class="m-auto" src="{{ Storage::url($service->image) }}" width="50" height="50">
                                    </div>
                                    <div class="col-10">
                                        <input type="text" disabled class="form-control" name="name" value="{{ $service->name }}">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group mb-3">
                                <label for="name">Date/Time</label>
                                <input type="time" class="form-control" name="time">
                                <input type="date" class="form-control" name="date">
                            </div> 
                            <div class="form-group mb-3">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" name="phone">
                                <input type="hidden" class="form-control" name="service_id" value="{{ $service->id }}"> 
                                <input type="hidden" class="form-control" name="price" value="{{ $service->price }}"> 
                            </div> 
                            <div class="form-group mb-3">
                                <label for="description">Message</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div> 
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Book</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    @endforeach 
</div>
</div>
@endsection

<script>
    setTimeout(() => {
        document.querySelectorAll('.carousel-item')[0].classList.add('active');
    }, 500);
</script>
