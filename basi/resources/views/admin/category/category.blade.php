<x-app-layout>
    <x-slot name="header">
        <b> All Category </b>
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
                            <b>All Category</b>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Categoty Name</th>
                                    <th scope="col">Create Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($allcat as $allC)
                                    <tr>
                                        <th scope="row">
                                            {{-- using sirial number generate --}}
                                            {{ $allcat->firstItem() + $loop->index }}
                                        </th>
                                        <td>
                                            {{-- this are using model based join table view --}}
                                            {{-- {{ $allC->user->name }} --}}
                                            {{-- quere builder based view --}}
                                            {{ $allC->user->name }}

                                        </td>
                                        <td>

                                            {{ $allC->category_name }}

                                        </td>
                                        <td>
                                            @if ($allC->created_at == null)
                                                <span class="text-danger">No Data Found </span>
                                            @else
                                                {{ Carbon\Carbon::parse($allC->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/edit/'.$allC->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('soft/delete/'.$allC->id) }}" class="btn btn-danger">Trash</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $allcat->links() }}
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
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name"
                                        aria-describedby="emailHelp" placeholder="Enter Category Name">
                                    {{-- validations part --}}
                                    @error('cat_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- validations part end --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        {{-- another  --}}
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        {{-- alert toast massage --}}
                        {{-- @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif --}}
                        <div class="card-header">
                            <b>Trash List</b>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Categoty Name</th>
                                    <th scope="col">Create Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($tashCategory as $allC)
                                    <tr>
                                        <th scope="row">
                                            {{-- using sirial number generate --}}
                                            {{ $tashCategory->firstItem() + $loop->index }}
                                        </th>
                                        <td>
                                            {{-- this are using model based join table view --}}
                                            {{-- {{ $allC->user->name }} --}}
                                            {{-- quere builder based view --}}
                                            {{ $allC->user->name }}

                                        </td>
                                        <td>

                                            {{ $allC->category_name }}

                                        </td>
                                        <td>
                                            @if ($allC->created_at == null)
                                                <span class="text-danger">No Data Found </span>
                                            @else
                                                {{ Carbon\Carbon::parse($allC->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/restore/'.$allC->id) }}" class="btn btn-info">Restore</a>
                                            <a href="{{ url('category/delete/'.$allC->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $tashCategory->links() }}
                    </div>

                </div>
                <div class="col-md-4">

                </div>



            </div>
        </div>



    </div>
</x-app-layout>
