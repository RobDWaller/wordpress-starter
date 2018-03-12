# WordPress Starter Repo

A simple Wordpress starter repo that makes use of Composer to install plugins, themes and vendor packages.

In addition it makes use of vlucas/phpdotenv to help with system configuration via .env files.

Thanks must go to Chris Sherry for his excellent tutorial on modern WordPress development.

See... [https://www.phpdorset.co.uk/talks/2015/march](https://www.phpdorset.co.uk/talks/2015/march)


## Installation

Once you have pulled or cloned the git repo simply run the composer command in your CLI

```
composer update
yarn install

```

Then copy the .env.example file to .env and configure the variables within...

```
cp .env.example .env
```

And configure it as you see fit.

```
vim .env
```

Then run the initial asset build

```
yarn run dev
```



## Front-end

### Watch
To enable watching of assets and also css injections run `yarn run watch`. This will also enable Browser Sync. *Please note* when adding new scss modules, bear in mind you will need to save any other scss file (after you've created your new module) to ensure your new file is being watched and compiled.

### Cache Busting
Every time the the Laravel Mix runs it creates a file in `public/wp-content` folder called `mix-manifest.json`. This file is used to determine the path of css and js file in the project. If you run `yarn run production` the Mix will add a unique hash id to css and js filename which enables cache busting. however this is not necessary in development so when `yarn run dev` is executed, the hash id is not added.

### Code Splitting
Bundling all JavaScript into a single files does come with a potential downside: each time you change a minor detail in your application code, you must bust the cache for all users. That means all of your vendor libraries must be re-downloaded and cached.
One solution is to isolate, or extract, your vendor libraries into their own file.

* Application Code: app.js
* Vendor Libraries: vendor.js
* Manifest (webpack Runtime): manifest.js

In `webpack.mix.js` file located in the root directory of your project add:

```
mix.extract(['vue', 'axios']);
```

The extract method expects an array of vendor libraries that you wish to extract from your main bundle file. With this adjustment, the source code for both Vue and Axios will be located in `vendor.js` rather than `app.js`.

### Hot Module Reloading

Hot Module Replacement (or Hot Reloading) allows you to, not just refresh the page when a piece of JavaScript is changed, but it will also maintain the current state of the component in the browser. As an example, consider a simple counter component. When you press a button, the count goes up. Imagine that you click this button a number of times, and then update the component file. Once you do, the webpage will refresh to reflect your change, but the count will remain the same. It won't reset. This is also particularly useful when using Vue.js or React.js. To enable Hot Module Reloading you need to the following

* In `.env` set `DEV_HOT_RELOADING` to `true`.
* Open the terminal and type `yarn run hot`

### Autoloading
webpack offers the necessary facilities to make a module available as a variable in every other module required by webpack. If you're working with a particular plugin or library that depends upon a global variable, such as jQuery, ```mix.autoload()``` may prove useful to you.

```
mix.autoload({
   jquery: ['$', 'window.jQuery']
});
```

This snippet specifies that webpack should prepend var `$ = require('jquery')` to every location that it encounters either the global `$` identifier, or `window.jQuery`.


### Example Functionality

* To use the SVG Sprite:

```
<svg>
  <use xlink:href='#shape-facebook'></use>
</svg>
```

* To use a JS library, install via yarn. for example to install Vue.js run `yarn add vue` and yarn will add the following to package.json:

```
"dependencies": {
  "vue": 2.1.1,
}
```
