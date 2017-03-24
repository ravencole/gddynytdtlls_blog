/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "./";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ 17:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ }),

/***/ 3:
/***/ (function(module, exports) {

// for some reason, PrismJS just can't

Array.prototype.slice.call(document.querySelectorAll('pre.code--general')).map(function (_e) {
    var CODE = _e,
        BUILT_IN_TYPES = ['String', 'Array', 'Number', 'Math', 'Object', 'RegExp'],
        METHODS = ['join', 'log', 'readfilesync', 'map', 'reduce', 'sort', 'split', 'substr', 'tolowercase', 'parseint', 'fromcharcode'],
        BUILT_IN_TYPES_REGEXP = new RegExp('(' + BUILT_IN_TYPES.join('|') + ')', 'g'),
        METHODS_REGEXP = new RegExp('(' + METHODS.join('|') + ')', 'gi'),
        STRING_REGEXP = /((')[^']+('))/g,
        BUILT_IN_TYPES_MARKUP = '<span class="token" style="color: yellow;">$1</span>',
        METHODS_MARKUP = '<span class="token function">$1</span>',
        STRING_MARKUP = '<span class="token string">$1</span>',
        QUOTE_STATE = {
        s: 0,
        d: 0
    },


    // CHAR -> BOOL
    isPunctuation = function isPunctuation(c) {
        return "[](),".includes(c);
    },

    // CHAR -> BOOL
    isOperator = function isOperator(c) {
        return "<|+!*-:.>=?".includes(c);
    },

    // CHAR -> BOOL
    isNumber = function isNumber(c) {
        return !!c.match(/[0-9]/);
    },

    // CHAR -> BOOL
    isQuote = function isQuote(c) {
        return "'\"".includes(c);
    },


    // VOID -> BOOL
    inQuotes = function inQuotes(_) {
        return Object.values(QUOTE_STATE).reduce(function (a, b) {
            return a + b;
        }, 0) > 0;
    },


    // CHAR -> CHAR
    // 34 is the " char code
    quoteType = function quoteType(c) {
        return c.charCodeAt(0) === 34 ? "d" : "s";
    },


    // CHAR -> String
    punctuationMarkup = function punctuationMarkup(c) {
        return '<span class="token punctuation">' + c + '</span>';
    },

    // CHAR -> String
    operatorMarkup = function operatorMarkup(c) {
        return '<span class="token operator">' + c + '</span>';
    },

    // CHAR -> String
    numberMarkup = function numberMarkup(c) {
        return '<span class="token number">' + c + '</span>';
    };

    CODE.innerHTML = CODE.innerHTML.split('').map(function (char) {
        if (isQuote(char)) {
            var q = quoteType(char);

            QUOTE_STATE[q] === 0 ? QUOTE_STATE[q]++ : QUOTE_STATE[q]--;

            return char;
        }

        switch (true) {
            case inQuotes():
                return char;
            case isPunctuation(char):
                return punctuationMarkup(char);
            case isOperator(char):
                return operatorMarkup(char);
            case isNumber(char):
                return numberMarkup(char);
            default:
                return char;
        }
    }).join('').replace(STRING_REGEXP, STRING_MARKUP).replace(BUILT_IN_TYPES_REGEXP, BUILT_IN_TYPES_MARKUP).replace(METHODS_REGEXP, METHODS_MARKUP);
});

/***/ })

/******/ });