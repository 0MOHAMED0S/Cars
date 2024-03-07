@extends('layouts.dashboard')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Messages</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    {{-- @include('Admin.Testimonials.Add') --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div style="max-width: 950px" class="card-body">
                        <div class="table-responsive">
                        @include('Admin.messages.msg')
                        
                    </div>
                    <div  class="messages-container">
                        <div class="message-container">
                            <div class="message-header">
                                <span class="message-sender">{{$message->name}}</span>
                                <span class="message-email">{{$message->email}}</span>
                            </div>
                            <hr>
                            <center>
                                <p>{{$message->message}}</p>
                            </center>
                        </div>
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

