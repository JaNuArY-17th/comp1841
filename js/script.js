document.querySelector('.search-bar').addEventListener('focus', function () {
    this.classList.add('show-clear');
});

document.querySelector('.search-bar').addEventListener('blur', function () {
    if (this.querySelector('#search').value === '') {
        this.classList.remove('show-clear');
    }
});

document.querySelector('.search-bar #clear').addEventListener('click', function () {
    this.parentNode.querySelector('#search').value = '';
    this.parentNode.classList.remove('show-clear');
});

document.addEventListener("DOMContentLoaded", function() {
    const avatar = document.querySelector('.header-avatar');
    const hoverBox = document.querySelector('.avatar-hover-box');

    let isHoverBoxVisible = false;

    avatar.addEventListener('click', function() {
        if (!isHoverBoxVisible) {
            hoverBox.style.display = 'block';
            isHoverBoxVisible = true;
        }
    });

    document.addEventListener('click', function(event) {
        if (!hoverBox.contains(event.target) && event.target !== avatar) {
            hoverBox.style.display = 'none';
            isHoverBoxVisible = false;
        }
    });
});
