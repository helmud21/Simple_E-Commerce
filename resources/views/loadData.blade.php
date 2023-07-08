


@foreach ($barangs as $barang)
    <div class="card mb-4" id="card-barang" style="width: 16rem;">
    @php $img = explode('|', $barang->image); @endphp
        <img src="{{ asset('images/'.$img[0]) }}" class="card-img-top mt-3" alt="..." style="width: 140px; height: 140px; align-self: center;">
        <div class="card-body">
            <p>{{ $barang->barang_name }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h6>RP {{ number_format($barang->harga) }}</h6>
            </li>
            <li class="list-group-item">{{ $barang->provinsi_name }}</li>
        </ul>
        <div class="card-body d-flex flex-row-reverse">
            <a href="/detail/{{ $barang->id_barang }}/barang" class="card-link" id="detail-btn">Detail</a>
        </div>
    </div>
@endforeach

