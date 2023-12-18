function validateForm() {
    var fname = document.forms["registrationForm"]["fname"].value;
    var lname = document.forms["registrationForm"]["lname"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;
  
    if (fname == "" || lname == "" || password == "" || confirmPassword == "") {
      alert("Please fill in all fields.");
      return false;
    }
  
    if (password != confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
  
    if (!validatePassword(password)) {
      alert("Password must be at least 8 characters long and contain special characters and numbers.");
      return false;
    }
  
    return true;
  }
  
  function validatePassword(password) {
    var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    return regex.test(password);
  }