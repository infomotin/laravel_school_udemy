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
                        <form>
                            <div >
                                <label for="exampleInputEmail1" class="form-group m-2">Category Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Category Name">
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
