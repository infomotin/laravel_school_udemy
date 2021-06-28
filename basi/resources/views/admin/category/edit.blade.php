<x-app-layout>
    <x-slot name="header">
        <b> Edit Category </b>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Edit Category
                        </div>
                        <div class="card-body">

                            <form action=" " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Update Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name"
                                        aria-describedby="emailHelp" placeholder="Enter Category Name" value="{{ $category->category_name }}">
                                    {{-- validations part --}}
                                    @error('cat_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- validations part end --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
