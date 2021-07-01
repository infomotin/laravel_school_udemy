<x-app-layout>
    <x-slot name="header">
        <b> Multipicture </b>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach ($Images as $image)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{ asset($image->image)}}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $Images->links() }}
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Multi Image
                        </div>
                        <div class="card-body">

                            <form action="{{ route('save.images') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Multi Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="image[]"
                                        aria-describedby="emailHelp" placeholder="Upload Image" multiple="true">
                                    {{-- validations part --}}
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- another --}}
    </div>
</x-app-layout>
