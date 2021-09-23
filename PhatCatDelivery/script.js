$(document).ready(function(){
  //When we submit the form with class = "regiForm" it will validate the field.
  $('.regiForm').on('submit', function(){
    $('#regiModal').modal('show');
    //Check the username field
    if($('#fname').val() ==""){
      $('#msg').html('Please enter your first name').css('color', 'red');
      return false;
      //Check the password field
    } else if ($('#lname').val() ==""){
      $('#msg').html('Please enter your last name').css('color', 'red');
      return false;
      //Check the email field
    }  else if ($('#email').val() ==""){
      $('#msg').html('Please enter your email').css('color', 'red');
      return false;
    }     else if ($('#password').val() == ""){
      $('#msg').html('Please enter password').css('color', 'red');
      return false;
      //Check the confirmed password field
    } else if ($('#confirm_password').val() == ""){
      $('#msg').html('Please confirm the password again').css('color', 'red');
      return false;
      //Check whether the retyped password matches the password
    } else if ($('#password').val()!=$('#confirm_password').val()){
      $('#msg').html('Password do not match').css('color', 'red');
      return false;
      //Check whether a user agreed or not
    } else {
      $('#msg').html('Successfully Completed!').css('color', 'green');
    }
  });
});

//Login Modal form
