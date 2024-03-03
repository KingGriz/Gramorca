
var paginate = 1;
var dataIndex = [];
loadMoreData(paginate);

// // Event delegation for report buttons
// $('#indexdata').on('click', '[data-modal-toggle="default-modal"]', function () {
//     var index = $(this).index('[data-modal-toggle="default-modal"]');
//     $(`#default-modal:eq(${index})`).toggleClass('hidden');
// });

// // Event delegation for modal close and accept buttons
// $('#indexdata').on('click', '[data-modal-hide="default-modal"]', function () {
//     var index = $(this).index('[data-modal-hide="default-modal"]');

//     if ($(this).data('modal-accept')) {
//         // Perform action when "I accept" button is clicked
//         // You can add your logic here
//         // ...
//     }

//     // Hide the modal
//     $(`#default-modal:eq(${index})`).addClass('hidden');
// });

// Event delegation for report buttons
$('#indexdata').on('click', '[data-modal-toggle="default-modal"]', function () {
    var index = $(this).index('[data-modal-toggle="default-modal"]');
    $('.default-modal').eq(index).toggleClass('hidden');
});

// Event delegation for modal close and accept buttons
$('#indexdata').on('click', '[data-modal-hide="default-modal"]', function () {
    var index = $(this).index('[data-modal-hide="default-modal"]');
    var modal = $('.default-modal').eq(index);

    if ($(this).data('modal-accept')) {
        // Perform action when "I accept" button is clicked
        // You can add your logic here
        // ...
    }

    // Hide the modal
    modal.addClass('hidden');
});


$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    $.ajax({
        url: window.location.origin + '/getDataIndex' + '?page=' + paginate,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e);

            e.data.data.map((x) => {
                var hasilPencarian = x.like.filter(function (hasil) {
                    return hasil.user_id === e.userId;
                });

                var userLike = hasilPencarian.length > 0 ? hasilPencarian[0].user_id : 0;

                let datanya = {
                    id: x.id,
                    users_id: x.users_id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi,
                    foto: x.lokasi_foto,
                    tanggal: x.created_at,
                    jml_comment: x.comment_count,
                    jml_like: x.like_count,
                    username: x.user.username,
                    profile: x.user.foto_profile,
                    idUserLike: userLike,
                    useractive: e.userId,
                };

                dataIndex.push(datanya);
            });

            getIndex(e);
            // updateFollowButton(e.dataFollow, e.dataDetailFoto);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle error
        },
    });
}

const getIndex = () => {
    $('#exploredata').html('');
    dataIndex.map((x, i) => {
        // Ganti URL gambar dengan x.foto
        let imageUrl = `/profile/${x.foto}`;

        $('#exploredata').append(`
        <!-- profile -->
        <div>
            <div class="pl-5">
                <div class="p-2"></div>
                <a href="/profil_publik/${x.users_id}">
                <div class="pt-14 flex sm:pl-[280px] lg:pl-[395px] sm:pt-6">

                    <img src="/profile/${x.profile}" class="container h-9 w-9 rounded-full" alt="">
                    <span class="text-black text-sm ml-[10px] mt-2">${x.username}</span>
                </div>
                </a>
            </div>
            <!-- end profile -->
            <!-- icon love comment -->
            <div class="pt-3 right-0 left-0 flex flex-col">
                <img src="/foto/${x.foto} " alt="" class="sm:pl-[300px] lg:pl-[415px] lg:pr-[300px]">
                <div class="flex flex-row pl-2 pt-2 sm:pl-[300px] lg:pl-[410px] md:pl-[297px]">
                <div>${x.jml_like} </div>
                <button onclick="like(this,${x.id})" >
                <i class="${x.idUserLike === x.useractive ? 'fa-solid fa-thumbs-up text-blue-800' : 'fa-regular fa-thumbs-up'} fa-regular fa-thumbs-up mr-2"></i>   <ion-icon name="heart-outline" class="text-2xl"></ion-icon>
            </button>

                    <a href="/detailexplore/${x.id}"><button type="button">
                            <ion-icon name="chatbubble-outline" class="text-2xl ml-2"></ion-icon>
                        </button></a>

                    <!-- <button data-modal-target="komen" data-modal-toggle="komen" type="button">
                        <ion-icon name="chatbubble-outline" class="text-2xl ml-2"></ion-icon>
                      </button> -->
                </div>
            </div>
            <!-- deskripsi -->
            <div class="flex flex-row pt-1">
                <span class="text-xs font-semibold pl-3 sm:pl-[300px] lg:pl-[414px] md:pl-[300px]">${x.username}</span>
                <span class="text-xs lg:pl-[4px] ml-1.5">${x.deskripsi}</span>
            </div>
            <hr class="bg-gray-700 w-full mt-[25px]">
        </div>
        <!-- end -->
      `);
    });
}

function like(txt, id) {
    $.ajax({
        url: window.location.origin + '/like',
        dataType: "JSON",
        type: "POST",
        data: {
            fotoid: id,
            _token: $('input[name="_token"]').val(),
        },
        success: function (res) {
            console.log(res);
            // Tambahkan perintah untuk memuat ulang halaman setelah sukses like
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal');
        }
    });
}

function ikuti(txt, idfollow) {
    $.ajax({
        url: window.location.origin + '/comment/ikuti',
        type: "POST",
        dataType: "JSON",
        data: {
            idfollow: idfollow,
            _token: $('input[name="_token"]').val(),
        },
        success: function (res) {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal');
        }
    });
}
