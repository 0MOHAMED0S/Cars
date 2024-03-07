<x-app-layout>
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <style>
select{
    margin-right: 8px;
    padding: 8px;
    border: none;
    font-size: 29px;
}
form{
    display: flex;
    justify-content: center;
    text-align: center;
    align-items: center;
}
    </style>
    <div style="height: 100px">
    </div>
    <div class="row align-items-center" style="display: flex; justify-content: space-between;">
        <div class="col-md-6 col-4 align-self-center text-end">
            <div style="display: flex;justify-content: center; text-align: center; " class="row align-items-center mt-3">
                <div class="col-md-6 col-8 align-self-center">
                    <form id="form" method="GET" action="{{ route('cars.user') }}" style="display: flex; align-items: center;">
                        <select id="select" name="categorie_id" class="form-select isvalid" id="validationServer04" aria-describedby="validationServer04Feedback" required style="margin-right: 8px;">
                            <option value="all" {{ old('categorie_id') == 'all' ? 'selected' : '' }}>All Cars</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id', isset($selectedCategoryId) ? $selectedCategoryId : '') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary" style="display: flex; align-items: center;">
                            <i class="bi bi-search-heart"></i>
                        </button>
                    </form>
                    <br>
                    @if ($cars->count()==0)
                        
                    @else
                    <h3 class="text-muted mb-0">Total Cars: {{ $cars->count() }}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
    <div class="container">
        @if ($cars->isEmpty())
            <center>
                <h1>Soon</h1>
            </center>
            <br>
            <br>
        @else
        @foreach ($cars as $index => $car)
        @if ($index % 3 == 0)
            <div class="row">
        @endif
    
        <div style="max-width: 700px; max-height: 500px;" class="col-md-4 car-item text-center">
            <div class="car-image">
                <img class="img-responsive" src="{{ asset('storage/'.$car->path) }}" alt="" />
                <div class="car-overlay-banner">
                    <ul>
                        <li><a href="{{ route('cars.details', ['id' => $car->id]) }}"><i class="fa fa-link"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="car-content">
                <a href="{{ route('cars.details',['id' => $car->id]) }}">{{ $car->name }}</a>
                <div class="separator"></div>
                <div class="price">
                    <span class="new-price">${{ $car->price }}</span>
                </div>
            </div>
        </div>
    
        @if (($index + 1) % 3 == 0 || $loop->last)
            </div>
        @endif
    @endforeach
    
        @endif
    </div>
    
    
</x-app-layout>


