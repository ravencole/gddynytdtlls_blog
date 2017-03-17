<script src="/js/app.js"></script>
@if(isset($additionalScripts))
    @foreach($additionalScripts as $script)
        <script src="/js/{{ $script }}"></script>
    @endforeach
@endif