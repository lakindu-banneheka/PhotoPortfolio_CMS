document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    
    form.addEventListener("submit", function(event) {
        let isValid = true;
        let errorMessage = "";

        // name
        const name = form.elements["name"].value.trim();
        if (name === "") {
            errorMessage += "Name is required.\n";
            isValid = false;
        }

        // email
        const email = form.elements["email"].value.trim();
        if (email === "") {
            errorMessage += "Email is required.\n";
            isValid = false;
        } else if (!validateEmail(email)) {
            errorMessage += "Please enter a valid email address.\n";
            isValid = false;
        }

        // phone number
        const phone = form.elements["phone"].value.trim();
        if (phone === "") {
            errorMessage += "Phone number is required.\n";
            isValid = false;
        } else if (!validatePhone(phone)) {
            errorMessage += "Please enter a valid phone number.\n";
            isValid = false;
        }

        // title
        const title = form.elements["title"].value.trim();
        if (title === "") {
            errorMessage += "Title is required.\n";
            isValid = false;
        }

        // message
        const message = form.elements["message"].value.trim();
        if (message === "") {
            errorMessage += "Message is required.\n";
            isValid = false;
        }

        
        if (!isValid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });

    // Email validation function
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    // Phone validation function
    function validatePhone(phone) {
        const re = /^[0-9]{10}$/;
        return re.test(String(phone).toLowerCase());
    }
});
