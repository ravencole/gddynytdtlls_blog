<!DOCTYPE html>
<html lang="en">
    <head>
        @include("layouts.header",['title' => $title])
    </head>
    <body>
        @include("layouts.nav")

        @yield("content")

        @include("layouts.footer",[
            'additionalScripts' => isset($additionalScripts) ? $additionalScripts : []
        ])
    </body>
</html>