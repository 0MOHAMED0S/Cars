<x-app-layout>
    <style>
        #span{
            font-size: 25px;
        }
    </style>
<br>
    <section class="latest-blog objects-car white-bg page page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <h2>Car Details</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="blog-1">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img class="img-responsive" src="{{asset('storage/'.$car->path)}}" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog-content">
                            <span id="span"> {{$car->categorie->name}}</span>

                            <a class="link" >
                                {{$car->name}}.
                            </a>
                            <span  id="span" class="uppercase">Price |
                                <strong class="text-red"> {{$car->price}} $
                                </strong>
                            </span>
                            <br>
                            <span id="span" class="uppercase">Passengers |
                                <strong class="text-red">{{$car->passengers}}
                                </strong>
                            </span>
                            <br>
                            <span id="span" class="uppercase">doors |
                                <strong class="text-red">{{$car->doors}}
                                </strong>
                            </span>
                            <p>{{$car->details}}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
