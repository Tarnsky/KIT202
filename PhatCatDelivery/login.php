
<!-- Login Modal Form -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p class="statusMsg"></p>
        <form class="loginForm" id = "login_form" method="post">
          <label for="email">Email</label>
          <input class = "form-control" type="email" name="login_email" id = "login_email">
          <label for="password">Password</label>
          <input class = "form-control" type="password" name="login_password"  id= "login_password">
        </form>
      </table>

      <button class = "btn btn-danger float-right" type = "submit" id = "login_button" name = "login_button">Login</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
  </div>
  <div class="modal-footer">
  </div>
</div>
</div>
</div>
<script type="text/javascript">
$('#login_button').click(function(){
 event.preventDefault();
 console.log('button clicked');
 if($('#login_email').val() == "" ||$('#login_password').val() == "" ){
   $('.statusMsg').html('<span style="color:red;">You have to enter your email or password. Please try again.</span>');
 } else {

   $.ajax({
    url: "login_engine.php",
    method: "POST",
    data:  $("#login_form").serialize(),
    beforeSend: function (){
      $('.statusMsg').html('<span style="color:green;">Loading process...</span>');
    },
    success: function (response){
     if(response == 'ok'){
       $('.statusMsg').html('<span style="color:green;">We are logging into your account..Wait a second.. </span>');
      setTimeout(' window.location.href = "index.php"; ',500);

   } else{
      $('.statusMsg').html('<span style="color:red;">'+response+'</span>');
    }
    }
  });
}});
</script>
?>
