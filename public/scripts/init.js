document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 1000,
        once: true
    });
});

tailwind.config = {
    darkMode: 'selector',
    theme: {
        extend: {
            fontFamily: {
                barlow: ['"Barlow Condensed"', 'sans-serif'],
            },
        },
    },
};