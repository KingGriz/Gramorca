@extends('pages.user', ['title' => 'profile'])
@section('contentUser')
     <!-- konten -->
  <div class="pt-[70px] pl-[20px] flex flex-row sm:pl-[277px]">
    <img src="/profile/{{ Auth::user()->foto_profile }}" alt="" class="w-14 h-14 rounded-full">
    <div class="ml-2 flex flex-col">
      <span class="font-itali text-2xl mt-1">{{ Auth::user()->username }}</span>
      <span class="text-xs">{{ Auth::user()->nama_lengkap }}</span>
    </div>
  </div>
  <div class="pl-[20px] mt-1 sm:pl-[277px]">
    <span class="text-xs">{{ Auth::user()->bio }}</span>
  </div>
  <div class="flex ml-[20px] mt-4 sm:pl-[250px]">
    <button data-modal-target="edit_profile" data-modal-toggle="edit_profile"
      class="bg-white border border-gray-300 focus:outline-none font-medium rounded-lg text-xs px-3 py-1 me-1 mb-2"
      type="button">
      Edit Profile
    </button>
    <button data-modal-target="edit_password" data-modal-toggle="edit_password"
      class="bg-white border border-gray-300 focus:outline-none font-medium rounded-lg text-xs px-3 py-1 me-2 mb-2"
      type="button">
      Edit Password
    </button>
  </div>



  <!-- Tabs Menu -->
  <div class="mb-4 border-b border-gray-200 dark:border-gray-700 mx-4 -sm:pl-[40px]">
    <ul
      class="flex flex-wrap -mb-px text-sm font-medium text-center justify-between lg:justify-normal md:justify-normal sm:pl-[260px] sm:justify-normal"
      id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
      <li class="" role="presentation">
        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="unggahan-tab" data-tabs-target="#unggahan"
          type="button" role="tab" aria-controls="unggahan" aria-selected="false">Unggahan</button>
      </li>
      <li class="" role="presentation">
        <button
          class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
          id="album-tab" data-tabs-target="#album" type="button" role="tab" aria-controls="album"
          aria-selected="false">Album</button>
      </li>

    </ul>
  </div>

  <div id="default-tab-content">
    <!-- unggahan -->
    <div class="hidden p-4 rounded-lg bg-gray-50 mb-14" id="unggahan" role="tabpanel" aria-labelledby="unggahan-tab">
      <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:pl-[260px] sm:pl-[260px]" id="indexdata
      indexdata">
      @foreach ($tampilUpload as $foto)
        <div class="flex flex-col gap-4">
          <img class="h-auto max-w-full rounded-lg" src="/foto/{{ $foto->lokasi_foto }}">
          <div class="flex justify-start">
            <p>{{ $foto->deskripsi }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- Album -->
    <div class="hidden p-4 rounded-lg mb-14" id="album" role="tabpanel" aria-labelledby="album-tab">
      <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-4 lg:grid-cols-6 gap-3 md:pl-[260px] sm:pl-[260px]">
        @foreach ($tampilAlbum as $album)
        <div class="flex flex-col gap-4">
            <a href="{{ route('album.show', $album->id) }}">
            <img class="h-auto max-w-full rounded-lg" src="/assets/folder.jpg" alt="">
            <div class="flex justify-start">
              <p>{{ $album->nama_album }}</p>
            </div>
        </a>
          </div>
          @endforeach
      </div>
    </div>
  </div>
  <!-- End Tabs Menu -->
  <!-- end konten -->


  <!-- Edit Profile Modal -->
  <div id="edit_profile" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div class="flex md:p-5 dark:border-gray-600">
          <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 inline-flex "
            data-modal-toggle="edit_profile">
            <ion-icon name="arrow-back-outline" class="text-xl pl-4 pt-3"></ion-icon>
          </button>

          <h3 class="text-3xl font-medium pt-6 mx-auto font-itali">
            Ubah Profile Anda
          </h3>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5"  action="/changeprofile" method="post" enctype="multipart/form-data">
            @csrf
          <div class="grid gap-4 mb-4 grid-cols-2 mx-auto">

            <div class="flex items-center justify-center w-full">
              <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-28 h-28 border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50">
                <div class="flex flex-col items-center justify-center pt-3 pb-3">
                  <ion-icon name="cloud-upload-outline" class="text-4xl mb-1 text-gray-500"></ion-icon>
                  <span class="text-xs">select foto</span>
                </div>
                <input id="dropzone-file" name="profile" type="file" class="hidden" />
              </label>
            </div>

            <div class="col-span-2">
              <label for="nama_lengkap" class="block mb-1 text-xs font-medium text-black">Nama lengkap</label>
              <input type="text" name="nama_lengkap" id="nama_lengkap"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg block w-full p-1.5 "
                placeholder="Nama lengkap anda" required="">
            </div>
            <div class="col-span-2">
              <label for="nomer_telepon" class="block mb-1 text-xs font-medium text-black">Nomer telepon</label>
              <input type="number" name="nomer_telepon" id="no_telepon"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg block w-full p-1.5 "
                placeholder="Nomer telepon anda" required="">
            </div>
            <div class="col-span-2">
              <label for="alamat" class="block mb-1 text-xs font-medium text-black">Alamat</label>
              <input are type="text" name="alamat" id="alamat"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg block w-full p-1.5 "
                placeholder="Alamat anda" required="">
            </div>
            <div class="col-span-2">
              <label for="bio" class="block mb-1 text-xs font-medium text-black">Bio</label>
              <input are type="text" name="bio" id="bio"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg block w-full p-1.5 "
                placeholder="Masukan bio profile anda" required="">
            </div>
          </div>
          <button type="submit"
            class="text-gray-900 bg-white border border-gray-300 rounded-md font-medium text-xs px-5 py-1.5">
            <span class="text-xs text-black">Perbarui</span>
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Password Modal -->
  <div id="edit_password" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full">

      <div class="relative bg-white rounded-lg shadow">

        <div class="flex md:p-5 dark:border-gray-600">
          <button type="button" class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 inline-flex "
            data-modal-toggle="edit_password">
            <ion-icon name="arrow-back-outline" class="text-xl pl-4 pt-3"></ion-icon>
          </button>
          <h3 class="text-3xl font-medium pt-6 mx-auto font-itali">
            Ubah Password Anda
          </h3>
        </div>

        <form action="{{ route('up_password') }}" method="post">
            @csrf
          <div class="p-4 md:p-5 space-y-2 ">
            <div class="col-span-2">
              <label for="old_password" class="block mb-1 text-xs font-medium">Password lama</label>
              <input type="password" name="current_password" id="old_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4 placeholder:text-xs"
                placeholder="Password lama Anda" required="">
            </div>
            <div class="col-span-2">
              <label for="new_password" class="block mb-1 text-xs font-medium">Password baru</label>
              <input type="password" name="new_password" id="new_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full  p-2.5 mb-4 placeholder:text-xs"
                placeholder="Password baru Anda" required="">
            </div>
            <div class="col-span-2">
              <label for="confirm_password" class="block mb-1 text-xs font-medium">Konfirmasi password</label>
              <input type="password" name="new_password_confirmation" id="confirm_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4 placeholder:text-xs"
                placeholder="Konfirmasi Password Anda" required="">
            </div>
            <div>
              <button type="submit"
                class="text-black inline-flex items-center bg-white border font-medium rounded-lg text-sm px-5 py-2.5 text-center placeholder:text-xs">
                <ion-icon name="add-outline"></ion-icon>
                <span>Perbarui</span>
              </button>
            </div>
          </div>
          <div class="p-2"></div>
        </form>
      </div>
    </div>
  </div>



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
  <script src="js/profile.js"></script>
@endsection
