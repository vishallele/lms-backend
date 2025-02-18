  <div class="sm:col-span-6">

    <div class="max-w-4xl mx-auto">
      <!-- Question Section -->
      <div class="space-y-6">
        <!-- Language Tabs -->
        <div class="border-b border-gray-200">
          <nav class="flex gap-6" aria-label="Tabs">
            <button type="button"
              data-tab="english"
              onclick="switchTab('english')"
              class="tab-button px-4 py-2 text-sm font-medium border-b-2 border-gray-500 text-gray-600">
              English
            </button>
            <button type="button"
              data-tab="hindi"
              onclick="switchTab('hindi')"
              class="tab-button px-4 py-2 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
              Hindi
            </button>
            <button type="button"
              data-tab="marathi"
              onclick="switchTab('marathi')"
              class="tab-button px-4 py-2 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
              Marathi
            </button>
          </nav>
        </div>

        <!-- Language Content Sections -->
        <div id="english-content" class="tab-content space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">English Question Text</label>
            <textarea name="about" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">English Audio Source</label>
            <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
          </div>
          <!-- Options Section -->
          <div class="mt-8 space-y-6">
            <h3 class="text-lg font-medium">Options</h3>

            <!-- Options Container -->
            <div id="en_options-container" class="space-y-4">
              <!-- Option Template (hidden) -->
              <div class="en_option-template hidden border rounded-lg p-4 space-y-4 bg-gray-50">
                <div class="flex justify-between items-center">
                  <h4 class="text-sm font-medium">Option <span class="en_option-number">1</span></h4>
                  <button type="button" class="remove-option text-red-600 hover:text-red-800 text-sm">
                    Remove
                  </button>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Text</label>
                  <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Audio Source</label>
                  <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Image</label>
                  <input type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
              </div>
            </div>

            <!-- Add Option Button -->
            <button
              type="button"
              onclick="addOption('en')"
              class="w-full flex justify-center items-center px-4 py-2 border-2 border-dashed border-gray-300 rounded-md hover:border-gray-400 text-gray-600 hover:text-gray-700 bg-white">
              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
              Add Option
            </button>
          </div>
        </div>

        <div id="hindi-content" class="tab-content hidden space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Hindi Question Text</label>
            <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Hindi Audio Source</label>
            <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
          </div>

          <!-- Options Section -->
          <div class="mt-8 space-y-6">
            <h3 class="text-lg font-medium">Options</h3>

            <!-- Options Container -->
            <div id="hi_options-container" class="space-y-4">
              <!-- Option Template (hidden) -->
              <div class="hi_option-template hidden border rounded-lg p-4 space-y-4 bg-gray-50">
                <div class="flex justify-between items-center">
                  <h4 class="text-sm font-medium">Option <span class="hi_option-number">1</span></h4>
                  <button type="button" class="remove-option text-red-600 hover:text-red-800 text-sm">
                    Remove
                  </button>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Text</label>
                  <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Audio Source</label>
                  <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Image</label>
                  <input type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
              </div>
            </div>

            <!-- Add Option Button -->
            <button
              type="button"
              onclick="addOption('hi')"
              class="w-full flex justify-center items-center px-4 py-2 border-2 border-dashed border-gray-300 rounded-md hover:border-gray-400 text-gray-600 hover:text-gray-700 bg-white">
              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
              Add Option
            </button>
          </div>
        </div>

        <div id="marathi-content" class="tab-content hidden space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Marathi Question Text</label>
            <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Marathi Audio Source</label>
            <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
          </div>
          <!-- Options Section -->
          <div class="mt-8 space-y-6">
            <h3 class="text-lg font-medium">Options</h3>

            <!-- Options Container -->
            <div id="mr_options-container" class="space-y-4">
              <!-- Option Template (hidden) -->
              <div class="mr_option-template hidden border rounded-lg p-4 space-y-4 bg-gray-50">
                <div class="flex justify-between items-center">
                  <h4 class="text-sm font-medium">Option <span class="mr_option-number">1</span></h4>
                  <button type="button" class="remove-option text-red-600 hover:text-red-800 text-sm">
                    Remove
                  </button>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Text</label>
                  <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Audio Source</label>
                  <input type="file" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Option Image</label>
                  <input type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-gray-700 hover:file:bg-gray-100">
                </div>
              </div>
            </div>

            <!-- Add Option Button -->
            <button
              type="button"
              onclick="addOption('mr')"
              class="w-full flex justify-center items-center px-4 py-2 border-2 border-dashed border-gray-300 rounded-md hover:border-gray-400 text-gray-600 hover:text-gray-700 bg-white">
              <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
              Add Option
            </button>
          </div>
        </div>

        <!-- Common Question Image -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Question Image</label>
          <input type="file" accept="image/*" class="mt-1 block w-full text-sm text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
        </div>
      </div>

      <!-- Rest of the form remains same as before -->

      <script>
        function switchTab(language) {
          // Hide all tab contents
          document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
          });

          // Remove active styles from all tabs
          document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('border-gray-500', 'text-gray-600');
            button.classList.add('border-transparent', 'text-gray-500');
          });

          // Show selected tab content
          document.getElementById(`${language}-content`).classList.remove('hidden');

          // Add active styles to selected tab
          document.querySelector(`[data-tab="${language}"]`).classList.add('border-gray-500', 'text-gray-600');
          document.querySelector(`[data-tab="${language}"]`).classList.remove('border-transparent', 'text-gray-500');
        }

        // Options functionality
        let optionCount = 1;

        function addOption(language) {
          const optionsContainer = document.getElementById(language + '_options-container');
          const template = document.querySelector('.' + language + '_option-template');

          console.log(template);

          // Clone the template
          const newOption = template.cloneNode(true);
          newOption.classList.remove('hidden', language + '_option-template');
          newOption.classList.add('option-item');

          // Update option number
          optionCount++;
          newOption.querySelector('.' + language + '_option-number').textContent = optionCount;

          // Add remove functionality
          newOption.querySelector('.remove-option').addEventListener('click', () => {
            newOption.remove();
            updateOptionNumbers(language);
          });

          optionsContainer.appendChild(newOption);
          updateOptionNumbers(language);
        }

        function updateOptionNumbers(language) {
          const options = document.querySelectorAll('.option-item');
          options.forEach((option, index) => {
            option.querySelector('.' + language + '_option-number').textContent = index + 1;
          });
        }

        // Initialize first option
        document.addEventListener('DOMContentLoaded', () => {
          addOption(); // Add first option by default
        });

        // Remove option functionality
        document.addEventListener('click', (e) => {
          if (e.target.classList.contains('remove-option')) {
            e.target.closest('.option-item').remove();
            updateOptionNumbers();
          }
        });
      </script>
    </div>

  </div>