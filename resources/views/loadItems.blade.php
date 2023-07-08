
@foreach ($barangs as $barang)
<tr>
    <td width="1%">{{ $loop->iteration }}</td>
    <td>{{$barang->barang_name}}</td>
    <td style="text-align: center;">{{number_format($barang->harga)}}</td>
    <td style="text-align: center;">{{$barang->category_name}}</td>
    <td>
        <a class="btn btn-success btnEdit" data-id="{{ $barang->id_barang }}">Ubah</a>
        <a class="btn btn-danger btnDelete" data-id="{{ $barang->id_barang }}">Hapus</a>
    </td>
</tr>
@endforeach


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Modal title</h5>
            </div>
            <div class="modal-body">
                <form action="/post/barang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="id_barang" name="id_barang" hidden>
                    <div class="mb-3">
                        <label for="barang_name" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('barang_name') is-invalid @enderror" id="barang_name" required title="nama wajib di input" name="barang_name" value="">
                        @error('barang_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang ( <b>Rp</b> )</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="hargaBarang" name="harga" value="">
                        @error('hargaBarang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select name="category" class="form-select " id="category"></select>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Gambar Barang</label>
                        <input type="file" multiple class="form-control @error('photo') is-invalid @enderror" id="images" name="images[]">
                        @error('barang_images')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail Barang</label>
                        <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
                        <script>
                            CKEDITOR.replace('detail');
                        </script>
                        @error('detail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>