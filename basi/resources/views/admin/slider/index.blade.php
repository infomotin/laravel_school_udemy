@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        {{-- alert toast massage --}}
                        @if (session('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <b>All Slider</b>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Brand Name </th>
                                    <th scope="col">Create Date </th>
                                    <th scope="col">Brand Photo</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($allbrand as $band)
                                    <tr>
                                        <th scope="row">
                                            {{-- using sirial number generate --}}
                                            {{ $allbrand->firstItem() + $loop->index }}
                                        </th>
                                        <td>
                                            {{-- this are using model based join table view --}}
                                            {{ $band->brand_name }}
                                            {{-- quere builder based view --}}
                                            {{-- {{ $allC->user->name }} --}}

                                        </td>

                                        <td>

                                            {{ Carbon\Carbon::parse($band->created_at)->diffForHumans() }}

                                        </td>
                                        <td>
                                            @if ($band->brand_img == null)
                                                <span class="text-danger">No Image Found </span>
                                            @else
                                                <img src="{{ asset($band->brand_img) }}" style="height:40px; width:50px"/>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('band/edit/'.$band->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('band/delete/'.$band->id) }}" onclick="return confirm('Are You Want To Delete It?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $allbrand->links() }}
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Brand
                        </div>
                        <div class="card-body">

                            <form action="{{ route('store.band') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name">
                                    {{-- validations part --}}
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Brand Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="brand_img"
                                        aria-describedby="emailHelp" placeholder="Upload Image">
                                    {{-- validations part --}}
                                    @error('brand_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        {{-- another  --}}




    </div>

@endsection
