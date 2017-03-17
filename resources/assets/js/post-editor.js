tinymce.init({
    selector: '#editor',
    plugins: 'link image codesample',
    toolbar: [
        'bold italic underline strikethrough',
        'alignleft aligncenter alignright',
        'formatselect',
        'bullist numlist',
        'blockquote codesample',
        'link image'
    ].join(' | '),
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'},
        {text: 'Haskell', value: 'haskell'}
    ],
    image_caption: true
});