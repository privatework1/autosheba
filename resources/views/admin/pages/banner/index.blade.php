@extends('admin.layouts.app')
@section('content')

  <div class="container-fluid">
    <div class="col-md-12 mt-3">
      <h4>Banner List</h4>
      <hr/>
      <div class="table-responsive">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>SL.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Main Image</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php $sl=1; ?>
          @if(count($banners)>0)
            @foreach($banners as $banner)
              <tr>
                <td><?php echo $sl; ?></td>
                <td>{{ $banner->title }}</td>

                <td><img src="{{asset($banner->banner_image)}}" alt="" style="width:100px;height: 100px;"></td>
                <td>{{$banner->active_image==1?'Main Image':''}}</td>
                <td>
                  <a href="{{url('edit-banner/'.$banner->id)}}" class="">Edit</a>
                  <a href="{{url('delete-banner/'.$banner->id)}}" class="">Delete</a>
                </td>
              </tr>
              <?php $sl++; ?>
            @endforeach
          @else
            <tr>
              <td>No Image Found.</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $("#dataTable").DataTable();
  </script>
@endsection
