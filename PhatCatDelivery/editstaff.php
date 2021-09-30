  <!-- Registration Modal Form -->

  <div class="modal fade" id="regiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Phatcat registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role = "form" class="regiForm" action = "register_engine.php" method = "post">
            <table class = "responsive">
              <tr class="form-group">
                <td style = "width: 40%"><label for="fname">First Name</label></td>
                <td><input class = "form-control" type="text" id="fname" name ="fname" required></td>
              </tr>
              <tr class="form-group">
                <td>Last Name</td>
                <td><input  class = "form-control" type="text" id="lname" name = "lname" required></td>
              </tr>
              <tr class="form-group">
                <td>Email</td>
                <td><input  class = "form-control" type="email" id="email" name ="email" required></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input class = "form-control" type="text" id="address" name ="address" required></td>
              </tr>
                <tr>
                    <td>phone number</td>
                    <td><input class = "form-control" type="number" id="phone_number" name="phone_number" required></td>
                </tr>
              <tr class="form-group">
                <td>Password</td>
                <td><input class = "form-control"  type="password" id="password" name = "password" required pattern = "(?=.*\d)(?=.*[A-Za-z]).{6,8}" title = "Must contain at least one number, one letters and between 6 and 8 characters"></td>
              </tr>
              <tr class="form-group">
                <td>Confirm Password</td>
                <td><input class = "form-control"  type="password" id="confirm_password" name = "confirm_password" required ></td>
              </tr>
              <tr class="form-group">
          </td>
        </tr>
            </table>
            <p><span id = "msg"></span></p>

            <button class = "btn btn-danger float-right" type = "submit" id = "register" name = "register">Register</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
      <p><span id = "msg"></span></p>

      <button class = "btn btn-danger float-right" type = "submit" id = "update" name = "update">Update</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
          <p class="statusMsg"></p>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
  <script>

  $(document).ready(function(){
    $('.open-edit').on('click', function(){
      var edit = $(this).attr("id");
      $('#edit_user_modal').modal('show');
      console.log(edit);
      $.ajax({
        url: "process.php",
        method: "POST",
        data: {
          edit: edit
        },
        dataType: "json",
        success: function(data) {

          $('#user_id').val(data.id);
          $('#fname').val(data.firstname);
          $('#lname').val(data.lastname);
          $('#email').val(data.email);
          $('#Rname').val(data.Rname);
          $('#access').val(data.access);



          $('#edit_user_modal').modal('show');
        }
      });

    });




  });

</script>
