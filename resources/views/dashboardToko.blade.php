@extends('layouting.master')

@section('content')
<!-- <head>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">

</head> -->
<div class="container" id="wrapper-dashboard-toko">
    <div class="row mt-3">
        <div class="col">
            <h1>Halaman Dashboard Toko</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-body mt-2">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" id="tambahBarang">Tambah Data</button>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Barang</th>
                            <th>Harga (Rp)</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="bodi">
                        @include('loadItems')
                    </tbody>
                </table>
                {{ $barangs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Gunakan jika ingin menampilkan data menggunakan datatabel -->
<!-- Letakkan ke dalam tag section -->
<!-- <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/jquery.doubleScroll.js') }}"></script> 
<script src="{{ asset('js/dragscroll.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function(){
        
        var x_table = $('#myTable').dataTable({
            dom: '<"pull-left"f>rt<"bottom"p><"clear">',
            autoWidth: false,
            destroy: true,
            filters: false,
            info: false,
            lengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                "url":"{{route('post.barang')}}",
                "type": "POST",
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            },
            columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'barang_name'},
                    {data: 'harga'},
                    {data: 'category.category_name'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i> Export ke Excel',
                messageTop:'Data Barang '+new Date().toLocaleDateString('id'),
                autoFilter: true,
                className:"btn btn-sm btn-success",
                sheetName: 'barang',
                filename: 'Data Barang',
                action : newexportaction
            }], stateSave: true,
        });

        function newexportaction(e, dt, button, config) { //export excel server side
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function (e, s, data) {
                data.start = 0;
                data.length = -1;
                //data.search['value']=''; //kalo mau export all data
                dt.one('preDraw', function (e, settings) {
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function (e, s, data) {
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    setTimeout(dt.ajax.reload, 0);
                    return false;
                });
            });
            dt.ajax.reload();
        };
    });
</script> -->