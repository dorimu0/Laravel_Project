<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 ">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
          <div class="p-6 text-gray-900">
              {{ __("오늘 하루를 기록해 보세요") }}
          </div>
          <div class="flex items-center mr-5 font-extrabold">
            <a href="/create_diary" class="bg-amber-400 p-2 rounded-lg text-white text-xs hover:bg-amber-500 cursor-pointer">일기작성</a>
          </div>
        </div>
      </div>
    </div>
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($diaries as $diary)
        <div class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-white lg:aspect-none group-hover:opacity-75 lg:h-80">
            <a href="/show_diary/{{$diary->id}}">
              <img src="{{ $diary->image_path }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full" style="max-height: 300px object-fit: cover">
            </a>
          </div>
        </div>
        @endforeach
        <div class="h-48">

        </div>
  
      </div>
    </div>
</x-app-layout>


