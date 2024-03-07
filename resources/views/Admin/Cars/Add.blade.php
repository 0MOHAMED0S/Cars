
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addietm">
    <i class="bi bi-plus-circle-dotted"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="addietm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Car</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.cars') }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="col-md-7">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="validationServer04" class="form-label">Categories</label>
                    <select name="categorie_id" class="form-select isvalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->name }}
                            </option>
                        @endforeach
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        Please select a valid state.
                    </div>
                    @error('categorie_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="validationCustom01" class="form-label">Details</label>
                    <textarea name="details" type="text" class="form-control" id="validationCustom01" required>
                        {{old('details')}}
                        </textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('details')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Price</label>
                    <input value="{{old('price')}}" name="price" type="number" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">passengers</label>
                    <input value="{{old('passengers')}}" name="passengers" type="number" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('passengers')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Doors</label>
                    <input value="{{old('doors')}}" name="doors" type="number" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('doors')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Image</label>
                    <input id="imageInput1" name="path" type="file" class="form-control" aria-label="file example" accept="image/*" required>
                    <div class="invalid-feedback">Please select a valid image file.</div>
                    <br>
                    <center>
                        <div id="selectedImages1"></div>
                    </center>
                    @error('path')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('imageInput1').addEventListener('change', function (event) {
        const selectedImagesContainer = document.getElementById('selectedImages1');
        selectedImagesContainer.innerHTML = '';

        const files = event.target.files;

        for (const file of files) {
            const imageElement = document.createElement('img');
            imageElement.src = URL.createObjectURL(file);
            imageElement.alt = 'Selected Image';
            imageElement.style.maxWidth = ''; // Set a maximum width for display
            selectedImagesContainer.appendChild(imageElement);
        }
    });
</script>