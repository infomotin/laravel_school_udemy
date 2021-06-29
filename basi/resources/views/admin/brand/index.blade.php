<x-app-layout>
    <x-slot name="header">
        <b> All Brand </b>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        {{-- alert toast massage --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <b>All Brand</b>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Create Date</th>
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

                                            {{ $band->created_at }}

                                        </td>
                                        <td>
                                            @if ($band->brand_img == null)
                                                <span class="text-danger">No Image Found </span>
                                            @else
                                                {{ $band->brand_img }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('band/edit/'.$band->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('band/delete/'.$band->id) }}" class="btn btn-danger">Delete</a>
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

                            <form action="{{ route('store.band') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name">
                                    {{-- validations part --}}
                                    @error('cat_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- validations part end --}}
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
</x-app-layout>
