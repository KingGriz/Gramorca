@extends('pages.user', ['title' => 'profile'])
@section('contentUser')
     <!-- konten -->
  <div class="pt-[70px] pl-[20px] flex flex-row sm:pl-[277px]">
    <img src="" alt="" class="w-14 h-14 rounded-full" id="profile">
    <div class="ml-2 flex flex-col">
      <span class="font-itali text-2xl mt-1" id="username">username</span>
      <span class="text-xs" id="nama_lengkap">nama lengkap</span>
    </div>
  </div>
  <div class="pl-[20px] mt-1 sm:pl-[277px]">
    <span class="text-xs" id="bio">bio</span>
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
      <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:pl-[260px] sm:pl-[260px]" id="indexdata">

        <div class="flex flex-col gap-4">
          <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/BHC.jpg') }}">
          <div class="flex justify-start">
            <p>deskripsi</p>
          </div>
        </div>

      </div>
    </div>
    <!-- Album -->
    <div class="hidden p-4 rounded-lg mb-14" id="album" role="tabpanel" aria-labelledby="album-tab">
      <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-4 lg:grid-cols-6 gap-3 md:pl-[260px] sm:pl-[260px]">

        <div class="flex flex-col gap-4">

            <img class="h-auto max-w-full rounded-lg" src="/assets/folder.jpg" alt="">
            <div class="flex justify-start">
              <p>album</p>
            </div>
        </a>
          </div>

      </div>
    </div>
  </div>
  <!-- End Tabs Menu -->
  <!-- end konten -->





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
  <script src="/js/profile.js"></script>
@endsection
