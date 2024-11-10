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

                            <!-- Scrollable table wrapper -->
                            <div style="overflow-y: auto; max-height: 70vh;">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Desc</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allservices as $key => $service)
                                            <tr>
                                                <th>{{ $key + 1 }}</th>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->description }}</td>
                                                <td>{{ $service->price }}</td>
                                                <td><img src="{{ Storage::url($service->image) }}" width="100"></td>
                                                <td>
                                                    <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                                    <button data-toggle="modal" data-target="#myModal{{ $service->id }}" class="btn btn-danger">Remove</button> 
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="myModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $service->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel{{ $service->id }}">Are you sure?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>

                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer">
                                                            <form action="{{ route('service.delete', $service->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Remove</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
