<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" id="search-form" class="form-inline" role="form">

                        <div class="form-group col-md-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="search name">
                        </div>
                        <div class="form-group  col-md-3">
                            <label>From:</label>
                            <input type="text" name="from" class="form-control datepicker">
                        </div>
                        <div class="form-group  col-md-3">
                            <label>To:</label>
                            <input type="text" name="to" class="form-control datepicker">
                        </div>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <table id="users-table" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Code</th>
                                <th>State</th>
                                <th>Date / Time</th>                                
                                <th>Comment</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });

        var oTable = $('#users-table').DataTable({

            serverSide: true,
            processing: true,
            ajax: {url: '/array-data',
                data: function (d) {
                    d.name = $('input[name=name]').val();
                    d.from = $('input[name=from]').val();
                    d.to = $('input[name=to]').val();
                }
            },
            columns: [
                {data: 'name'},
                {data: 'email'},
                {data: 'code'},
                {data: 'state'},
                {data: 'created_at'},
                {data: 'comment', orderable: true, searchable: true}
            ]
        });
        $('#search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    }
    );
</script>