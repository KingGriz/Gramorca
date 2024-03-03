<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
    <form action="/cek_akun" method="post">
        @csrf
    <section class="mt-12">
    <div class="max-w-[364px] bg-white rounded-md shadow-md mx-auto px-9 py-9 mb-16">
      <div class="flex flex-col">
        <!-- header login -->
        <img src="/assets/real logo.jpg" alt="">
        <span class="mt-2 text-3xl font-itali mx-auto">Sign In</span>
        <!-- end -->
        <!-- input login -->
        <span class="text-sm mt-4 mb-1">Email</span>
        <input type="email" id="email" name="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
          placeholder="Masukan Email Anda" required />
        <span class="text-sm mt-3 mb-1">Password</span>
        <input type="password" id="password" name="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
          placeholder="Masukan Password Anda" required />
        <!-- button -->
        <button type="submit"
          class="mt-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign In
        </button>
        <span class="mt-3 text-center text-sm">Belum punya account?
          <a href="/register" class="underline text-sky-500">Sign Up</a></span>
        <!-- end -->
      </div>
    </div>
  </section>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
