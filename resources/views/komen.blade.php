<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet" />
     <!-- End Fonts -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- <style>
      * {
        border: 1px solid black;
      }
    </style> -->
</head>

<body class="bg-slate-50">


     <div class="fixed bottom-0 w-full lg:pl-[750px] lg:pr-7 pr-4">

            @csrf

               <hr class="bg-gray-700">
               <div class="flex items-center py-2 bg-white">
                    <input id="" rows="1" name="isi_komentar"
                         class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-50  dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                         placeholder="Ketik komentar..."></input>
                    <button onclick="kirimkomentar()"
                         class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">

                         <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                              <path
                                   d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                         </svg>
                         <span class="sr-only">Send message</span>
                    </button>
               </div>

          <div class="p-5 lg:p-0"></div>
     </div>



     <div class="px-5 pt-3 flex flex-col lg:flex lg:px-10">
          <div class="lg:fixed lg:mt-3 lg:flex">
               <a href="/beranda"><ion-icon name="arrow-back-outline"
                         class="text-transparent lg:text-2xl lg:text-black lg:mr-10"></ion-icon></a>
               <img src="/assets/1.png" alt="" class="w-[400px] h-auto" id="fotodetail">
          </div>
          <div class="flex items-center mt-3 lg:pl-[750px]">
               <img src="/assets/1.png" alt="" class="w-12 h-12 rounded-full" id="profile">
               <span class="ml-3" id="username">Username</span>
          </div>
          <div class="flex flex-col lg:pl-[750px] ">
               <span class="mt-2" id="deskripsi">Deskripsi</span>
               <span class="-mt-1 text-gray-400">1h</span>
          </div>
          <div class="flex flex-row pl-2 pt-4 lg:pl-[750px]">
               <ion-icon name="heart-outline" class="text-2xl"></ion-icon>
               <span id="like"></span>
               <ion-icon name="chatbubble-outline" class="text-2xl ml-2"></ion-icon>
               <span id="komen"></span>
          </div>


          <!-- Komen -->
          <div class="lg:pl-[750px] mb-20">
               <div class="mt-6">
                    Comment
               </div>
               <hr class="bg-gray-700 w-full">
               <div class="flex flex-col" id="listkomentar">
                    {{-- <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div>
                    <div class="flex flex-row mt-5">
                         <div class="w-20">
                              <img src="/assets/1.png" class="w-12 h-12 rounded-full" alt="">
                         </div>
                         <div class="flex flex-col mr-2 ml-5">
                              <span class="text-black">Username</span>
                              <span class="mr-1">Lorem ipsum dolor sit amet. Lorem, ipsum dolor Lorem lorem5</span>
                              <span class="text-gray-500 mt-1 text-sm">1h</span>
                         </div>
                    </div> --}}
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
     <script src="/js/exploredetail.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
