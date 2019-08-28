@extends('admin.layouts.app')
@section('content')


    <div class="container-fluid pl-4">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->has('success'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ $errors->first('success') }}
                    </div>
                @endif

                <form id="" role="form" action="@if(!empty($editcustom)) {{url('update-customsite/'.$editcustom->id)}}@else {{url('/customsite')}}  @endif " method="POST" enctype="multipart/form-data">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">
                            @if(!empty($editcustom))
                                Update Custom Site
                            @else
                                Add Custom Site
                            @endif

                        </legend>
                        <div class="box-body">
                            {{ csrf_field() }}
                            {{--<div class="form-group">--}}
                                {{--<label for="category_name">Title</label>--}}
                                {{--<input type="text" class="form-control" id="" name="title" value="@if(!empty($editcustom)){{$editcustom->title}}@endif" placeholder="Enter Title name" autocomplete="off">--}}

                            {{--</div>--}}

                            <div class="form-group">
                                <label for="">Description</label>
                                <div class="controls">
                                     <textarea name="description" id="editor1" rows="10" cols="80">@if(!empty($editcustom)){!! base64_decode($editcustom->description) !!}@endif</textarea>

                                </div>

                            </div>

                            <div class="form-group">
                                <label for="category_name">Youtube</label>
                                <input type="text" class="form-control" id="" name="youtube_link" value="@if(!empty($editcustom)){{$editcustom->youtube_link}}@endif" placeholder="Enter Title name" autocomplete="off">

                            </div>

                            <div class="form-group">
                                <label for="category_name">Facebook</label>
                                <input type="text" class="form-control" id="" name="facebook_link" value="@if(!empty($editcustom)){{$editcustom->facebook_link}}@endif" placeholder="Enter Title name" autocomplete="off">

                            </div>

                            <div class="form-group">
                                <label for="category_name">Twitter</label>
                                <input type="text" class="form-control" id="" name="twitter_link" value="@if(!empty($editcustom)){{$editcustom->twitter_link}}@endif" placeholder="Enter Title name" autocomplete="off">

                            </div>

                            <div class="form-group">
                                <label for="category_name">Instagram</label>
                                <input type="text" class="form-control" id="" name="instagram_link" value="@if(!empty($editcustom)){{$editcustom->instagram_link}}@endif" placeholder="Enter Title name" autocomplete="off">

                            </div>



                        </div>
                        <button type="submit" class="pl-3 pr-3">   @if(!empty($editcustom))Update @else Save @endif </button>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>


    <script>




    </script>
    <script>
        CKEDITOR.config.contentsCss  = ['https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css','https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js','https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',''];
        CKEDITOR.replace('editor1', {allowedContent: true});

        config.contentsCss = ['//cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css','//cdn.jsdelivr.net/bootswatch/3.3.6/readable/bootstrap.css'];
        config.protectedSource.push(/<i[^>]*><\/i>/g);
    </script>
@endsection
