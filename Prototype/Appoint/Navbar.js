function toggleNavbar(event) {
    const sidebar = document.getElementById('sidebar');
    const body = document.body; // Added body reference
    const toggleIcon = document.getElementById('navbar-toggle');

    // Check if the click occurred on the toggle icon or its child elements
    if (event.target === toggleIcon || toggleIcon.contains(event.target)) {
        if (sidebar.style.left === '-250px' || sidebar.style.left === '') {
            sidebar.style.left = '0';
            body.style.marginLeft = '250px'; // Added to shift content when sidebar is open
        } else {
            sidebar.style.left = '-250px';
            body.style.marginLeft = '0'; // Reset margin when sidebar is closed
        }
    }
}



function showContent(contentType) {
    // Hide all content sections
    document.getElementById('personalInfo').style.display = 'none';
    document.getElementById('medicalHistory').style.display = 'none';
    document.getElementById('dentalCharting').style.display = 'none';
    document.getElementById('paymentRecord').style.display = 'none';

    // Show the selected content section
    document.getElementById(contentType).style.display = 'block'; // Updated this line

    // Remove 'active' class from all options
    document.getElementById('options-container').querySelectorAll('.nav1 li').forEach(option => {
        option.classList.remove('active');
    });

    // Add 'active' class to highlight the selected option
    document.getElementById(contentType + '-option').classList.add('active');
}
