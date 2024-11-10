@extends('layouts.app')

@section('content')
@include('sidebar')

<div class="content-wrapper"> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
              <div class="card-body">
                @if (count($errors) > 0) 
                    @foreach($errors->all() as $error)
                         <div class="alert alert-danger">
                              {{$error}}
                        </div>
                    @endforeach
                @endif

                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name of Service</label>
                            <input type="text" class="form-control" name="name" placeholder="name ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description of service</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-inline mb-4">
                            <label>Service Cost(Rs)</label>
                            <div class="d-flex"> 
                                <input type="number" name="price" class="form-control" placeholder="price">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>          
              </div>             
            </div> 
          </div>
        </div>
      </div>
    </section> 
</div>  
@endsection
