<x-admin.layout>

  <x-slot:page_heading>
    <div class="flex items-center justify-between">
      {{ isset($module->id) ? 'Edit Module' : 'Add Module' }}
      <a href="/admin/courses" class="px-4 py-2 text-white bg-gray-900 text-sm rounded-md">Back</a>
    </div>
  </x-slot:page_heading>

  <div class="container p-2 mx-auto sm:p-4 max-w-2xl">
    @if(isset($course_id) && isset($module->id))
    <form method="POST" action="/admin/course/{{$course_id}}/module/update/{{$module->id}}">
      @else
      <form method="POST" action="/admin/course/{{$course_id}}/module/store">
        @endif
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Module Information</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-6">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Module Title in English</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                      type="text"
                      name="title"
                      id="title"
                      value="{{old('title', isset($module->id) ? $module->title : '' )}}"
                      class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                      placeholder="Enter module title in english">

                  </div>
                  @error('title')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Module Title in Hindi</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                      type="text"
                      name="title_hi"
                      id="title_hi"
                      value="{{old('title_hi', isset($module->id) ? $module->getTranslations('title',['hi']) : '' )}}"
                      class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                      placeholder="Enter module title in hindi">

                  </div>
                  @error('title_hi')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Module Title in Marathi</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input
                      type="text"
                      name="title_mr"
                      id="title_mr"
                      value="{{old('title_mr', isset($module->id) ? $module->getTranslations('title',['mr']) : '' )}}"
                      class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                      placeholder="Enter module title in marathi">

                  </div>
                  @error('title_mr')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Module Description in English</label>
                <div class="mt-2">
                  <textarea
                    name="description"
                    id="description"
                    rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    placeholder="Enter module description in english">{{old('description', isset($module->id) ? $module->description : '' )}}</textarea>
                  @error('description')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Module Description in Hindi</label>
                <div class="mt-2">
                  <textarea
                    name="description_hi"
                    id="description_hi"
                    rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    placeholder="Enter module description in hindi">{{old('description_hi', isset($module->id) ? $module->getTranslations('description',['hi']) : '' )}}</textarea>
                  @error('description_hi')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Module Description in Marathi</label>
                <div class="mt-2">
                  <textarea
                    name="description_mr"
                    id="description_mr"
                    rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    placeholder="Enter module description in marathi">{{old('description_mr', isset($module->id) ? $module->getTranslations('description',['mr']) : '' )}}</textarea>
                  @error('description_mr')
                  <p class="text-red-400 text-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

            </div>
          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/admin/courses" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Save</button>
          </div>
      </form>
  </div>

</x-admin.layout>