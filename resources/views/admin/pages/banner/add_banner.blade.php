@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pl-4">
    <div class="row">
      <div class="col-md-6">
        @if ($errors->has('success'))
          <div class="alert alert-success mt-2" role="alert">
            {{ $errors->first('success') }}
          </div>
        @endif

        <form id="" role="form" action="@if(!empty($editbanner)) {{url('update-banner/'.$editbanner->id)}}@else {{url('/banner')}}  @endif " method="POST" enctype="multipart/form-data">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">
              @if(!empty($editbanner))
                Update Banner
                @else
                Add Banner
                @endif

            </legend>
            <div class="box-body">
              {{ csrf_field() }}


              <div class="form-group">
                <label for="category_name">Type<span class="text-danger">*</span></label>
               <select name="type" class="form-control">
                 @if(!empty($editbanner))
                   <option value="banner" @if($editbanner->type=='banner') selected='selected' @endif>Banner</option>
                   <option value="slider" @if($editbanner->type=='slider') selected='selected' @endif>Slider</option>


                 @else
                   <option value="">Select Type</option>
                   <option value="banner">Banner</option>
                   <option value="slider">Slider</option>
                 @endif


               </select>
              </div>


              <div class="form-group">
                <label for="category_name">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="" name="title" value="@if(!empty($editbanner)){{$editbanner->title}}@endif" placeholder="Enter Title name" autocomplete="off" required>
                @if ($errors->has('title'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="">Description</label>
                <div class="controls">
                    <textarea class="form-control" id="" name="description" rows="3" placeholder="">@if(!empty($editbanner)){{$editbanner->title}}@endif</textarea>
                </div>
                @if ($errors->has('description'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('description') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="category_name">Image<span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="" name="image" alt="Image" autocomplete="off"  @if(!empty($editbanner)) @else required @endif>
@if(!empty($editbanner))
  <img src="{{asset($editbanner->banner_image)}}" alt="" style="width:20px;height:20px;">
  @endif

              </div>

                <div class="form-group">
                Active Main Image
                <input type="checkbox" class="" id="" name="active_image" @if(!empty($editbanner)){{$editbanner->active_image==1?'checked':''}} @endif value="1">

                 </div>
            </div>
            <button type="submit" class="pl-3 pr-3">   @if(!empty($editbanner))Update @else Save @endif </button>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
