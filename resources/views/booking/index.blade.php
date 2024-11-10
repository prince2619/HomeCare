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
                      @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                      @endif 
                      <table class="table table-bordered" id='myTable'>
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>User</th>
                      <th>Phone/Email</th>
                      <th>Date/Time</th> 
                      <th>service </th>
                      <th>Price </th>
                      <th>Message </th>
                      <th>Status </th>
                      <th>Accept </th>
                      <th>Reject </th>
                      <th>Complete </th>
                    </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($allBooking as $key => $booking)
                      <tr>
                      <th>{{ $key + 1 }}</th>
                      <th>{{ $booking->user->name }}</th>
                      <th>{{ $booking->phone }} {{ $booking->email }}</th>
                      <th>{{ $booking->created_at }}</th>
                      <th>{{ $booking->service->name }}</th>
                      <th>{{ $booking->service->price }}</th>
                      <th>{{ $booking->message }}</th>
                      <th>{{ $booking->status }}</th>
                      <th>
                        <form action="{{route('booking.changeStatus', $booking->id)}}" method='post'>
                            @csrf @method('POST')
                            <input type='submit' class='btn btn-success' name='status' value='Accept'> 
                      </th> 
                      <th>  <input type='submit' class='btn btn-danger' name='status' value='Reject'> </th>
                      <th>  <input type='submit' class='btn btn-warning' name='status' value='Hold'> </th>
                      </form>
                      </tr> 
                          
                   @endforeach 
               
                  </tbody>
                </table>
            
              </div> 
             
            </div> 
          </div>
        </div>
      </div>
    </section> 
  </div>  
@endsection
 

