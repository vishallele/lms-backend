 @props(['option' => null, 'index' => 0 ])

 <!-- Question options-->
 <div
   {{$attributes}}
   class="mt-5 flex flex-col rounded-md border border-dashed border-slate-400 bg-gray-100 p-4 shadow-xl option_container_wrapper">

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
       <label for="option_en_text_[{{$index}}]" class="text-sm font-semibold">Option Text English</label>
       <input
         type="text"
         name="option_en_text_[{{$index}}]"
         id="option_en_text_[{{$index}}]"
         value="{{ old('option_en_text_[$index]', isset($option) ? $option['text']['en']['text'] : '') }}"
         class="option_text_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>

     @if(isset($option) && isset($option['text']['en']['audio']) )
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
       <audio controls>
         <source src="{{ asset('storage/'.$option['text']['en']['audio']) }}" type="audio/wav">
         <source src="{{ asset('storage/'.$option['text']['en']['audio']) }}" type="audio/mp3">
         Your browser does not support the audio element.
       </audio>
     </div>
     @endif

     <!--Option audio-->
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
       <label for="option_en_audio_[{{$index}}]" class="text-sm font-semibold">Option Audio</label>
       <input type="file" name="option_en_audio_[{{$index}}]" id="option_en_audio_[{{$index}}]"
         class="option_audio_en_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>
   </div>


   <div class="tab-hindi">
     <!--Option Text-->
     <div class="mx-1 flex flex-col gap-2 input_container">
       <label for="option_hi_text_[{{$index}}]" class="text-sm font-semibold">Option Text Hindi</label>
       <input
         type="text"
         name="option_hi_text_[{{$index}}]"
         id="option_hi_text_[{{$index}}]"
         value="{{ old('option_hi_text_[$index]', isset($option) ? $option['text']['hi']['text'] : '') }}"
         class="option_text_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>

     @if(isset($option) && isset($option['text']['hi']['audio']) )
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
       <audio controls>
         <source src="{{ asset('storage/'.$option['text']['hi']['audio']) }}" type="audio/wav">
         <source src="{{ asset('storage/'.$option['text']['hi']['audio']) }}" type="audio/mp3">
         Your browser does not support the audio element.
       </audio>
     </div>
     @endif

     <!--Option audio-->
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
       <label for="option_hi_audio_[{{$index}}]" class="text-sm font-semibold">Option Audio Hindi</label>
       <input type="file" name="option_hi_audio_[{{$index}}]" id="option_hi_audio_[{{$index}}]"
         class="option_audio_hi_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>
   </div>

   <div class="tab-marathi">
     <!--Option Text-->
     <div class="mx-1 flex flex-col gap-2 input_container">
       <label for="option_mr_text_[{{$index}}]" class="text-sm font-semibold">Option Text Marathi</label>
       <input
         type="text"
         name="option_mr_text_[{{$index}}]"
         id="option_mr_text_[{{$index}}]"
         value="{{ old('option_mr_text_[$index]', isset($option) ? $option['text']['mr']['text'] : '') }}"
         class="option_text_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>

     @if(isset($option) && isset($option['text']['mr']['audio']) )
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
       <audio controls>
         <source src="{{ asset('storage/'.$option['text']['mr']['audio']) }}" type="audio/wav">
         <source src="{{ asset('storage/'.$option['text']['mr']['audio']) }}" type="audio/mp3">
         Your browser does not support the audio element.
       </audio>
     </div>
     @endif

     <!--Option audio-->
     <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 input_container">
       <label for="option_mr_audio_[{{$index}}]" class="text-sm font-semibold">Option Audio Marathi</label>
       <input type="file" name="option_mr_audio_[{{$index}}]" id="option_mr_audio_[{{$index}}]"
         class="option_audio_mr_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black"
         placeholder="Enter option text" />
     </div>
   </div>

   @if( $attributes->get('type') === 'select_text')

   @if(isset($option) && isset($option['image']) )
   <div class="mx-1 mt-3 mb-5 flex flex-col gap-2 audio_container">
     <img src="{{ asset('storage/'.$option['image']) }}" width="100" height="100" />
   </div>
   @endif

   <!--Option Image-->
   <div class="mx-1 mt-3 flex flex-col gap-2 input_container">
     <label for="option_image_[{{$index}}]" class="text-sm font-semibold">Option Image</label>
     <input type="file" name="option_image_[{{$index}}]" id="option_image_[{{$index}}]"
       class="option_image_input rounded-md border border-slate-500 p-1 text-black placeholder:text-black image_input"
       placeholder="Enter option text" />
   </div>

   <div class="mx-1 mt-3 flex gap-2 items-center input_container">
     <label for="option_correct_[{{$index}}]" class="text-sm font-semibold">Correct Answer</label>
     <input
       type="checkbox"
       name="option_correct_[{{$index}}]"
       id="option_correct_[{{$index}}]"
       value="1"
       {{ ( isset($option) && $option['correct_answer'] === 1 ) ? 'checked' : '' }}
       class="option_correct_input rounded-md border border-slate-500  text-black placeholder:text-black" />
   </div>
   @endif

 </div>