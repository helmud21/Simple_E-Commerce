<div class="container" id="search-container">
    <div class="row">
        <div class="col-6">
            <form action="/cari/barang" method="POST" id="search-form">
                @csrf
                <input type="text" id="search" name="search" placeholder="Search here ...">
                <button type="submit" class="btnCari" type="submit" id="search-btn">Cari</button>
            </form>
        </div>
    </div>
</div>