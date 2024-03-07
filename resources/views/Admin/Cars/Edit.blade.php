
<!-- Modal -->
<div class="modal fade" id="editietm-{{$car->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu Ietm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.cars',['id'=>$car->id])}}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-7">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name', $car->name) }}" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationServer04" class="form-label">Section</label>
                        <select name="categorie_id" class="form-select isvalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id', $car->section_id) == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->name }}
                                </option>
                            @endforeach
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    
                    <div>
                        <label for="validationCustom01" class="form-label">Details</label>
                        <textarea name="details" type="text" class="form-control" id="validationCustom01" required>
                            {{ old('details', $car->details) }}
                        </textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Price</label>
                        <input  value="{{ old('price', $car->price) }}" name="price" type="number" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">passengers</label>
                        <input  value="{{ old('passengers', $car->passengers) }}" name="passengers" type="number" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Doors</label>
                        <input  value="{{ old('doors', $car->doors) }}" name="doors" type="number" class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Image</label>
                        <input id="imageInput-{{$car->id}}" name="path" type="file" class="form-control" aria-label="file example" accept="image/*" required>
                        <br>
                        <img id="defaultImage-{{$car->id}}" src="{{ asset('storage/'.$car->path) }}" alt="">
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                        <center>
                            <div id="selectedImages-{{$car->id}}"></div>
                        </center>
                    </div>
                
                    <script>
                        document.getElementById('imageInput-{{$car->id}}').addEventListener('change', function (event) {
                            const selectedImagesContainer = document.getElementById('selectedImages-{{$car->id}}');
                            selectedImagesContainer.innerHTML = '';
                
                            // Hide the default image when a new file is selected
                            document.getElementById('defaultImage-{{$car->id}}').style.display = 'none';
                
                            const files = event.target.files;
                
                            for (const file of files) {
                                const imgElement = document.createElement('img');
                                imgElement.src = URL.createObjectURL(file);
                                imgElement.alt = 'Selected Image';
                                selectedImagesContainer.appendChild(imgElement);
                            }
                        });
                    </script>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>




