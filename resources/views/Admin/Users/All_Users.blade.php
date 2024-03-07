
@extends('layouts.dashboard')

@section('content')
<style>
    .btn-danger{
    color: white;
            }
            #select{
                background-color: transparent;
    border: none;
            }
            #form{
                display: flex;
                gap: 10px;
                margin-left: 3px;
            }
            #eye{
                display: flex;
                align-items: center;
                gap: 7px;
            }
</style>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Cars</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <div class="text-end upgrade-btn">
                        @include('Admin.Users.Add')
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle"><code></code></h6>
                            <div class="table-responsive">
                                <table class="table user-table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">email verified at</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users)
                            @foreach ($users as $user)
                            @include('Admin.Users.Edit')
                            @include('Admin.Users.Delete')
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->email_verified_at == null)
                                                    Null
                                                @else
                                                {{ $user->email_verified_at }}</td>
                                                @endif
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#Categories-{{ $user->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delCategorie-{{ $user->id }}">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if ($users->isEmpty())
                                <center> No Data Yet </center>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Listen for changes in the select element
            $('#validationServer04').change(function () {
                var selectedCategoryId = $(this).val();
    
                // Hide all rows in the table
                $('.user-table tbody tr').hide();
    
                // Show only the rows with the selected category
                $('.user-table tbody tr').filter(function () {
                    return $(this).find('td:last').text() == selectedCategoryId;
                }).show();
            });
        });
    </script>
    
@stop