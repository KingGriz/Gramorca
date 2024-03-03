@extends('pages.user',['title' => 'album'])
@section('contentUser')
<div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-4 lg:grid-cols-6 gap-3 md:pl-[260px] sm:pl-[260px] p-12 ml-7">
    @foreach ($album->foto as $foto)
    <div class="flex flex-col gap-4">
        <a href="">
            <img class="mb-2" src="/foto/{{ $foto->lokasi_foto }}">
        <div class="flex justify-start">
          <p>{{ $foto->deskripsi }}</p>
        </div>
    </a>
      </div>
      @endforeach
  </div>
@endsection
