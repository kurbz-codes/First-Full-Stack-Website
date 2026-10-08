// Value getter
function getValue(id) {
    return document.getElementById(id).value.trim();
}

// Form getter
function getForm(id) {
    return document.getElementById(id);
}

// Regex constants
const userRegex = /^[a-zA-Z]{3,10}$/;
const passRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const allowedVehicleTypes = ["jdm", "classical", "muscle", "sports", "offroad", "concept"]
const allowedKeywords = ["retro", "car", "motorbike", "vintage", "custom", "drift", "racing"]

// Regex failure messages
const userRegexFail = "Username must be alphabets 3-10 characters long.";
const passRegexFail = "Password must be at least 8 characters long, include one uppercase letter and one number.";
const emailRegexFail = "Incorrect email format.";


// Sign up validation
const signupForm = getForm("sign-up");

function validateSignUp(suUser, suPassword, confirmPassword) {

    if (!userRegex.test(suUser)) {
        return userRegexFail;
    }

    if (!passRegex.test(suPassword)) {
        return passRegexFail;
    }

    if (suPassword !== confirmPassword) {
        return "Passwords are not the same.";
    }

    return null; // no errors
}

if(signupForm) {
    signupForm.addEventListener("submit", function (e) {

        // su for sign up
        const suUser = getValue("signup-username");
        const suPassword = getValue("signup-password");
        const confirmPassword = getValue("confirm-password");
        const signupError = validateSignUp(suUser, suPassword, confirmPassword);

        if (signupError) {
            e.preventDefault();
            alert(signupError);
            return;
        }

        alert("Form Submitted!");
    });
}


// Login validation
const loginForm = getForm("login");

function validateLogin(liUser, liPassword) {

    if(!userRegex.test(liUser)) {
        return userRegexFail;
    }

    if(!passRegex.test(liPassword)) {
        return passRegexFail;
    }

    return null;
}

if(loginForm) {
    loginForm.addEventListener("submit", function (e) {

        // li for login
        const liUser = getValue("login-username");
        const liPassword = getValue("login-password");
        const loginError = validateLogin(liUser, liPassword);

        if(loginError) {
            e.preventDefault();
            alert(loginError);
            return;
        }

        alert("Form Submitted!");
    });
}


// Email validation
const emailForm = getForm("email-form")

function validateEmail(email) {

    if(!emailRegex.test(email)) {
        return emailRegexFail;
    }

    return null;
}

emailForm.addEventListener("submit", function (e) {

    const email = getValue("email");
    const emailError = validateEmail(email);

    if(emailError) {
        e.preventDefault();
        alert(emailError);
        return;
    }

    alert("Form submitted!")
    emailForm.reset();
});


// Add events validation
const addEventsForm = getForm("add-events");

function validateAddEvents(vehicleType, keywords, eventDate) {

    if(!allowedVehicleTypes.includes(vehicleType.toLowerCase())) {
        return `Vehicle Types include: ${allowedVehicleTypes.join(", ")}`;
    }

    if(!allowedKeywords.includes(keywords.toLowerCase())) {
        return `Keywords include: ${allowedKeywords.join(", ")}`;
    }

    return null;
}

if(addEventsForm){
    addEventsForm.addEventListener("submit", function (e) {

        const vehicleType = getValue("vehicle-type");
        const keywords = getValue("keywords");
        const eventDate = getValue("event-date");
        const addEventsError = validateAddEvents(vehicleType, keywords, eventDate);

        if(addEventsError) {
            e.preventDefault();
            alert(addEventsError);
            return;
        }

        alert("Form submitted!")
    });
}

// Filtering on view events page
window.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("filters");

    if (!container) return;

    // Show all button first
    const allBtn = document.createElement("button");
    allBtn.textContent = "All";
    allBtn.classList.add("filter-btn", "all-btn");

    allBtn.onclick = () => {
        const url = new URL(window.location.href);
        url.searchParams.delete("vehicle_type");
        window.location.href = url;
    };

    container.appendChild(allBtn);

    // Filters after - updates with array - input validation changes with it
    allowedVehicleTypes.forEach(vt => {
        const btn = document.createElement("button");
        btn.textContent = vt;
        btn.classList.add("filter-btn");

        btn.onclick = () => {
            const url = new URL(window.location.href);
            url.searchParams.set("vehicle_type", vt);
            window.location.href = url;
        };

        container.appendChild(btn);
    });
});