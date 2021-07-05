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
                                    <th scope="col">Slider Title </th>
                                    <th scope="col">Slider Description </th>
                                    <th scope="col">Slider Photo</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($LoadSlider as $band)
                                    <tr>
                                        <th scope="row">
                                            {{-- using sirial number generate --}}
                                            {{ $LoadSlider->firstItem() + $loop->index }}
                                        </th>
                                        <td>
                                            {{-- this are using model based join table view --}}
                                            {{ $band->title }}
                                            {{-- quere builder based view --}}
                                            {{-- {{ $allC->user->name }} --}}

                                        </td>
                                        <td>
                                            {{-- this are using model based join table view --}}
                                            {{ $band->description }}
                                            {{-- quere builder based view --}}
                                            {{-- {{ $allC->user->name }} --}}

                                        </td>

                                        <td>

                                            {{ Carbon\Carbon::parse($band->created_at)->diffForHumans() }}

                                        </td>
                                        <td>
                                            @if ($band->image == null)
                                                <span class="text-danger">No Image Found </span>
                                            @else
                                                <img src="{{ asset($band->image) }}" style="height:40px; width:50px"/>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('slider/edit/'.$band->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/'.$band->id) }}" onclick="return confirm('Are You Want To Delete It?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- {{ $LoadSlider->links() }} --}}
                    </div>

                </div>




            </div>
        </div>
        {{-- another  --}}




    </div>

@endsection
