const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const ASSETS = {
        js: {
            ROOT: 'resources/assets/js/',
            DEFAULT_TARGET: 'public/js/',
            assets: [
                { 
                    src: 'app.js' 
                },
                { 
                    src: 'post-editor.js' 
                },
                { 
                    src: 'about.js' 
                },
                {
                    src: 'tag-search.js'
                }
            ]
        },
        sass: {
            ROOT: 'resources/assets/sass/',
            DEFAULT_TARGET: 'public/css/',
            assets: [
                { 
                    src: 'app.scss' 
                }
            ]
        }
    }


Object.keys(ASSETS).map(assetType => {
    ASSETS[assetType].assets.map(a => {
        mix[assetType](
            ASSETS[assetType].ROOT + a.src,
            a.target ? a.target : ASSETS[assetType].DEFAULT_TARGET
        )
    })
})
