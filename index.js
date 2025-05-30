let userForm = document.getElementById("registration-form");

let userEntries = [];

const saveUserForm = (event) => {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const dob = document.getElementById("dob").value;
    const terms = document.getElementById("terms").checked;

    const entry = {
        name,
        email,
        password,
        dob,
        terms
    };

    userEntries.push(entry);

    localStorage.setItem("user-entries",JSON.stringify(userEntries));
}
userForm.addEventListener("submit",saveUserForm);