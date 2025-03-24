<div id="fill_blanks" class="sm:col-span-8">
  <div class="max-w-7xl">
    <div class="container mx-auto max-w-4xl">
      <div id="question_container_fib">

        <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl">

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
              <h1 class="font-semibold">Sentence Details</h1>
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="instruction_en" class="text-sm font-semibold">Instruction in English</label>
                <input
                  type="text"
                  name="instruction_en"
                  id="instruction_en"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter instruction in English"
                  value="{{old('instruction_en', isset($question->id) ? $question->question_data['text']['en']['instruction'] : '' ) }}" />
              </div>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="sentence_en" class="text-sm font-semibold">Sentence in English</label>
                <textarea
                  name="sentence_en"
                  id="sentence_en"
                  rows="3"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500"
                  placeholder="Enter sentence in english with {[]} placeholder for blank spaces">{{old('sentence_en', isset($question->id) ? $question->question_data['text']['en']['text'] : '' ) }}</textarea>
              </div>

            </div>


          </div>

          <div class="tab-hindi">
            <!--Main Question Section-->
            <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-lg">
              <h1 class="font-semibold">Sentence Details</h1>
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="instruction_en" class="text-sm font-semibold">Instruction in Hindi</label>
                <input
                  type="text"
                  name="instruction_hi"
                  id="instruction_hi"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter instruction in Hindi"
                  value="{{old('instruction_hi', isset($question->id) ? $question->question_data['text']['hi']['instruction'] : '' ) }}" />
              </div>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="sentence_hi" class="text-sm font-semibold">Sentence in Hindi</label>
                <textarea
                  type="text"
                  name="sentence_hi"
                  rows="3"
                  id="sentence_hi"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter sentence in hindi with {[]} placeholder for blank spaces">{{old('sentence_hi', isset($question->id) ? $question->question_data['text']['hi']['text'] : '' ) }}</textarea>
              </div>
            </div>


          </div>

          <div class="tab-marathi">
            <!--Main Question Section-->
            <div class="flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-lg">
              <h1 class="font-semibold">Sentence Details</h1>
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="instruction_en" class="text-sm font-semibold">Instruction in Marathi</label>
                <input
                  type="text"
                  name="instruction_mr"
                  id="instruction_mr"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter instruction in Marathi"
                  value="{{old('instruction_mr', isset($question->id) ? $question->question_data['text']['mr']['instruction'] : '' ) }}" />
              </div>
              <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
                <label for="sentence_mr" class="text-sm font-semibold">Sentence in Marathi</label>
                <textarea
                  type="text"
                  name="sentence_mr"
                  id="sentence_mr"
                  rows="3"
                  class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter sentence in marathi with {[]} placeholder for blank spaces">{{old('sentence_mr', isset($question->id) ? $question->question_data['text']['mr']['text'] : '' ) }}</textarea>
              </div>
            </div>


          </div>

          <!--Image-->
          @if(isset($question->id) && isset($question->question_data['image']) )
          <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
            <img src="{{ asset('storage/'.$question->question_data['image']) }}" width="100" height="100" />
          </div>
          @endif

          <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
            <label for="sentence_image" class="text-sm font-semibold">Image</label>
            <input
              type="file"
              name="sentence_image"
              id="sentence_image"
              class="option_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input" />
          </div>

          <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
            <label for="sentence_en" class="text-sm font-semibold">Correct Sentence</label>
            <textarea
              name="correct_sentence"
              id="correct_sentence"
              rows="3"
              class="rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500"
              placeholder="Enter correct answer of this sentence">{{old('correct_sentence', isset($question->id) ? $question->question_data['correct_sentence'] : '' ) }}</textarea>
          </div>

        </div>

      </div>

      <div class="option_container">
        @if(isset($question->id) && count($question->question_data['options']) > 0 )
        @for( $i = 0; $i < count($question->question_data['options']); $i++ )
          <x-admin.options
            id="option_container_wrapper_{{$i}}"
            type="fill_blanks"
            :option="$question->question_data['options'][$i]"
            :index="$i" />
          @endfor
          @endif
      </div>

      <div
        class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
        <button class="w-full text-sm font-semibold add_option" data-lang="en" type="button">Add option +</button>
      </div>

    </div>
  </div>
</div>