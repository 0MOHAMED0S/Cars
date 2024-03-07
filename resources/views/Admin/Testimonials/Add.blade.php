
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#testimonials">
    <i class="bi bi-plus-circle-dotted"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="testimonials" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Testimonials</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.testimonials') }}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @csrf
                <div >
                    <label for="validationCustom01" class="form-label">Name Of Testimonials</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('section')
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
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Person Image</label>
                    <input id="imageInput1" name="path2" type="file" class="form-control" aria-label="file example" accept="image/*" required>
                    <div class="invalid-feedback">Please select a valid image file.</div>
                    <br>
                    <center>
                        <div id="selectedImages1"></div>
                    </center>
                    @error('path2')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Car Image</label>
                    <input id="imageInput" name="path" type="file" class="form-control" aria-label="file example" accept="image/*" required>
                    <br>
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                    <center>
                        <div id="selectedImages"></div>
                    </center>
                </div>
                <br>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Create</button>
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
        
        // Set a maximum width for display
        imageElement.style.maxWidth = '';

        // Set specific width, height, and border-radius
        imageElement.style.width = '100px'; // Set width to 100px
        imageElement.style.height = '100px'; // Set height to 100px
        imageElement.style.borderRadius = '50px'; // Set border-radius to 50px

        selectedImagesContainer.appendChild(imageElement);
    }
});


    document.getElementById('imageInput').addEventListener('change', function (event) {
        const selectedImagesContainer = document.getElementById('selectedImages');
        selectedImagesContainer.innerHTML = '';

        const files = event.target.files;

        for (const file of files) {
            const imgElement = document.createElement('img');
            imgElement.src = URL.createObjectURL(file);
            imgElement.alt = 'Selected Image';
            selectedImagesContainer.appendChild(imgElement);
        }
    });
</script>