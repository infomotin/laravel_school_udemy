<x-app-layout>
    <x-slot name="header">
        <b> All Category </b>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b>All Category</b>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actived Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1)
                        @foreach ($user as $use) --}}
                                <tr>
                                    <th scope="row">
                                        {{-- {{ }} --}}
                                    </th>
                                    <td>
                                        {{-- {{ }} --}}

                                    </td>
                                    <td>

                                        {{-- {{  }} --}}

                                    </td>
                                    <td>

                                        {{-- {{  }} --}}

                                    </td>
                                </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">

                            <form action="{{ route('store.cat') }}" method="POST">
                                 @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="m-2">Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="cat_name"
                                        aria-describedby="emailHelp" placeholder="Enter Category Name" >
                                        {{-- validations part  --}}
                                    @error('cat_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- validations part end  --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
