@extends('layouts.dashboard')

@section('content')
<!-- Add this code where you want the fixed alert to appear -->

@foreach ($cars as $car)
@include('Admin.Cars.Edit')
@include('Admin.Cars.Delete')
@include('Admin.Cars.Descriotion')
@endforeach
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <br>

            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Cars</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a id="a" href="#">Home</a></li>
                                <form id="form" method="GET" action="{{route('cars')}}">
                                    
                                    <select id="select" name="categorie_id" class="form-select isvalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                        <option value="all" {{ old('categorie_id') == 'all' ? 'selected' : '' }}>All Cars</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}" {{ old('categorie_id', isset($selectedCategoryId) ? $selectedCategoryId : '') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary" >
                                        <i class="bi bi-search-heart"></i>                           
                                        </button>
                                </form>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <div class="text-end upgrade-btn">
                        @include('Admin.Cars.Add')
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="text-muted mb-0">Total Cars: {{ $cars->count() }}</h3>
                        </div>
                        <br>
                </div>
            </div>
        </div>
        </div>
        <br>
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
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Decription</th>
                                            <th class="border-top-0">Passengers</th>
                                            <th class="border-top-0">Doors</th>
                                            <th class="border-top-0">categorie</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($cars)
                            @foreach ($cars as $car)
                                        <tr>
                                            <td>{{ $car->id }}</td>
                                            <td>
                                                <div id="eye">
                                                    <a  href="{{ asset('storage/' . $car->path) }}" class="glightbox"><img
                                                        width="50px" height="50px"
                                                    src="{{ asset('storage/' . $car->path) }}"
                                                    class="menu-img img-fluid" alt=""></a>
                                                    <a href=""><i class="bi bi-eye"></i></a>
                                                </div>
                                            </td>
                                            <td>{{ $car->name }}</td>
                                            <td>{{ $car->price }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#des-{{$car->id}}">
                                                    <i class="bi bi-clipboard2-data"></i>
                                                </button>
                                            </td>
                                            <td>{{ $car->passengers }}</td>
                                            <td>{{ $car->doors }}</td>
                                            <td>{{ $car->categorie->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editietm-{{$car->id}}">
                                                <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$car->id}}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if ($cars->isEmpty())
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