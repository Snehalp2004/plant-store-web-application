// signin_signup.js
$(document).ready(function() {
    // Sign In Form Submission
    $("#signinForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = $(this).serializeArray(); // Serialize form data
        formData.push({name: "action", value: "signin"}); // Add action parameter
        $.post("signin_signup.php", formData, function(response) {
            alert(response); // Display response from PHP script
            // Handle success or error
        });
    });

    // Sign Up Form Submission
    $("#signupForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = $(this).serializeArray(); // Serialize form data
        formData.push({name: "action", value: "signup"}); // Add action parameter
        $.post("signin_signup.php", formData, function(response) {
            alert(response); // Display response from PHP script
            // Handle success or error
        });
    });
});
