  <div id="select_text" class="sm:col-span-8">

    <div class="max-w-7xl">
      <div class="container mx-auto max-w-4xl">

        <div id="question_container">
          <!--Tab section-->
          <div class="mb-5 border-b border-gray-300 text-center text-sm font-medium text-gray-500 dark:border-gray-700 dark:text-gray-500">
            <ul class="-mb-px flex flex-wrap">
              <li class="me-2">
                <a href="#tab-english" data-tab="tab-english" class="tab inline-block rounded-t-lg border-transparent p-4 hover:border-gray-300 hover:text-gray-800">English</a>
              </li>
              <li class="me-2">
                <a href="#tab-hindi" data-tab="tab-hindi" class="active tab inline-block rounded-t-lg p-4 text-gray-600 hover:border-gray-300 hover:text-gray-600" aria-current="page">Hindi</a>
              </li>
              <li class="me-2">
                <a href="#tab-marathi" data-tab="tab-marathi" class="tab inline-block rounded-t-lg border-transparent p-4 hover:border-gray-300 hover:text-gray-600">Marathi</a>
              </li>
            </ul>
          </div>

          <div class="tab-english">
            <!--Main Question Section-->
            <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-lg">
              <h1 class="font-semibold">Question Details</h1>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="question_text_en" class="text-sm font-semibold">Question Text in English</label>
                <input
                  type="text"
                  name="question_text_en"
                  id="question_text_en"
                  class=" rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500"
                  placeholder="Enter question text"
                  value="{{old('question_text_en', isset($question->id) ? $question->question_data['text']['en']['text'] : '' ) }}" />
              </div>

              @if(isset($question->id) && isset($question->question_data['text']['en']['audio']) )
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
                <audio controls>
                  <source src="{{ asset('storage/'.$question->question_data['text']['en']['audio']) }}" type="audio/wav">
                  <source src="{{ asset('storage/'.$question->question_data['text']['en']['audio']) }}" type="audio/mp3">
                  Your browser does not support the audio element.
                </audio>
              </div>
              @endif

              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="question_audio_en" class="text-sm font-semibold">Question Audio File</label>
                <input type="file" name="question_audio_en" id="question_audio_en" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
            </div>


          </div>

          <div class="tab-hindi">
            <!--Main Question Section-->
            <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-lg">
              <h1 class="font-semibold">Question Details</h1>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="question_text_hi" class="text-sm font-semibold">Question Text Hindi</label>
                <input
                  type="text"
                  name="question_text_hi"
                  id="question_text_hi"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter question text"
                  value="{{old('question_text_hi', isset($question->id) ? $question->question_data['text']['hi']['text'] : '' ) }}" />
              </div>
              @if(isset($question->id) && isset($question->question_data['text']['hi']['audio']) )
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
                <audio controls>
                  <source src="{{ asset('storage/'.$question->question_data['text']['hi']['audio']) }}" type="audio/wav">
                  <source src="{{ asset('storage/'.$question->question_data['text']['hi']['audio']) }}" type="audio/mp3">
                  Your browser does not support the audio element.
                </audio>
              </div>
              @endif
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="question_audio_en" class="text-sm font-semibold">Question Audio File</label>
                <input type="file" name="question_audio_hi" id="question_audio_hi" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
            </div>


          </div>

          <div class="tab-marathi">
            <!--Main Question Section-->
            <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-lg">
              <h1 class="font-semibold">Question Details</h1>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="question_text_mr" class="text-sm font-semibold">Question Text Marathi</label>
                <input
                  type="text"
                  name="question_text_mr"
                  id="question_text_mr"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter question text"
                  value="{{old('question_text_mr', isset($question->id) ? $question->question_data['text']['mr']['text'] : '' ) }}" />
              </div>
              @if(isset($question->id) && isset($question->question_data['text']['mr']['audio']) )
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
                <audio controls>
                  <source src="{{ asset('storage/'.$question->question_data['text']['mr']['audio']) }}" type="audio/wav">
                  <source src="{{ asset('storage/'.$question->question_data['text']['mr']['audio']) }}" type="audio/mp3">
                  Your browser does not support the audio element.
                </audio>
              </div>
              @endif
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="question_audio_mr" class="text-sm font-semibold">Question Audio File</label>
                <input type="file" name="question_audio_mr" id="question_audio_mr" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
            </div>


          </div>

        </div>

        <div class="option_container">

          @if(isset($question->id) && count($question->question_data['options']) > 0 )
          @for( $i = 0; $i < count($question->question_data['options']); $i++ )
            <x-admin.options
              id="option_container_wrapper_{{$i}}"
              type="select_text"
              :option="$question->question_data['options'][$i]"
              :index="$i" />
            @endfor
            @else
            <x-admin.options id="option_container_wrapper_0" type="select_text" />
            @endif

        </div>

        <div
          class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
          <button class="w-full text-sm font-semibold add_option" data-lang="en" type="button">Add option +</button>
        </div>

      </div>
    </div>
  </div>