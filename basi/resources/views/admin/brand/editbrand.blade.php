@extends('admin.admin_master')
@section('admin')
    @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-header">
                            Edit Brand
                        </div>
                        <div class="card-body">

                            <form action="{{ url('band/update/' . $loadEdit->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $loadEdit->brand_img }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name"
                                        value="{{ $loadEdit->brand_name }}">
                                    {{-- validations part --}}
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Brand Image</label>

                                    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_img"
                                        aria-describedby="emailHelp" placeholder="Upload Image" />
                                    {{-- validations part --}}
                                    @error('brand_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Load Image</label>
                                    <img src="{{ asset($loadEdit->brand_img) }}" style="height:150px; width:200px" />

                                    {{-- validations part --}}
                                    @error('brand_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        {{-- another --}}




    </div>
@endsection
