<form method="POST" action="{{ $editorDetails["route"] }}">
    {{ csrf_field() }}
    {{ method_field($editorDetails["method"]) }}
    <div class="form-group">
        <label for="title">Title</label>
        <input 
            type="text" 
            name="title" 
            placeholder="watcha title..." 
            value="{{ isset($editorDetails["title"]) ? $editorDetails["title"] : "" }}"
            required
            />
    </div>
    <div class="form-group">
        <label for="post_preview">Post Preview:</label>
        <input 
            type="text" 
            name="post_preview" 
            placeholder="Defaults to the first 200 chars of the post" 
            value="{{ isset($editorDetails["post_preview"]) ? $editorDetails["post_preview"] : "" }}"
            />
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <input 
            type="text" 
            name="tags" 
            placeholder="Comma seperated tag list" 
            value="{{ isset($editorDetails["tags"]) ? $editorDetails["tags"] : "" }}"
            />
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="editor" class="form-control" name="body" required>
            {{ isset($editorDetails["body"]) ? $editorDetails["body"] : "" }}
        </textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn-editor btn-submit">Submit</button>
    </div>
</form>

<div id="mediaModal" class="media-modal--container">
    
</div>