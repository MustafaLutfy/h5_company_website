@include('admin.layouts.sidebar')

<head>  
  <title>Add News</title>  
  <meta name="add-news" content="here you can add news posts"/>  
  <link rel="icon" href="{{ url('images/h5-logo.svg') }}">  
  <style>  
      #linkButton {  
          position: absolute;  
          display: none;  
          z-index: 1000;  
          background-color: #1a1a1a;  
          color: white;  
          padding: 6px 12px;  
          border-radius: 6px;  
          font-size: 13px;  
          font-weight: 500;  
          box-shadow: 0 2px 5px rgba(0,0,0,0.2);  
          border: none;  
          cursor: pointer;  
          transition: all 0.2s ease;  
          align-items: center;  
          gap: 4px;  
      }  

      #linkButton:hover {  
          background-color: #2d2d2d;  
          transform: translateY(-1px);  
      }  

      #linkButton svg {  
          width: 14px;  
          height: 14px;  
      }  

      /* Add a small triangle pointer to the button */  
      #linkButton:after {  
          content: '';  
          position: absolute;  
          bottom: -4px;  
          left: 50%;  
          transform: translateX(-50%);  
          width: 0;  
          height: 0;  
          border-left: 5px solid transparent;  
          border-right: 5px solid transparent;  
          border-top: 5px solid #1a1a1a;  
      }  

      #linkButton:hover:after {  
          border-top-color: #2d2d2d;  
      }  
  </style>  
  <script>  
      document.addEventListener('DOMContentLoaded', function() {  
          const textarea = document.getElementById('content');  
          const linkButton = document.getElementById('linkButton');  
          let selectionTimeout;  

          textarea.addEventListener('mouseup', handleSelection);  
          textarea.addEventListener('keyup', handleSelection);  

          function handleSelection(e) {  
              // Clear any existing timeout  
              clearTimeout(selectionTimeout);  

              // Set a small timeout to ensure the selection is complete  
              selectionTimeout = setTimeout(() => {  
                  const selection = window.getSelection();  
                  const selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);  

                  if (selectedText) {  
                      // Get the coordinates of the selection  
                      const textareaRect = textarea.getBoundingClientRect();  
                      const selectionRect = getSelectionCoordinates(textarea);  

                      // Position the button above the selection  
                      linkButton.style.display = 'flex';  
                      
                      // Calculate position relative to the viewport  
                      const buttonX = textareaRect.left + selectionRect.left + (selectionRect.width / 2);  
                      const buttonY = textareaRect.top + selectionRect.top - 40; // 40px above selection  

                      // Adjust position to ensure button stays within viewport  
                      const buttonRect = linkButton.getBoundingClientRect();  
                      const finalX = Math.max(10, Math.min(buttonX - (buttonRect.width / 2), window.innerWidth - buttonRect.width - 10));  
                      
                      linkButton.style.left = `${finalX}px`;  
                      linkButton.style.top = `${buttonY}px`;  
                  } else {  
                      linkButton.style.display = 'none';  
                  }  
              }, 10);  
          }  

          // Hide button when clicking outside textarea  
          document.addEventListener('click', function(e) {  
              if (e.target !== textarea && e.target !== linkButton && !linkButton.contains(e.target)) {  
                  linkButton.style.display = 'none';  
              }  
          });  

          // Helper function to get selection coordinates  
          function getSelectionCoordinates(textarea) {  
              const startPos = textarea.selectionStart;  
              const endPos = textarea.selectionEnd;  
              
              // Create a dummy element to measure text  
              const div = document.createElement('div');  
              div.style.cssText = window.getComputedStyle(textarea, null).cssText;  
              div.style.height = 'auto';  
              div.style.position = 'absolute';  
              div.style.visibility = 'hidden';  
              div.style.whiteSpace = 'pre-wrap';  
              div.style.wordWrap = 'break-word';  
              
              // Get the text before selection  
              const textBeforeSelection = textarea.value.substring(0, startPos);  
              const selectedText = textarea.value.substring(startPos, endPos);  
              
              // Create spans for measurement  
              div.innerHTML = escapeHtml(textBeforeSelection) + '<span id="measure">' + escapeHtml(selectedText) + '</span>';  
              document.body.appendChild(div);  
              
              const measureSpan = div.querySelector('#measure');  
              const spanRect = measureSpan.getBoundingClientRect();  
              const divRect = div.getBoundingClientRect();  
              
              // Calculate relative position  
              const left = measureSpan.offsetLeft;  
              const top = measureSpan.offsetTop;  
              const width = spanRect.width;  
              
              document.body.removeChild(div);  
              
              return { left, top, width };  
          }  

          // Helper function to escape HTML  
          function escapeHtml(text) {  
              const div = document.createElement('div');  
              div.textContent = text;  
              return div.innerHTML;  
          }  
      });  

      function showLinkModal() {  
          const textarea = document.getElementById('content');  
          const selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);  
          document.getElementById('textInput').value = selectedText;  
          document.getElementById('linkModal').classList.remove('hidden');  
      }  

      function insertLink() {  
          const textarea = document.getElementById('content');  
          const urlInput = document.getElementById('urlInput');  
          const textInput = document.getElementById('textInput');  
          
          const url = urlInput.value.trim();  
          const text = textInput.value.trim();  
          
          if (url && text) {  
              const link = `<a href="${url}">${text}</a>`;  
              
              const start = textarea.selectionStart;  
              const end = textarea.selectionEnd;  
              const textBefore = textarea.value.substring(0, start);  
              const textAfter = textarea.value.substring(end);  
              
              textarea.value = textBefore + link + textAfter;  
              
              urlInput.value = '';  
              textInput.value = '';  
              
              document.getElementById('linkModal').classList.add('hidden');  
              document.getElementById('linkButton').style.display = 'none';  
          }  
      }  

      function hideLinkModal() {  
          document.getElementById('linkModal').classList.add('hidden');  
      }  
  </script>  
</head>  
<div class="flex items-center justify-center h-[80%] my-[5%] px-4 pt-6 md:ml-[14%]">
    <!-- Link Button that appears on text selection -->
    <button id="linkButton" onclick="showLinkModal()" class="group">  
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />  
      </svg>  
      Add Link  
  </button>  

    <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Add Team Member</h3>
        <form method="POST" action="{{ route('team-members.store') }}" enctype="multipart/form-data">  
            @csrf  
            <div class="grid grid-cols-1 gap-6">  
                <!-- Name (English) -->  
                <div class="sm:col-span-6">  
                    <label for="name_en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name (English)</label>  
                    <input type="text" name="name_en" id="name_en" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Member Name (English)" required>  
                </div>  
        
                <!-- Name (Arabic) -->  
                <div class="sm:col-span-6">  
                    <label for="name_ar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name (Arabic)</label>  
                    <input type="text" name="name_ar" id="name_ar" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Member Name (Arabic)" required>  
                </div>  
        
                <!-- Role (English) -->  
                <div class="sm:col-span-6">  
                    <label for="role_en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role (English)</label>  
                    <input type="text" name="role_en" id="role_en" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Member Role (English)" required>  
                </div>  
        
                <!-- Role (Arabic) -->  
                <div class="sm:col-span-6">  
                    <label for="role_ar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role (Arabic)</label>  
                    <input type="text" name="role_ar" id="role_ar" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Member Role (Arabic)" required>  
                </div>  
        
                <!-- Description (English) -->  
                <div class="sm:col-span-6">  
                    <label for="description_en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description (English)</label>  
                    <textarea name="description_en" id="description_en" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a short description in English..."></textarea>  
                </div>  
        
                <!-- Description (Arabic) -->  
                <div class="sm:col-span-6">  
                    <label for="description_ar" class="block mb-2 text-sm font-medium text-gray-9 00 dark:text-white">Description (Arabic)</label>  
                    <textarea name="description_ar" id="description_ar" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a short description in Arabic..."></textarea>  
                </div>  
        
                <!-- Image Upload -->  
                <div class="sm:col-span-6">  
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>  
                    <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" required>  
                </div>  
            </div>  
        
            <!-- Submit Button -->  
            <div class="pt-4">  
                <button type="submit" class="w-full justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">  
                    Add Team Member  
                </button>  
            </div>  
        </form>  
    </div>

    <!-- Link Modal -->
    <div id="linkModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-96">
            <h3 class="text-lg font-semibold mb-4">Insert Link</h3>
            <div class="space-y-4">
                <div>
                    <label for="textInput" class="block text-sm font-medium text-gray-700">Link Text</label>
                    <input type="text" id="textInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label for="urlInput" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="url" id="urlInput" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="hideLinkModal()" class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="button" onclick="insertLink()" class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                        Insert
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>