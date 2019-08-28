@extends('admin.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <h4>Custom Footer Site List</h4>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>

                        <th>Facebook Link</th>
                        <th>Youtube Link</th>
                        <th>Twitter Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>



                            <tr>

                                <td>{{ $footer->facebook_link }}</td>
                                <td>{{ $footer->youtube_link }}</td>
                                <td>{{ $footer->twitter_link }}</td>

                                <td>
                                    <a href="{{url('edit-customsite/'.$footer->id)}}" class="">Edit</a>

                                </td>
                            </tr>




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
