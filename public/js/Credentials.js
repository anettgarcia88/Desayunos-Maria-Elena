

function generateUsername() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let secondLastName = document.getElementById("secondLastName").value;
    if (firstName.length >= 5 && lastName.length > 0 && secondLastName.length > 0) {
        let username = firstName.substring(0, 5).toLowerCase() + lastName.charAt(0).toLowerCase() + secondLastName.charAt(0).toLowerCase();
        document.getElementById("username").value = username;
    }
}
function generatePassword() {
    let password = Math.floor(100000 + Math.random() * 900000);
    document.getElementById("password").value = password;
}
document.getElementById('firstName').addEventListener('input', function() {
    generateUsername();
    generatePassword();
});
document.getElementById('lastName').addEventListener('input', generateUsername);
document.getElementById('secondLastName').addEventListener('input', generateUsername);



