@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-ml-12">
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
                            <b>All Slider </b>
                            <a href="{{ route('store.slider') }}" style="margin:20px"><button class="btn btn-info">Add Slider</button></a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Sliders Title </th>
                                    <th scope="col">Sliders Description </th>
                                    <th scope="col">Sliders Photo </th>
                                    <th scope="col">Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php($i = 1) --}}
                                @foreach ($allslider as $band)
                                    <tr>
                                        <th scope="row">
                                            {{-- using sirial number generate --}}
                                            {{ $allslider->firstItem() + $loop->index }}
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
                                            @if ($band->image == null)
                                                <span class="text-danger">No Image Found </span>
                                            @else
                                                <img src="{{ asset($band->image) }}" style="height:40px; width:50px"/>
                                            @endif
                                        </td>
                                        <td>

                                            {{ Carbon\Carbon::parse($band->created_at)->diffForHumans() }}

                                        </td>

                                        <td>
                                            <a href="{{ url('slider/edit/'.$band->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/'.$band->id) }}" onclick="return confirm('Are You Want To Delete It?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $allslider->links() }}
                    </div>

                </div>




            </div>
        </div>
        {{-- another  --}}




    </div>

@endsection
