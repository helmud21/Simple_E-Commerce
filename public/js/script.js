// function loadMoreData(page)
//     {
//         $.ajax({
//             url:'http://127.0.0.1:8000/?page=' + page,
//             type:'get',
//             beforeSend: function()
//             {
//                 $(".load-data").show();
//             }
//         })
//             .done(function(data){
//                 if(data.html == ""){
//                     $('.load-data').html("No more Posts Found!");
//                     return;
//                 }
//                 $('.load-data').hide();
//                 $("#product-list").append(data.html);
//             })
//             // Call back function
//             .fail(function(jqXHR,ajaxOptions,thrownError){
//                 console.log("Server not responding.....");
//             });

//     }

//function for Scroll Event
// var page =1;
// $(window).scroll(function(){
//     let val = $(window).scrollTop() + $(window).height();
//     let rnd = Math.round(val);

//     if(rnd >= $(document).height()){
//         page++;
//         loadMoreData(page);
//     }
// });

$(function () {

    // $('body').on('click', '.pagination a', function(e){
    //     e.preventDefault();

    //     var url = $(this).attr('href');
    //     getBarangs(url);
    //     getItems(url);
    //     window.history.pushState("", "", url);
    // });

    $('#category').select2({
        placeholder: "Pilih Kategori",
        dropdownParent: $('#exampleModal'),
        ajax: {
            url: '/select/kategori',
            type: "POST",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: function (params) {
                return {
                    // _token: '{{ csrf_token() }}',
                    search: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: false
        }
    });

    var select = $('#category');
    $(".btnEdit").click(function () {
        $("#exampleModalLabel").html("Edit Data Barang")

        var id = $(this).data('id');
        var url = '/edit/barang/';
        // console.log(id);

        $.ajax({
            url: url + id,
            type: 'get',
            dataType: 'JSON',
            data: { id: id },
            success: function (data) {
                console.log(data);
                // var harga = separateComma(data.harga);
                // harga = harga.toLocaleString('en-US');
                CKEDITOR.instances['detail'].setData(data.detail);
                $('#barang_name').val(data.barang_name);
                $('#hargaBarang').val(data.harga);
                $('#id_barang').val(data.id_barang);
                var option = new Option(data.category_name, data.id_category, true, true);
                select.append(option).trigger('change');

                // manually trigger the `select2:select` event
                select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
                $('#detail').val(data.detail);
                $('#exampleModal').modal('show');
            }
        });
    });


    $("#tambahBarang").click(function () {
        $("#exampleModalLabel").html("Tambah Data Barang")
        $('#barang_name').val('');
        $('#hargaBarang').val('');
        $('#id_barang').val('');
        $('#category').val(null).trigger('change');
        CKEDITOR.instances['detail'].setData('');
    });

    $('.btnDelete').click(function () {
        var id = $(this).data('id');
        // console.log(id);
        var url = '/hapus/barang/';

        $.ajax({
            url: url + id,
            type: 'get',
            data: { id: id },
            success: function () {
                location.reload();
                $.session.set("success", "Data berhasil dihapus");
            }
        });
    });

    var jlhBarang = $('.jlhBarang').val();
    $('.btnTambah').click(function () {
        jlhBarang++;
        $('.jlhBarang').val(jlhBarang);
    });


    $('.btnKurang').click(function () {
        if (jlhBarang > 1) {
            jlhBarang--;
            $('.jlhBarang').val(jlhBarang);

        } else {
            jlhBarang = 1;
        }
    });

    $('.btnBeli').click(function () {
        var id = $(this).data('id');
        var url = '/beli/barang/';
        var parsJlhBarang = parseInt(jlhBarang);
        var harga;
        var totalPembayaran;

        $.ajax({
            url: url + id,
            type: 'get',
            dataType: 'JSON',
            data: { id: id },
            success: function (data) {
                console.log(data);
                harga = parseInt(data.barang.harga);
                totalPembayaran = parsJlhBarang * harga;
                totalPembayaran = new Intl.NumberFormat('en-US').format(totalPembayaran);
                $('.idBarangBeli').val(data.barang.id_barang);
                $('.nameTokoBeli').val(data.toko.name);
                $('.nameBarangBeli').val(data.barang.barang_name);
                $('.hargaBeli').val('Rp ' + new Intl.NumberFormat('en-US').format(data.barang.harga));
                $('.jlhBeli').val(jlhBarang + ' Pcs');
                // $('.categoryBeli').val(data.barang.category.category_name);
                $('.categoryBeli').val(data.barang.category_name);
                $('.totalPembayaran').val('Rp ' + totalPembayaran);
                $('#modalPembayaran').modal('show');
            }
        });
    });
    // Keyframes animation menggunakan script jQuery.iFrames
    var countImages = $('#countImages').val();
    $('#sliderTrack').css("width", "cal(100px * " + countImages + ")");
    var divCountImages = countImages / 2;
    // console.log(divCountImages);

    // var shake_start = {'transform': 'translate(0px)'};
    // var shake_end = {'transform': 'translate(calc(-100px *'+ countImages +'))'};

    // $.keyframe.define([
    //     {
    //         name:'scroll', 
    //         '0%': shake_start,
    //         '100%': shake_end
    //     }
    // ])

    // $('#sliderTrack').playKeyframe(
    // {
    //     name: 'scroll',
    //     duration: "30s",
    //     timingFuntion: 'linear',
    //     iterationCount: 'infinite',
    //     direction: 'normal',
    //     fillMode: 'forwards',
    // },

    // );
});

