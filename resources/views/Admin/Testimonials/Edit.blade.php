
<!-- Modal -->
<div class="modal fade" id="edit-{{$testimonial->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Testimonial</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.testimonials',['id'=>$testimonial->id])}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT') 
                    <div >
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input name="name" value="{{old('name',$testimonial->name)}}" type="text" class="form-control" id="validationCustom01" required>
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
                            {{old('details',$testimonial->details)}}
                            </textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        @error('details')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

<div class="mb-3">
    <label for="validationCustom01" class="form-label">  Person Image</label>
    <input id="imageInput2-{{$testimonial->id}}" name="path2" type="file" class="form-control" aria-label="file example" accept="image/*" required>
    <br>
    <center>
        <img width="100" height="100" style="border-radius: 50px" id="defaultImage2-{{$testimonial->id}}" src="{{ asset('storage/'.$testimonial->path2) }}" alt="">
    </center>
    <br>
    <center>
        <div id="selectedImages2-{{$testimonial->id}}"></div>
    </center>
    @error('path2')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="validationCustom01" class="form-label">Car Image</label>
    <input id="imageInput-{{$testimonial->id}}" name="path" type="file" class="form-control" aria-label="file example" accept="image/*" required>
    <br>
    <div class="invalid-feedback">Example invalid form file feedback</div>
    <img id="defaultImage-{{$testimonial->id}}" src="{{ asset('storage/'.$testimonial->path) }}" alt="">
    <center>
        <div id="selectedImages-{{$testimonial->id}}"></div>
    </center>
    @error('path')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
                    <br>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
     document.getElementById('imageInput2-{{$testimonial->id}}').addEventListener('change', function (event) {
        const selectedImagesContainer = document.getElementById('selectedImages2-{{$testimonial->id}}');
        selectedImagesContainer.innerHTML = '';

        // Hide the default image when a new file is selected
        document.getElementById('defaultImage2-{{$testimonial->id}}').style.display = 'none';

        const files = event.target.files;

        for (const file of files) {
            const imgElement = document.createElement('img');
            imgElement.src = URL.createObjectURL(file);
            imgElement.alt = 'Selected Image';
            imgElement.style.width = '100px'; // Set width to 100px
            imgElement.style.height = '100px'; // Set height to 100px
            imgElement.style.borderRadius = '50px'; // Set border-radius to 50px
            selectedImagesContainer.appendChild(imgElement);
        }
    });
    document.getElementById('imageInput-{{$testimonial->id}}').addEventListener('change', function (event) {
        const selectedImagesContainer = document.getElementById('selectedImages-{{$testimonial->id}}');
        selectedImagesContainer.innerHTML = '';

        // Hide the default image when a new file is selected
        document.getElementById('defaultImage-{{$testimonial->id}}').style.display = 'none';

        const files = event.target.files;

        for (const file of files) {
            const imgElement = document.createElement('img');
            imgElement.src = URL.createObjectURL(file);
            imgElement.alt = 'Selected Image';
            selectedImagesContainer.appendChild(imgElement);
        }
    });
</script>