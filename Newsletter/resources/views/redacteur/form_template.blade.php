<x-editor-layout>
    <!-- component -->
    <div class="py-12 w-full bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('save_template') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Email Subject <span class="text-red-500">*</span></label><br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="email_subject" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Select Template <span class="text-red-500">*</span></label><br>
                            <select id="selected_media" name="selected_media" class="border-2 border-gray-300 p-2 w-full" required>
                                <option value="" disabled selected>Select a template</option>
                                <!-- Loop through templates to generate options dynamically -->
                                @foreach($all_media as $media)
                                    <option value="{{ $media->id }}">{{ $media->name }}</option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Email Body</label><br>
                            <textarea name="content" class="border-2 border-gray-300 p-2 w-full" rows="6" placeholder="(Optional)"></textarea>
                        </div>

                        <div class="flex p-1">
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                    <!-- Display existing templates -->
                    <div class="mt-8">
                        <h2 class="text-xl font-semibold mb-4">Existing Templates</h2>
                        <ul>
                            @foreach($templates as $template)
                                <li>{{ $template->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>
     <script>
        // Function to update template content with selected media
        document.getElementById('selected_media').addEventListener('change', function() {
            var selectedMedia = this.value;
            var contentTextarea = document.getElementById('content');
            contentTextarea.value += '<img src="' + selectedMedia + '" alt="Selected Media">';
        });
    </script>
</x-editor-layout>
