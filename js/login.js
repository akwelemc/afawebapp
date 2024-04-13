
function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    if (password === "") {
        alert('Please enter a password');
        return false;
    }

    var passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert('Password must be at least 8 characters and contain a symbol and a capital letter');
        return false;
    }

    return true;
}

// const loginForm = document.getElementById('login');
// loginForm.addEventListener('submit', ()=> {
//     event.preventDefault();
//     var isValid = validateForm();

//     if (isValid) {
//         SubmitEvent();
//     }
    
    
        
//     });

document.addEventListener('DOMContentLoaded', function() {
    var submitBtn = document.getElementById('button');

    submitBtn.addEventListener('click', function(event) {
        validateForm();
    });
});



// document.addEventListener('DOMContentLoaded', function() {
//     var form = document.getElementById('button');
//     event.preventDefault();


//     form.addEventListener('submit', function(event) {
//         // Prevent the default form submission behavior
//         event.preventDefault();

//         // Validate the form
//         var isValid = validateForm();

//         // If the form is valid, submit it
//         if (isValid) {
//             this.submit();
//         }
//     });
// });