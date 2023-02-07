function openNav() {
    document.getElementsByClassName('js-main-nav')[0].style.height = '588px';
    document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'block';
}
function closeNav() {
    document.getElementsByClassName('js-main-nav')[0].style.height = '0';
    document.getElementsByClassName('js-navbar__close-icon')[0].style.display = 'none';
    document.getElementsByClassName('js-navbar__burger-icon')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__logo--white')[0].style.display = 'block';
    document.getElementsByClassName('js-navbar__logo--black')[0].style.display = 'none';
}