var segmentTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin + '/detailexplore/' + segmentTerakhir + '/getdatadetail',
    type: "GET",
    dataType: "JSON",
    success: function (res) {
        console.log(res)
        $('#fotodetail').prop('src', '/foto/' + res.dataDetailFoto.lokasi_foto)
        $('#profile').prop('src', '/profile/' + res.dataDetailFoto.user.foto_profile)
        $('#username').html(res.dataDetailFoto.user.username)
        $('#tanggal').html(res.dataDetailFoto.user.created_at)
        $('#deskripsi').html(res.dataDetailFoto.deskripsi)
        var likeCount = res.dataDetailFoto.like.length;

        // Retrieving the count of comments
        var commentCount = res.dataDetailFoto.komentar.length;

        // Displaying the counts
        $('#like').html(likeCount);
        $('#komen').html(commentCount);
        ambilKomentar()

    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('gagal coy')
    }
})
function ambilKomentar() {
    $.getJSON(window.location.origin + '/detailexplore/getComment/' + segmentTerakhir, function (res) {
        // console.log(res)
        if (res.data.length === 0) {
            $('#listkomentar').html('<div>komentar masih kosong</div>')
        } else {
            comment = []
            res.data.map((x) => {
                let datacomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: x.created_at,
                    isikomentar: x.isi_komentar,
                    fotopengirim: x.user.foto_profile
                }
                comment.push(datacomentar);
            })
            tampilkankomentar()
        }
    })
}

const tampilkankomentar = () => {
    $('#listkomentar').html('')
    comment.map((x, i) => {
        $('#listkomentar').append(`       <div class="flex flex-row mt-5">
        <div class="w-20">
             <img src="/profile/${x.fotopengirim}" class="w-12 h-12 rounded-full" alt="">
        </div>
        <div class="flex flex-col mr-2 ml-5">
             <span class="text-black">${x.pengirim}</span>
             <span class="mr-1">${x.isikomentar}</span>
             <span class="text-gray-500 mt-1 text-sm">1h</span>
        </div>
   </div>`)
    })
}



function kirimkomentar() {
    $.ajax({
        url: window.location.origin + '/detailexplore/kirimkomentar',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="isi_komentar"]').val()
        },
        success: function (res) {
            $('input[name="isi_komentar"]').val('')
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal mengirim komentar')
        }
    })
}

setInterval(ambilKomentar, 500);
