function toggleDarkMode() {
    $('body').toggleClass('dark-mode');
    $('.control-sidebar').toggleClass('dark-mode');

    // Toggle icon between sun and moon based on dark mode
    const darkModeToggle = $('#dark-mode-toggle');
    const currentIcon = darkModeToggle.find('i');
    const isDarkMode = $('body').hasClass('dark-mode');

    // Update icon based on dark mode
    if (isDarkMode) {
        currentIcon.removeClass('fa-moon').addClass('fa-sun');
    } else {
        currentIcon.removeClass('fa-sun').addClass('fa-moon');
    }
}
