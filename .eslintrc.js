// http://eslint.org/docs/user-guide/configuring

module.exports = {
    root: true,
    parser: 'babel-eslint',
    parserOptions: {
        sourceType: 'module'
    },
    env: {
        browser: true,
        'jest/globals': true
    },
    // https://github.com/feross/standard/blob/master/RULES.md#javascript-standard-style
    extends: 'standard',
    // required to lint *.vue files
    plugins: [
        'html',
        'jest'
    ],
    // add your custom rules here
    'rules': {
        // allow paren-less arrow functions,
        'no-new': 0,
        'arrow-parens': 0,
        "indent": ["error", 4],
        "space-before-function-paren": 0,
        "semi": [2, "always"],
        "quotes": ["error", "single"],
        // allow async-await
        'generator-star-spacing': 0,
        // allow debugger during development
        'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
        'jest/no-disabled-tests': 'warn',
        'jest/no-focused-tests': 'error',
        'jest/no-identical-title': 'error',
        'jest/valid-expect': 'error'
    }
}
