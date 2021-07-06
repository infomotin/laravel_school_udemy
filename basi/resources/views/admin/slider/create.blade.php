@extends('admin.admin_master')
@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            {{-- alert toast massage --}}
            @if (session('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong> {{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header card-header-border-bottom">
                <h2>Add Slider </h2>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="title" />
                        <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea class="form-control" rows="3" name="description"
                            placeholder="We'll never share your email with anyone else."></textarea>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider Image</label>
                        <input type="file" class="form-control-file" name="image" />

                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">
                            Submit
                        </button>
                        <button type="submit" class="btn btn-secondary btn-default">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>




@endsection
