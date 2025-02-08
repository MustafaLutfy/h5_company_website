@include('admin.layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update post</title>
    <meta name="update-post" content="Update your post post"/>
    <link rel="icon" href="{{ url('images/h5-logo.svg') }}">

    <!-- Previous styles remain the same -->
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
        /* ... rest of the previous styles ... */

        /* New styles for image preview */
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }

        .image-preview-item {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .image-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image {
            position: absolute;
            top: 0.25rem;
            right: 0.25rem;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .remove-image:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>  

    <script>
        // Previous link button JavaScript remains the same
        
        // New Image Preview JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.querySelector('input[name="images[]"]');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const maxFileSize = 5 * 1024 * 1024; // 5MB
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            imageInput.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);
                
                // Clear new image previews
                const newPreviewContainer = document.getElementById('newImagePreviewContainer');
                newPreviewContainer.innerHTML = '';

                files.forEach(file => {
                    // Validate file size
                    if (file.size > maxFileSize) {
                        alert(`File ${file.name} is too large. Maximum size is 5MB.`);
                        return;
                    }

                    // Validate file type
                    if (!allowedTypes.includes(file.type)) {
                        alert(`File ${file.name} is not a supported image type.`);
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'image-preview-item';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeNewImage(this)">×</button>
                        `;
                        newPreviewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                });
            });
        });

        function removeExistingImage(element, imageId) {
            if (confirm('Are you sure you want to remove this image?')) {
                const container = element.closest('.image-preview-item');
                container.remove();
                
                // Add to removed images array
                const removedImagesInput = document.getElementById('removedImages');
                const removedImages = removedImagesInput.value ? JSON.parse(removedImagesInput.value) : [];
                removedImages.push(imageId);
                removedImagesInput.value = JSON.stringify(removedImages);
            }
        }

        function removeNewImage(element) {
            const container = element.closest('.image-preview-item');
            container.remove();
            
            // Clear the file input if all previews are removed
            const previewContainer = document.getElementById('newImagePreviewContainer');
            if (previewContainer.children.length === 0) {
                document.querySelector('input[name="images[]"]').value = '';
            }
        }
    </script>
</head>
<div class="flex items-center justify-center h-[80%] px-4 pt-6 md:ml-[14%]">
    <!-- Link Button remains the same -->
    <button id="linkButton" onclick="showLinkModal()" class="group">  
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />  
        </svg>  
        Add Link  
    </button>  

    <div class="p-4 mb-4 md:w-[60%] w-[90%] bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">Update post Post</h3>
        <form method="POST" action="{{ route('update.news', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Hidden input for tracking removed images -->
            <input type="hidden" id="removedImages" name="removed_images" value="[]">

            <!-- Title and Content fields remain the same -->
            <div class="grid grid-cols-1 gap-6">
                <div class="sm:col-span-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Post Title" required>
                </div>

                <div class="sm:col-span-6">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea name="content" id="content" rows="4" class="block max-h-56 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your post content here...">{{ $post->content }}</textarea>
                </div>
            </div>

            <div class="pt-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Images</label>
                    <div id="imagePreviewContainer" class="image-preview-container">
                                <div class="image-preview-item">
                                    <img src="{{ asset('news_images/' . $post->image) }}" alt="post image">
                                    <button type="button" class="remove-image" onclick="removeExistingImage(this, '{{ $post->image }}')">×</button>
                                </div>
                    </div>

                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Add New Images</label>
                    <input type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="images[]" multiple accept="image/*">
                    <div id="newImagePreviewContainer" class="image-preview-container"></div>
                </div>

                <button type="submit" class="w-full mt-4 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Update Post
                </button>
            </div>
        </form>
    </div>

    <!-- Link Modal remains the same -->
    <div id="linkModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <!-- ... modal content ... -->
    </div>
</div>