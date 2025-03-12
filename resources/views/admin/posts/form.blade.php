<div class="sm:col-span-2">
    <label for="body" class="block text-sm font-medium text-gray-700">Contenu de l'article</label>
    <div class="mt-1">
        <textarea id="editor" name="body" rows="20"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('body', isset($post) ? $post->body : '') }}</textarea>
    </div>
    @error('body')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tinymce@5/skins/content/default/content.min.css" rel="stylesheet">
<style>
    .tox-tinymce {
        border-radius: 0.375rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 500,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush
