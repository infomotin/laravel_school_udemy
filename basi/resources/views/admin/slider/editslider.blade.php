@extends('admin.admin_master')
@section('admin')
    <div class="col-ml-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Update Slider </h2>
            </div>
            <div class="card-body">
                 {{-- alert toast massage --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                <form method="POST" action="{{ url('slider/edit/'.$loadEdit->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="old_image" value="{{ $loadEdit->image }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Update Slider Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Slider Title" value="{{ $loadEdit->title  }}" />
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Update Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $loadEdit->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <p>Old Image </p>
                        @if ($loadEdit->image == null)
                            <span class="text-danger">No Image Found </span>
                        @else
                            <img src="{{ asset($loadEdit->image) }}" style="height:130px; width:150px"/>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider input</label>
                        <input type="file" class="form-control-file" name="image" />
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">
                            Update Slider
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


{{-- <script>
    document.getElementById("description").value = "Fifth Avenue, New York City";
</script> --}}
