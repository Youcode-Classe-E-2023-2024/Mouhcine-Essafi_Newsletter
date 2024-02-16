<x-editor-layout>
    <!-- component -->
    <div class="py-12 w-full bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="action.php">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Email Subject <span class="text-red-500">*</span></label><br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="email_subject" id="email_subject" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Select Media <span class="text-red-500">*</span></label><br>
                            <select name="selected_media" class="border-2 border-gray-300 p-2 w-full" required>
                                <option value="" disabled selected>Select a media</option>
                                <!-- Add your media options dynamically here -->
                                <option value="media_id_1">Media 1</option>
                                <option value="media_id_2">Media 2</option>
                                <!-- Add more media options as needed -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Email Body</label><br>
                            <textarea name="email_body" class="border-2 border-gray-300 p-2 w-full" rows="6" placeholder="(Optional)"></textarea>
                        </div>

                        <div class="flex p-1">
                            <select class="border-2 border-gray-300 border-r p-2" name="action">
                                <option>Save and Publish</option>
                                <option>Save Draft</option>
                            </select>
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('email_body');
    </script>
</x-editor-layout>
