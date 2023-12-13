<x-app-layout>

  <div class="py-12 ">
    <form method="POST" action="{{ isset($diary) ? route('diary.update', $diary) : route('diary.store') }}">
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex" style="height: 600px">
        @csrf
        @if (isset($diary))
          @method('PUT')
        @endif
        {{-- 표지 수정 --}}
        <div class="w-80 bg-white mr-16 border-2 rounded-lg overflow-scroll">
          @foreach ($images as $image)
          <label class="flex flex-col items-center">
            <img src="{{$image->path}}" class="m-auto my-6 w-2/3 bg-red-50 h-32 border border-gray-200"/>
            <input type="radio" name="image_path" value="{{$image->path}}" {{ old('image_path', $diary->image_path ?? '') == $image->path ? 'checked' : '' }}  />
          </label>
          @endforeach
          
        </div>
    
      
        <div class="w-full bg-white text-center p-16">
          <input type="text" name="title" value="{{ old('title', $diary->title ?? '') }}" class="border-0 border-b-2 text-center text-xl focus:outline-none focus:border-slate-600 bg-inherit p-1 px-5" style="box-shadow: none;" placeholder="Title">


          <div class="my-6 mx-12">
            <div class="text-right my-3">
              날짜
            </div>
            <hr class="mb-5">
            <textarea name="content" rows="15" class="w-full text-l box-border border-gray-200 focus:outline-none focus:border-none bg-inherit" style="box-shadow: none; resize: none;" >{{ old('content', $diary->content ?? '') }}</textarea>
          </div>
        </div>
      </div>
      <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 text-right">
        <x-primary-button class="my-3" >{{ __('저장') }}</x-primary-button>
      </div>
    </form>
  </div>
</x-app-layout>