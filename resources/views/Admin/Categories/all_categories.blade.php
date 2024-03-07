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
                <h3 class="page-title mb-0 p-0">Categories</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    @include('Admin.Categories.Add')
                </div>
            </div>
            <center>
                <div class="row align-items-center mt-3">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-muted mb-0">Total Categories: {{ $categories->count() }}</h3>
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
                        <h4 class="card-title">Basic Table</h4>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($categories)
                        @foreach ($categories as $categorie)
                        
                        @include('Admin.Categories.Edit')
                        @include('Admin.Categories.Delete')
                                    <tr>
                                        <td>{{ $categorie->id }}</td>
                                        <td>{{ $categorie->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#Categories-{{ $categorie->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delCategorie-{{ $categorie->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if ($categories->isEmpty())
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

