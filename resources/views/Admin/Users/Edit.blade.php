
<!-- Modal -->
<div class="modal fade" id="Categories-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Categorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.users',['id'=>$user->id])}}"  class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" required autofocus autocomplete="name" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)" required autocomplete="username" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('email verified at')" />
                        <x-text-input id="email_verified_at" class="block mt-1 w-full" type="text" name="email_verified_at" :value="old('email_verified_at',$user->email_verified_at)" required autocomplete="username" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
