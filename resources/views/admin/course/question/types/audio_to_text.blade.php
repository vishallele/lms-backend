  <div class="sm:col-span-8">

    <div class="max-w-7xl">
      <div class="container mx-auto max-w-4xl">

        <div id="question_container_att">
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
                <label for="instruction_text_en" class="text-sm font-semibold">Instruction Text in English</label>
                <input type="text" name="instruction_text_en" id="instruction_text_en" class=" rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500" placeholder="Enter question instruction" />
              </div>
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
                <label for="instruction_text_hi" class="text-sm font-semibold">Instruction Text Hindi</label>
                <input type="text" name="instruction_text_hi" id="instruction_text_hi" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question instruction" />
              </div>
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
                <label for="instruction_text_mr" class="text-sm font-semibold">Instruction Text Marathi</label>
                <input type="text" name="instruction_text_mr" id="instruction_text_mr" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter instruction text" />
              </div>
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="question_audio_mr" class="text-sm font-semibold">Question Audio File</label>
                <input type="file" name="question_audio_mr" id="question_audio_mr" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
            </div>


          </div>

          <!--Question Image-->
          <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
            <label for="question_image" class="text-sm font-semibold">Image</label>
            <input type="file" name="question_image" id="question_image"
              class="question_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input" />
          </div>

          <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
            <label for="sentence_en" class="text-sm font-semibold">Correct Sentence</label>
            <textarea
              name="correct_sentence"
              id="correct_sentence"
              rows="3"
              class="rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500"
              placeholder="Enter correct answer of this sentence"></textarea>
          </div>

        </div>

        <div class="option_container">

          <x-admin.options id="option_container_wrapper_att" type="audio_to_text" />


        </div>

        <div
          class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
          <button class="w-full text-sm font-semibold add_option" data-lang="en" type="button">Add option +</button>
        </div>

      </div>
    </div>
  </div>