@extends('admin.admin_master')
@section('admin')




    <div class="col-ml-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add New Slider </h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('insertSlider') }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Enter Slider Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Slider Title" />

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file" name="image" />
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">
                            Add Slider
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
