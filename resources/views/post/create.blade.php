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
                <div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>~ Create Post ~</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container editor-container">
        @include('post.partials.editor',[
            "editorDetails" => [
                "method" => "POST",
                "route" => "/post"
            ]
        ])
    </div>
    @include('layouts.footer')
    @include('layouts.scripts',[
        'additionalScripts' => ['post-editor.js']
    ])
</body>
</html>