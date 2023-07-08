@extends('layouting.master')

@section('content')

<!-- <head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
</head> -->
@include('layouting.search')

<div class="container" id="load-data">
    <div id="homeCategoryWrapper">
        <form action="/home/kategori" method="GET">
            <select name="categoryHome" id="categoryHome" onchange="this.form.submit()">
                <option value="" disabled selected> Pilih Kategori </option>
                @foreach ($short_kategori as $kategori)
                <option value="{{ $kategori->id_category }}"  > {{ $kategori->category_name }} </option>
                @endforeach
            </select>
        </form>
    </div>

    <div id="list-barang">
        @include('loadData')
    </div>
    
    
</div>

@endsection
<!-- <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/jquery.doubleScroll.js') }}"></script>
<script src="{{ asset('js/dragscroll.js') }}"></script>

<script>
    $(document).ready(function() {

        var x_table = $('#tabelProduct').dataTable({
            autoWidth: false,
            columnDefs: [{
                targets: 0,
                className: 'show',
            }],
            ordering: false,
            dom: '<"bottom"f>rt<"bottom"p><"clear">',
            destroy: true,
            filters: false,
            info: false,
            lengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{route('get.barang')}}",
                "type": "POST",
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            },
            columns: [{
                data: 'show',
                name: 'show',
                orderable: false,
                searchable: false,
            }]
        });
    });
</script> -->