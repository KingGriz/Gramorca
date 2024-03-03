@extends('pages.user',['title' => 'upload'])

@section('contentUser')
    <!-- konten -->
<form action="/save" method="post" enctype="multipart/form-data">
    @csrf
  <div class="container px-5 pt-20 sm:pl-[320px] lg:pl-[350px] mb-24 lg:flex lg:flex-row">
    <div class="flex items-center justify-center w-full lg:w-[400px]">
      <label for="dropzone-file"
        class="flex flex-col items-center justify-center w-full h-44 lg:h-[300px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
          <ion-icon name="cloud-upload-outline" class="text-4xl w-8 h-8 mb-4 text-gray-500"></ion-icon>
          <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click untuk memilih foto
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
        </div>
        <input id="dropzone-file" name="fileFoto" type="file" class="hidden" />
      </label>
    </div>
    <div class="pt-4 lg:pl-10 lg:w-full">
      <!-- judul -->
      <span class="text-sm mt-5 mb-1">Judul</span>
      <input type="text" id="judul" name="judul_foto"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2"
        placeholder="Masukan Judul Foto" required />
      <!-- deskripsi -->
      <span class="text-sm mt-5 mb-1">Deskripsi</span>
      <input type="text" id="deskripsi" rows="4" name="deskripsi"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 mb-2"
        placeholder="Masukan caption foto"></input>


      <!-- album -->
      <span class="text-sm mt-5 mb-1">Album</span>

      <div class="flex flex-row">
        <select id="album"  name="nama_album"
          class="block w-full p-2.5 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
          <option selected class="text-black hidden">Pilih album</option>
          @foreach ($album as $item)
          <option value="{{ $item->id }}">{{ $item->nama_album }}</option>
      @endforeach
        </select>
        <div class="w-4 mb-3"></div>
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
          class="text-gray-900 bg-white border border-gray-300 rounded-md text-sm px-5 h-10 block p-2.5"><ion-icon
            name="add-outline"></ion-icon></button>
      </div>
      <button type="submit"
        class="text-gray-900 bg-white border border-gray-300 rounded-md text-sm px-3 h-10 p-2.5 flex">
        <ion-icon name="cloud-upload-outline" class="text-xl"></ion-icon>
        <span class="top-2 ml-2">Post</span>
      </button>
    </div>
  </div>
  <!-- end konten -->
</form>

  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex md:p-5 dark:border-gray-600">
          <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 inline-flex "
            data-modal-toggle="default-modal">
            <ion-icon name="arrow-back-outline" class="text-xl pl-4 pt-3"></ion-icon>
          </button>
          <h3 class="text-4xl font-medium pt-6 mx-auto font-itali">
            Tambah Album
          </h3>
        </div>
        <!-- Modal body -->
        <form action="{{ route('album') }}" method="post">
            @csrf
          <div class="p-4 md:p-5 space-y-2 ">
            <div class="col-span-2">
              <label for="nama_album" class="block mb-1 text-sm font-medium">Nama Album</label>
              <input type="text" name="nama_album" id="nama_album"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4"
                placeholder="Maukan Nama Album" required="">
            </div>
            <div>
              <button type="submit"
                class="text-black inline-flex items-center bg-white border font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <ion-icon name="add-outline"></ion-icon>
                <span>Tambah</span>
              </button>
            </div>
            <div class="p-2"></div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ENd Album -->



  <!-- bottom nav -->
  <div class="fixed bottom-0 right-0 left-0 bg-white p-2 lg:hidden sm:hidden">
    <ul class="flex justify-between ml-8 mr-8">
      <li>
        <a href="/src/pages/beranda.html">
          <ion-icon name="home-outline" class="text-2xl"></ion-icon>
        </a>
      </li>
      <li>
        <a href="/src/pages/upload_foto.html">
          <ion-icon name="add-circle-outline" class="text-2xl"></ion-icon>
        </a>
      </li>
      <li>
        <a href="/src/pages/profile.html">
          <ion-icon name="person-outline" class="text-2xl"></ion-icon>
        </a>
      </li>
    </ul>
  </div>

  <!-- end -->
@endsection
