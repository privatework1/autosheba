@extends('b2b.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12 mt-3">
            <h4>B2B Invoice List</h4>
            <hr/>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Invoice Code</th>
                        <th>Invoice Date</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=1; ?>
                    @if(count($b2bpoinvoicess)>0)
                        @foreach($b2bpoinvoicess as $b2bpoinvoice)
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $b2bpoinvoice->poinvoice_code; ?></td>
                                <td><?php echo $b2bpoinvoice->poinvoice_date; ?></td>
                                <td><?php echo $b2bpoinvoice->total_purchase; ?></td>

                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{url('/b2b-site-single-invoice/'.base64_encode($b2bpoinvoice->id))}}"><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button></a>&nbsp;

                                    </div>
                                </td>
                            </tr>
                            <?php $sl++; ?>
                        @endforeach
                    @else
                        <tr>
                            <td>No Data Found.</td>
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
