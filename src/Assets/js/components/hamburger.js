/**
 * This class adds a click listener to '.js-hamburger'. Once clicked this will
 * toggle the css class "body--menu-is-expanded" to document body. This class can be used
 * to style mobile menu and hamburger.
 */
export default class {
    constructor() {
        this.body = document.querySelector('body');
        this.menuTrigger = document.querySelector('.js-hamburger');
        this.menuTrigger.addEventListener('click', () => this.handleClick());
        this.menuIsExpanded = false;
    }

    handleClick(e) {
        if (this.menuIsExpanded) {
            this.body.classList.remove('body--menu-is-expanded');
            this.menuIsExpanded = false;
        } else {
            this.body.classList.add('body--menu-is-expanded');
            this.menuIsExpanded = true;
        }
    }
}
