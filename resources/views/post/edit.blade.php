<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header',['title'=>'Create'])
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
</head>
<body>
    @include('layouts.nav')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>~ Edit Post ~</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container editor-container">
        @include('post.partials.editor',[
            "editorDetails" => [
                "method" => "PATCH",
                "route" => "/post/".$post->id,
                "title" => $post->title,
                "post_preview" => $post->present()->preview,
                "tags" => $post->present()->tagString,
                "body" => $post->body
            ]
        ])
        <hr>
        <hr>
        <hr>
        <form 
            method="POST" 
            action="/post/{{ $post->id }}" 
            id="deletePostForm">

            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="form-group">
                <button type="submit" class="btn-editor btn-delete">Delete Post</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
    @include('layouts.scripts',[
        'additionalScripts' => ['post-editor.js']
    ])
    <script type="text/javascript">
        document.getElementById('deletePostForm').addEventListener('submit', function(e) {
            if (!confirm("Are you sure you want to delete \"{{ $post->title }}\"?")) {
                e.preventDefault()
            }
        })
    </script>
</body>
</html>