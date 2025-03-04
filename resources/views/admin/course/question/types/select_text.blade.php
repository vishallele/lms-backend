  <div class="sm:col-span-8">

    <div class="max-w-7xl">
      <div class="container mx-auto max-w-2xl">

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
                <input type="text" name="question_text_en" id="question_text_en" class=" rounded-md border border-slate-500 p-1 text-black placeholder:text-slate-500" placeholder="Enter question text" />
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
                <label for="question_text_hi" class="text-sm font-semibold">Question Text Hindi</label>
                <input type="text" name="question_text_hi" id="question_text_hi" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
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
                <label for="question_text_mr" class="text-sm font-semibold">Question Text Marathi</label>
                <input type="text" name="question_text_mr" id="question_text_mr" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="question_audio_mr" class="text-sm font-semibold">Question Audio File</label>
                <input type="file" name="question_audio_mr" id="question_audio_mr" class="rounded-md border border-slate-500 p-1 text-black placeholder:text-black" placeholder="Enter question text" />
              </div>
            </div>


          </div>

        </div>

        <div class="option_container">

          <!-- Question options-->
          <div
            class="mt-5 flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl option_container_wrapper"
            id="option_container_wrapper_0">

            <!--Delete option button-->
            <div class="mx-1 flex justify-end px-1">
              <button class="text-sm font-semibold text-red-700 delete_btn" type="button">Delete</button>
            </div>

            <!--Tab section-->
            <div
              class="mb-5 border-b border-gray-300 text-center text-sm font-medium text-gray-500 dark:border-gray-700 dark:text-gray-500">
              <ul class="-mb-px flex flex-wrap">
                <li class="me-2">
                  <a href="#tab-english" data-tab="tab-english"
                    class="inline-block tab rounded-t-lg border-transparent p-4 hover:border-gray-300 hover:text-gray-800">English</a>
                </li>
                <li class="me-2">
                  <a href="#tab-hindi" data-tab="tab-hindi"
                    class="active tab inline-block rounded-t-lg p-4 text-gray-600 hover:border-gray-300 hover:text-gray-600"
                    aria-current="page">Hindi</a>
                </li>
                <li class="me-2">
                  <a href="#tab-marathi" data-tab="tab-marathi"
                    class="inline-block tab rounded-t-lg border-transparent p-4 hover:border-gray-300 hover:text-gray-600">Marathi</a>
                </li>
              </ul>
            </div>


            <div class="tab-english">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_en_text_[0]" class="text-sm font-semibold">Option Text English</label>
                <input type="text" name="option_en_text_[0]" id="option_en_text_[0]"
                  class="option_text_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_en_audio_[0]" class="text-sm font-semibold">Option Audio</label>
                <input type="file" name="option_en_audio_[0]" id="option_en_audio_[0]"
                  class="option_audio_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>


            <div class="tab-hindi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_hi_text_[0]" class="text-sm font-semibold">Option Text Hindi</label>
                <input type="text" name="option_hi_text_[0]" id="option_hi_text_[0]"
                  class="option_text_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_hi_audio_[0]" class="text-sm font-semibold">Option Audio Hindi</label>
                <input type="file" name="option_hi_audio_[0]" id="option_hi_audio_[0]"
                  class="option_audio_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>

            <div class="tab-marathi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_mr_text_[0]" class="text-sm font-semibold">Option Text Marathi</label>
                <input type="text" name="option_mr_text_[0]" id="option_mr_text_[0]"
                  class="option_text_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_mr_audio_[0]" class="text-sm font-semibold">Option Audio Marathi</label>
                <input type="file" name="option_mr_audio_[0]" id="option_mr_audio_[0]"
                  class="option_audio_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>


            <!--Option Image-->
            <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
              <label for="option_image_[0]" class="text-sm font-semibold">Option Image</label>
              <input type="file" name="option_image_[0]" id="option_image_[0]"
                class="option_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input"
                placeholder="Enter option text" />
            </div>

            <div class="mx-1 mt-3 flex gap-2 items-center input_container">
              <label for="option_correct_[0]" class="text-sm font-semibold">Correct Answer</label>
              <input
                type="checkbox"
                name="option_correct_[0]"
                id="option_correct_[0]"
                value="1"
                class="option_correct_input rounded-md border border-slate-500  text-black placeholder:text-black" />
            </div>

          </div>

        </div>

        <div
          class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
          <button class="w-full text-sm font-semibold add_option" data-lang="en" type="button">Add option +</button>
        </div>

      </div>
    </div>
  </div>