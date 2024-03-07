@extends('layouts.dashboard')

@section('content')
    <style>
        .green-radio {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #4caf50;
            border-radius: 50%;
            background-color: white;
            margin: 5px;
            cursor: pointer;
        }

        .green-radio.checked {
            background-color: #4caf50;
        }
        .btn-danger{
        color: white;
        }
    </style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Testimonials</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    @include('Admin.Testimonials.Add')
                </div>
            </div>
            <center>
                <div class="row align-items-center mt-3">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-muted mb-0">Total Testimonials: {{ $testimonials->count() }}</h3>
                    </div>
                    <br>
            </div>
            </center>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Person Image </th>
                                        <th class="border-top-0">Car Image </th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($testimonials)
                        @foreach ($testimonials as $testimonial)
                        @include('Admin.Testimonials.Descriotion')
                        @include('Admin.Testimonials.Edit')
                        @include('Admin.Testimonials.Delete')
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        
                                        <td>
                                            <div id="eye">
                                                <a  href="{{ asset('storage/' . $testimonial->path2) }}" class="glightbox"><img
                                                    width="50px" height="50px"
                                                src="{{ asset('storage/' . $testimonial->path2) }}"
                                                class="menu-img img-fluid" alt=""></a>
                                                <a href=""><i class="bi bi-eye"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="eye">
                                                <a  href="{{ asset('storage/' . $testimonial->path) }}" class="glightbox"><img
                                                    width="50px" height="50px"
                                                src="{{ asset('storage/' . $testimonial->path) }}"
                                                class="menu-img img-fluid" alt=""></a>
                                                <a href=""><i class="bi bi-eye"></i></a>
                                            </div>
                                        </td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#des-{{$testimonial->id}}">
                                                <i class="bi bi-clipboard2-data"></i>
                                            </button>
                                        </td>                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $testimonial->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#del-{{ $testimonial->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if ($testimonials->isEmpty())
                            <center>No Data Yet</center>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        © 2021 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>
</div>
@stop

