
function ValidateForm() {
   let Name = document.getElementById('name').value;
   let pass = document.getElementById('password').value;
   let conpass = document.getElementById('confirmpassword').value;
   let phone = document.getElementById('phone').value;
   let emailid = document.getElementById('email').value;
   let address = document.getElementById('address').value;
   let dob = document.getElementById('dob').value;
   let gender = document.querySelector('input[name="gender"]:checked');
   let confirmationMessage = "";

   if (Name == null || Name === "") 
   {
       alert("Name can't be blank");
       return false;
   } 
   else if (pass == null || pass === "") {
       alert("Password can't be blank");
       return false;
   } 
   else if (pass.length < 8) {
       alert("Password must be at least 8 characters long");
       return false;
   } 
   else if (pass.toLowerCase() !== conpass.toLowerCase()) {
       alert("Passwords do not match");
       return false;
   } 
   else if (!gender) {
       alert("Please select a gender");
       return false;
   } 
   else {
       confirmationMessage = `Registration Successful\nName: ${Name}\nPassword: ${pass}\nAddress: ${address}\nGender: ${gender.value}\nDOB: ${dob}\nEmail: ${emailid}\nPhone: ${phone}`;

       let userConfirmed = confirm(confirmationMessage);

       return userConfirmed;
   }
}
