/* eslint-disable */

// SVG Plugin will find this variable on build and creates
// the sprite file in the specified path
let __svg__ = {
    path: '../img/svgs/**/*.svg',
    name: '/wp-content/themes/project-theme/assets/build/svg-sprite.svg'
};

// Load The SVG Sprite using
let svgSprite = {
    filename: '/wp-content/themes/project-theme/assets/build/svg-sprite.svg'
};

require('webpack-svgstore-plugin/src/helpers/svgxhr')(svgSprite);
