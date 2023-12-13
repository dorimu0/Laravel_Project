<x-app-layout>

  <div class="py-12 ">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex" style="height: 600px">
      <div class="w-full bg-white text-center p-16 mx-40 ">
        <div class="w-1/2 m-auto border-0 border-gray-500 text-center text-xl f bg-inherit p-1 font-bold">
          {{ $diary->title }}
        </div>
        
        
        <div class="my-6 mx-12">
          <div class="text-right my-3 text-gray-700 flex items-center justify-end">
            {{ $diary->created_at }}
            <x-dropdown align="right" width="20" >
              <x-slot name="trigger">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 cursor-pointer" height="15" viewBox="0 -960 960 960" width="15"><path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"/></svg>
              </x-slot>
              <x-slot name="content">
                <x-dropdown-link href="/create_diary/{{$diary->id}}/edit" class="text-center">
                  {{ __('수정') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('profile.edit')" class="text-center">
                  {{ __('삭제') }}
                </x-dropdown-link>
              </x-slot>
            </x-dropdown>
          </div>
          <hr class="mb-5">
          <div class="text-l leading-7 font-semibold text-left h-72 overflow-auto">
            {{ $diary->content }}
          </div>
        </div>
        <div class="mt-10">
          <button class="mr-3 border-b-2 border-gray-500"><a href="/show_diary/{{$diary->id - 1}}">이전</a></button>
          <button class="border-b-2 border-gray-500"><a href="/show_diary/{{$diary->id + 1}}">다음</a></button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>