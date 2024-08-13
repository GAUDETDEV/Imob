document.addEventListener('DOMContentLoaded', function() {
    const boxes = document.querySelectorAll('.box-1');

    function checkVisibility() {
        const triggerBottom = window.innerHeight / 5 * 4;

        boxes.forEach(box => {
            const boxTop = box.getBoundingClientRect().top;

            if (boxTop < triggerBottom) {
                box.classList.add('visible-1');
                box.classList.remove('hidden-1');
            } else {
                box.classList.add('hidden-1');
                box.classList.remove('visible-1');
            }
        });
    }

    window.addEventListener('scroll', checkVisibility);
    checkVisibility();
});


