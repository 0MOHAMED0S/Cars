<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Categories">
    <i class="bi bi-plus-circle-dotted"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="Categories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.categories') }}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name Of Categorie</label>
                    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    @error('section')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
