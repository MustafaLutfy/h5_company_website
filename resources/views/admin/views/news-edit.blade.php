
@include('admin.layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <meta name="edit-news" content="Edit your news post"/>
    <link rel="icon" href="{{ url('images/h5-logo.svg') }}">

    <style>
        #content {
            min-height: 200px;
            max-height: 500px;
            overflow-y: auto;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        #content:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        #content a {
            background-color: rgba(96, 165, 250, 0.1);
            padding: 2px 8px;
            border-radius: 4px;
            color: #60A5FA;
            text-decoration: none;
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 2px;
            transition: all 0.2s ease;
        }

        #content a::after {
            content: attr(href);
            font-size: 0.75rem;
            opacity: 0.8;
            text-decoration: underline;
        }

        #content a:hover {
            background-color: rgba(96, 165, 250, 0.2);
        }

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

        .image-preview-container {
            position: relative;
            display: inline-block;
        }

        .image-preview-container .remove-image {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .image-preview-container .remove-image:hover {
            background: #dc2626;
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Link Button that appears on text selection -->
    <button id="linkButton" onclick="showLinkModal()" class="group">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
        </svg>
        Add Link
    </button>

    <div class="flex items-center justify-center min-h-screen px-4 pt-6 md:ml-[14%]">
        <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold dark:text-white">Edit News Post</h3>
                <a href="{{ route('add.news') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('update.news', $post->id) }}" enctype="multipart/form-data" id="updateForm">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-6">
                    <div class="sm:col-span-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ $post->title }}" 
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                               required>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                        <input type="hidden" name="content" id="hidden-content">
                        <div id="content" 
                             contenteditable="true"
                             class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                             {!! $post->content !!}
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image</label>
                        <div class="image-preview-container">
                            <img src="{{ asset('news_images/' . $post->image) }}" 
                                 alt="Current image" 
                                 class="w-32 h-32 object-cover rounded-lg mb-4">
                        </div>
                        
                        <label class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Upload New Image (Optional)</label>
                        <input type="file" 
                               name="images[]" 
                               accept="image/*"
                               onchange="previewImage(event)"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <img id="imagePreview" class="hidden w-32 h-32 object-cover rounded-lg mt-4">
                    </div>
                </div>

                <div class="flex items-center space-x-4 mt-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update Post
                    </button>
                    <button type="button" 
                            onclick="debugContent()" 
                            class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                        Debug Content
                    </button>
                    <a href="{{ route('add.news') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Link Modal -->
    <div id="linkModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-96">
            <h3 class="text-lg font-semibold mb-4 dark:text-white">Insert Link</h3>
            <div class="space-y-4">
                <div>
                    <label for="textInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link Text</label>
                    <input type="text" 
                           id="textInput" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label for="urlInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                    <input type="url" 
                           id="urlInput" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" 
                            onclick="hideLinkModal()" 
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                    <button type="button" 
                            onclick="insertLink()" 
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                        Insert
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contentDiv = document.getElementById('content');
            const linkButton = document.getElementById('linkButton');
            const hiddenInput = document.getElementById('hidden-content');
            const form = document.getElementById('updateForm');

            // Set initial content
            hiddenInput.value = contentDiv.innerHTML;

            // Update hidden input whenever content changes
            contentDiv.addEventListener('input', function() {
                hiddenInput.value = this.innerHTML;
                console.log('Content updated:', hiddenInput.value); // Debug line
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Final update of hidden input before submission
                hiddenInput.value = contentDiv.innerHTML;
                console.log('Submitting content:', hiddenInput.value); // Debug line
                
                // Submit the form
                this.submit();
            });

            // Link button visibility
            contentDiv.addEventListener('mouseup', handleSelection);
            contentDiv.addEventListener('keyup', handleSelection);

            function handleSelection(e) {
                const selection = window.getSelection();
                if (selection.toString().trim()) {
                    selectedRange = selection.getRangeAt(0);
                    const rect = selectedRange.getBoundingClientRect();
                    
                    linkButton.style.display = 'flex';
                    linkButton.style.top = `${window.scrollY + rect.top - 40}px`;
                    linkButton.style.left = `${rect.left + (rect.width / 2) - (linkButton.offsetWidth / 2)}px`;
                } else {
                    linkButton.style.display = 'none';
                }
            }
        });

        function insertLink() {
            const urlInput = document.getElementById('urlInput');
            const textInput = document.getElementById('textInput');
            const contentDiv = document.getElementById('content');
            const hiddenInput = document.getElementById('hidden-content');
            
            const url = urlInput.value.trim();
            const text = textInput.value.trim();
            
            if (url && text) {
                const selection = window.getSelection();
                if (selection.rangeCount) {
                    const range = selection.getRangeAt(0);
                    const link = document.createElement('a');
                    link.href = url;
                    link.textContent = text;
                    link.className = 'content-link';
                    
                    range.deleteContents();
                    range.insertNode(link);
                    
                    // Update hidden input after inserting link
                    hiddenInput.value = contentDiv.innerHTML;
                    
                    // Clean up
                    urlInput.value = '';
                    textInput.value = '';
                    document.getElementById('linkModal').classList.add('hidden');
                    document.getElementById('linkButton').style.display = 'none';
                }
            }
        }
        function showLinkModal() {  
            const selection = window.getSelection();  
            if (selection.toString().trim()) {  
                document.getElementById('textInput').value = selection.toString();  
                document.getElementById('linkModal').classList.remove('hidden');  
            }  
        }  

        function hideLinkModal() {  
            document.getElementById('linkModal').classList.add('hidden');  
        }  

        function previewImage(event) {  
            const preview = document.getElementById('imagePreview');  
            const file = event.target.files[0];  
            
            if (file) {  
                const reader = new FileReader();  
                
                reader.onload = function(e) {  
                    preview.src = e.target.result;  
                    preview.classList.remove('hidden');  
                }  
                
                reader.readAsDataURL(file);  
            } else {  
                preview.src = '';  
                preview.classList.add('hidden');  
            }  
        }  

        function debugContent() {  
            const contentDiv = document.getElementById('content');  
            const hiddenInput = document.getElementById('hidden-content');  
            console.group('Content Debug');  
            console.log('Content DIV:', contentDiv.innerHTML);  
            console.log('Hidden Input:', hiddenInput.value);  
            console.groupEnd();  

            // Show in page alert for non-developer users  
            alert('Current content has been logged to console.\n\nContent length: ' +   
                  contentDiv.innerHTML.length + ' characters\n' +  
                  'Hidden input length: ' + hiddenInput.value.length + ' characters');  
        }  

        // Handle paste events to clean up formatted text  
        document.getElementById('content').addEventListener('paste', function(e) {  
            e.preventDefault();  
            
            // Get plain text from clipboard  
            let text = (e.originalEvent || e).clipboardData.getData('text/plain');  
            
            // Insert text at cursor position  
            document.execCommand('insertText', false, text);  
        });  

        // Prevent drag and drop of content  
        document.getElementById('content').addEventListener('dragover', function(e) {  
            e.preventDefault();  
        });  

        document.getElementById('content').addEventListener('drop', function(e) {  
            e.preventDefault();  
        });  

        // Add keyboard shortcut for link creation (Ctrl/Cmd + K)  
        document.addEventListener('keydown', function(e) {  
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {  
                e.preventDefault();  
                const selection = window.getSelection();  
                if (selection.toString().trim()) {  
                    showLinkModal();  
                }  
            }  
        });  

        // Ensure content is always updated in hidden input when focus is lost  
        document.getElementById('content').addEventListener('blur', function() {  
            const hiddenInput = document.getElementById('hidden-content');  
            hiddenInput.value = this.innerHTML;  
        });  

        // Handle window resize for link button positioning  
        let resizeTimer;  
        window.addEventListener('resize', function() {  
            clearTimeout(resizeTimer);  
            resizeTimer = setTimeout(function() {  
                const selection = window.getSelection();  
                if (selection.toString().trim() && selection.rangeCount) {  
                    const range = selection.getRangeAt(0);  
                    const rect = range.getBoundingClientRect();  
                    const linkButton = document.getElementById('linkButton');  
                    
                    linkButton.style.top = `${window.scrollY + rect.top - 40}px`;  
                    linkButton.style.left = `${rect.left + (rect.width / 2) - (linkButton.offsetWidth / 2)}px`;  
                }  
            }, 250);  
        });  

        // Initialize tooltips if needed  
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-tooltip="tooltip"]'));  
        tooltipTriggerList.map(function (tooltipTriggerEl) {  
            return new bootstrap.Tooltip(tooltipTriggerEl);  
        });  

        // Warn user if they try to leave with unsaved changes  
        let originalContent = document.getElementById('content').innerHTML;  
        window.addEventListener('beforeunload', function(e) {  
            const currentContent = document.getElementById('content').innerHTML;  
            if (currentContent !== originalContent) {  
                e.preventDefault();  
                e.returnValue = '';  
            }  
        });  
    </script>  
</body>  
</html>