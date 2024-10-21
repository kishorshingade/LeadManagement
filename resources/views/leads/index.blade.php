@extends('layouts/dashboard-layout')
@section('main-section')
<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Leads</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Forms</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Form</a>
            </li>
        </ul>
    </div>
    <div class="mx-xxl-3 px-4 px-sm-5 pb-5 mb-3 flex-grow-1 d-flex flex-column ">
        <table id="LeadsTable" class="table table-striped dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Requirement</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by DataTables -->
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('addJs')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#LeadsTable').DataTable({
            dom: "lBfrtip",
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-sm mx-3 btn-primary ',
                    id: "download_to_excel",
                    exportOptions: {
                        columns: ':not(#actionColumn)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-sm mx-3 btn-primary ',
                    id: 'download_to_pdf',
                    exportOptions: {
                        columns: ':not(#actionColumn)'
                    }
                }
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getLeadsTableData') }}",
                data: function(d) {
                    d.search = $('input[type="search"]').addClass('form-control').val();

                    return d;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'name'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'requirement'
                },
                {
                    data: 'date',
                    render: function(data, type, row) {
                        return new Date(row.date).toISOString()
                            .split('T')[0];
                    }
                },
                {
                    data: 'status',
                },
                {
                    data: 'created_at',
                    render: function(data, type, row) {
                        return new Date(row.created_at).toISOString()
                            .split('T')[0];
                    }
                },
                {
                    data: 'actions'
                },
            ]
        });

        $('input[type="search"]').on('keyup', function() {
            dataTable.ajax.reload();
        });
    });
</script>
@endsection