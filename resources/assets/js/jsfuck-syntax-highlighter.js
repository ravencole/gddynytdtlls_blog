// for some reason, PrismJS just can't

Array
    .prototype
    .slice
    .call(document.querySelectorAll('pre.code--general'))
    .map(_e => {
        const CODE = _e,
              BUILT_IN_TYPES = [
                'String',
                'Array',
                'Number',
                'Math',
                'Object',
                'RegExp'
              ],
              METHODS = [
                'join',
                'log',
                'readfilesync',
                'map',
                'reduce',
                'sort',
                'split',
                'substr',
                'tolowercase',
                'parseint',
                'fromcharcode'
              ],

              BUILT_IN_TYPES_REGEXP = new RegExp(`(${BUILT_IN_TYPES.join('|')})`,'g'),
              METHODS_REGEXP = new RegExp(`(${METHODS.join('|')})`,'gi'),
              STRING_REGEXP = /((')[^']+('))/g,

              BUILT_IN_TYPES_MARKUP = `<span class="token" style="color: yellow;">$1</span>`,
              METHODS_MARKUP = `<span class="token function">$1</span>`,
              STRING_MARKUP = `<span class="token string">$1</span>`,

              QUOTE_STATE = {
                s:0,
                d:0
              },

              // CHAR -> BOOL
              isPunctuation = c => "[](),".includes(c),
              // CHAR -> BOOL
              isOperator = c => "<|+!*-:.>=?".includes(c),
              // CHAR -> BOOL
              isNumber = c => !!c.match(/[0-9]/),
              // CHAR -> BOOL
              isQuote = c => "'\"".includes(c),
              
              // VOID -> BOOL
              inQuotes = _ => Object.values(QUOTE_STATE).reduce((a,b)=>a+b,0)>0,

              // CHAR -> CHAR
              // 34 is the " char code
              quoteType = c => c.charCodeAt(0) === 34 ? "d":"s",

              // CHAR -> String
              punctuationMarkup = c => `<span class="token punctuation">${c}</span>`,
              // CHAR -> String
              operatorMarkup = c => `<span class="token operator">${c}</span>`,
              // CHAR -> String
              numberMarkup = c => `<span class="token number">${c}</span>`



        CODE.innerHTML = CODE.innerHTML
            .split('')
            .map(char => {
                if (isQuote(char)) {
                    const q = quoteType(char)

                    QUOTE_STATE[q] === 0 ? 
                        QUOTE_STATE[q]++ :
                        QUOTE_STATE[q]--

                    return char
                }

                switch(true) {
                    case inQuotes():
                        return char
                    case isPunctuation(char):
                        return punctuationMarkup(char)
                    case isOperator(char):
                        return operatorMarkup(char)
                    case isNumber(char):
                        return numberMarkup(char)
                    default:
                        return char
                }
            })
            .join('')
            .replace(STRING_REGEXP, STRING_MARKUP)
            .replace(BUILT_IN_TYPES_REGEXP, BUILT_IN_TYPES_MARKUP)
            .replace(METHODS_REGEXP, METHODS_MARKUP)
    })

