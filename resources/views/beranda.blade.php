@extends('pages.user',['title' => 'beranda'])
@section('contentUser')
<!-- konten -->
<div class="container mb-10" id="exploredata">

    {{-- <div>
        <div class="pl-5">
          <div class="p-2"></div>
          <div class="pt-14 flex sm:pl-[280px] lg:pl-[395px] sm:pt-6">
            <img src="/assets/1.png" class="container h-9 w-9 rounded-full" alt="">
            <span class="text-black text-sm ml-[10px] mt-2">Username</span>
          </div>
        </div>
        <!-- end profile --> 
        <!-- icon love comment -->
        <div class="pt-3 right-0 left-0 flex flex-col">
          <img src="/assets/1.png" alt="" class="sm:pl-[300px] lg:pl-[415px] lg:pr-[300px]">
          <div class="flex flex-row pl-2 pt-2 sm:pl-[300px] lg:pl-[410px] md:pl-[297px]">
            <ion-icon name="heart-outline" class="text-2xl"></ion-icon>
            <a href="/src/pages/komen.html"><button type="button">
                <ion-icon name="chatbubble-outline" class="text-2xl ml-2"></ion-icon>
              </button></a>

            <!-- <button data-modal-target="komen" data-modal-toggle="komen" type="button">
              <ion-icon name="chatbubble-outline" class="text-2xl ml-2"></ion-icon>
            </button> -->
          </div>
        </div>
        <!-- deskripsi -->
        <div class="flex flex-row pt-1">
          <span class="text-xs font-semibold pl-3 sm:pl-[300px] lg:pl-[414px] md:pl-[300px]">Username</span>
          <span class="text-xs lg:pl-[4px] ml-1.5">Lorem, ipsum dolor sit amet consectetur.</span>
        </div>
        <hr class="bg-gray-700 w-full mt-[25px]">
      </div>
  </div> --}}
<script src="/js/explore.js"></script>
@endsection
