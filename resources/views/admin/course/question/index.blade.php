<x-admin.layout>

  <x-slot:page_heading>
    <div class="flex items-center justify-between">
      Questions
      <a
        href="/admin/course/{{$course_id}}/module/{{$module_id}}/lesson/{{$lesson_id}}/question/create"
        class="px-4 py-2 text-white bg-gray-900 text-sm rounded-md">
        Add Question
      </a>
    </div>
  </x-slot:page_heading>


  <div class="container p-2 mx-auto sm:p-4">
    @if( Session::has('success'))
    <div class="flex w-full bg-green-200 p-4 rounded-md items-center mb-5">
      <span>{!! Session::get('success') !!}</span>
    </div>
    @endif

    @if( Session::has('error'))
    <div class="flex w-full bg-red-200 p-4 rounded-md items-center mb-5">
      <span>{!! Session::get('error') !!}</span>
    </div>
    @endif

    <div class="overflow-x-auto rounded-md shadow-md mt-5">
      <table class="w-full p-6 text-sm text-left whitespace-nowrap">
        <thead>
          <tr class="bg-gray-800 text-white font-bold tracking-wide">
            <th class="p-4">
              <input type="checkbox" class="p-check" />
            </th>
            <th class="p-4">Question</th>
            <th class="p-4">Question Type</th>
            <th class="p-4">
              <span class="sr-only">Action</span>
            </th>
          </tr>
        </thead>
        <tbody class="border-b dark:bg-gray-50 dark:border-gray-300">
          @if($questions->total() > 0)
          @foreach( $questions as $question )
          <tr class="font-normal tracking-wide text-md">
            <td class="px-4">
              <input class="c-check" name="l[]" type="checkbox" value="{{$question->id}}" />
            </td>
            <td class="px-3 py-4">
              @if( $question->question_type === 'pair_matching')
              {{'--'}}
              @else
              <p>{{ $question->question_data['text']['en']['text'] }}</p>
              @endif
            </td>
            <td class="px-3 py-4">
              {{ $question->question_type }}
            </td>
            <td class="px-2 py-4">
              <div class="flex gap-2 items-center">
                <a
                  class="px-2 py-2  text-white bg-gray-900 text-sm rounded-md"
                  href="/admin/course/{{$course_id}}/module/{{$module_id}}/lesson/{{$lesson_id}}/question/edit/{{$question->id}}">
                  Edit
                </a>
              </div>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4" class="p-4">No records found.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>

    <div class="mt-5">
      {{ $questions->withQueryString()->links() }}
    </div>

  </div>

</x-admin.layout>