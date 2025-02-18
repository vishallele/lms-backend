<x-admin.layout>

  <x-slot:page_heading>
    <div class="flex items-center justify-between">
      {{ isset($question->id) ? 'Edit Question' : 'Add Question' }}
      <a
        href="/admin/course/{{$course_id}}/module/{{$module_id}}/lesson/{{$lesson_id}}/questions"
        class="px-4 py-2 text-white bg-gray-900 text-sm rounded-md">
        Back
      </a>
    </div>
  </x-slot:page_heading>

  <div class="container p-2 mx-auto sm:p-4 max-w-2xl">
    @if(isset($user->id))
    <form
      method="POST"
      action="/admin/course/{{$course_id}}/module/{{$module_id}}/lesson/{{$lesson_id}}/question/update/{{$question->id}}">
      @else
      <form
        method="POST"
        action="/admin/course/{{$course_id}}/module/{{$module_id}}/lesson/{{$lesson_id}}/question/create">
        @endif
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Add Question</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-6">
                <label for="status" class="block text-sm/6 font-medium text-gray-900">Select Question Type</label>
                <div class="mt-2 grid grid-cols-2">
                  <select
                    id="question_type"
                    name="question_type"
                    autocomplete="status-name"
                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">Select Question Type</option>
                    @foreach($question_types as $key => $value )
                    <option value="{{$key}}">{{ $value }}</option>
                    @endforeach
                  </select>

                  <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              @include('admin.course.question.types.select_text')
            </div>
          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/admin/users" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Save</button>
          </div>

      </form>
  </div>

</x-admin.layout>