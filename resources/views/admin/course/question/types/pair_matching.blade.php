<div class="sm:col-span-8">
  <div class="container mx-auto max-w-4xl">
    <div class="flex items-center gap-2">
      <div
        id="left_items"
        class="w-full flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl">
        <h1 class="font-semibold">Left Column Items</h1>
        <div class="option_container">

          <!-- Question options-->
          <div
            class="mt-5 flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl option_container_wrapper"
            id="option_container_wrapper_l_0">

            <!--Delete option button-->
            <div class="mx-1 flex justify-end px-1">
              <button class="text-sm font-semibold text-red-700 delete_pair_matching" data-column="l" type="button">Delete</button>
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
                <label for="option_en_text_l_[0]" class="text-sm font-semibold">Option Text English</label>
                <input type="text" name="option_en_text_l_[0]" id="option_en_text_l_[0]"
                  class="option_text_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_en_audio_l_[0]" class="text-sm font-semibold">Option Audio</label>
                <input type="file" name="option_en_audio_l_[0]" id="option_en_audio_l_[0]"
                  class="option_audio_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>


            <div class="tab-hindi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_hi_text_l_[0]" class="text-sm font-semibold">Option Text Hindi</label>
                <input type="text" name="option_hi_text_l_[0]" id="option_hi_text_l_[0]"
                  class="option_text_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_hi_audio_l_[0]" class="text-sm font-semibold">Option Audio Hindi</label>
                <input type="file" name="option_hi_audio_l_[0]" id="option_hi_audio_l_[0]"
                  class="option_audio_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>

            <div class="tab-marathi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_mr_text_l_[0]" class="text-sm font-semibold">Option Text Marathi</label>
                <input type="text" name="option_mr_text_l_[0]" id="option_mr_text_l_[0]"
                  class="option_text_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_mr_audio_l_[0]" class="text-sm font-semibold">Option Audio Marathi</label>
                <input type="file" name="option_mr_audio_l_[0]" id="option_mr_audio_l_[0]"
                  class="option_audio_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>

            <!--Option Image-->
            <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
              <label for="option_image_l_[0]" class="text-sm font-semibold">Option Image</label>
              <input type="file" name="option_image_l_[0]" id="option_image_l_[0]"
                class="option_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input"
                placeholder="Enter option text" />
            </div>

          </div>

        </div>
        <div
          class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
          <button class="w-full text-sm font-semibold add_pair_match" data-column="l" type="button">Add option +</button>
        </div>
      </div>
      <div id="right_items" class="w-full flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl">
        <h1 class="font-semibold">Right Column Items</h1>
        <div class="option_container">

          <!-- Question options-->
          <div
            class="mt-5 flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl option_container_wrapper"
            id="option_container_wrapper_r_0">

            <!--Delete option button-->
            <div class="mx-1 flex justify-end px-1">
              <button class="text-sm font-semibold text-red-700 delete_pair_matching" type="button" data-column="r">Delete</button>
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
                <label for="option_en_text_r_[0]" class="text-sm font-semibold">Option Text English</label>
                <input type="text" name="option_en_text_r_[0]" id="option_en_text_r_[0]"
                  class="option_text_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_en_audio_r_[0]" class="text-sm font-semibold">Option Audio</label>
                <input type="file" name="option_en_audio_r_[0]" id="option_en_audio_r_[0]"
                  class="option_audio_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>


            <div class="tab-hindi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_hi_text_r_[0]" class="text-sm font-semibold">Option Text Hindi</label>
                <input type="text" name="option_hi_text_r_[0]" id="option_hi_text_r_[0]"
                  class="option_text_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_hi_audio_r_[0]" class="text-sm font-semibold">Option Audio Hindi</label>
                <input type="file" name="option_hi_audio_r_[0]" id="option_hi_audio_r_[0]"
                  class="option_audio_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>

            <div class="tab-marathi">
              <!--Option Text-->
              <div class="mx-1 flex flex-col gap-2 input_container">
                <label for="option_mr_text_r_[0]" class="text-sm font-semibold">Option Text Marathi</label>
                <input type="text" name="option_mr_text_r_[0]" id="option_mr_text_r_[0]"
                  class="option_text_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>

              <!--Option audio-->
              <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
                <label for="option_mr_audio_r_[0]" class="text-sm font-semibold">Option Audio Marathi</label>
                <input type="file" name="option_mr_audio_r_[0]" id="option_mr_audio_r_[0]"
                  class="option_audio_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
                  placeholder="Enter option text" />
              </div>
            </div>

            <!--Option Image-->
            <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
              <label for="option_image_r_[0]" class="text-sm font-semibold">Option Image</label>
              <input type="file" name="option_image_r_[0]" id="option_image_r_[0]"
                class="option_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input"
                placeholder="Enter option text" />
            </div>

          </div>

        </div>
        <div
          class="mt-5 flex justify-center rounded-md border border-dashed border-slate-400 bg-gray-100 p-2 shadow-xl">
          <button class="w-full text-sm font-semibold add_pair_match" data-column="r" type="button">Add option +</button>
        </div>
      </div>
    </div>
  </div>
</div>