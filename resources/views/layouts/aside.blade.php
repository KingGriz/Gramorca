<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-800 transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-5 py-10 overflow-y-auto bg-gray-500 border">
    <img src="/assets/page.png" alt="" class="w-30">
        </a>
        <div class="container h-8"></div>
        <ul class="space-y-2 font-medium ">
            <li>
                <a href="/beranda"
                    class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 dark:hover:bg-blue-700 group hover:text-white">
                    <ion-icon name="home-outline" class="text-2xl text-gray-900"></ion-icon>
                    <span class="ms-3 text-gray-900 font-bold">Beranda</span>
                </a>
            </li>
            <li>
                <a href="/upload"
                    class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 dark:hover:bg-blue-700 group  hover:text-white">
                    <ion-icon name="add-circle-outline" class="text-2xl text-gray-900"></ion-icon>
                    <span class="ms-3 text-gray-900 font-bold">Upload Foto</span>
                </a>
            </li>
            <li>
                <a href="/profil"
                    class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 dark:hover:bg-blue-700 group  hover:text-white">
                    <ion-icon name="person-outline" class="text-2xl text-gray-900"></ion-icon>
                    <span class="ms-3 text-gray-900 font-bold">Profile</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post"

                    class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 dark:hover:bg-blue-700 group  hover:text-white">
                    @csrf
                    <ion-icon name="log-out-outline" class="text-2xl text-gray-900"></ion-icon>
                    <button type="submit" class="ms-3 text-gray-900 font-bold">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</aside>
