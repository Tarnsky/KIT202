<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change user Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role = "form" class="regiForm" action = "process.php" method = "post">
          <input class = "form-control" type = "text" id = "user_id" name = "user_id" hidden>
          <table class = "responsive">
            <tr class="form-group">
              <td style = "width: 40%"><label for="fname">First Name</label></td>
              <td><input class = "form-control" type="text" id="edit_fname" name ="edit_fname" ></td>
            </tr>

            <tr class="form-group">
              <td>Last Name</td>
              <td><input  class = "form-control" type="text" id="edit_lname" name = "edit_lname" ></td>
            </tr>

            <tr class="form-group">
              <td>Email</td>
              <td><input  class = "form-control" type="email" id="edit_email" name ="edit_email" ></td>
            </tr>

            <tr>
                <td>Restaurant name</td>
                <td><input class = "form-control" type="text" id="edit_Rname" name ="edit_Rname"required></td>
              </tr>
            <tr>
 
        <tr class="form-group">
          <td>Access</td>
          <td><select  class = "form-control"  name="access" id="access" >
                  <option value = "" hidden disabled selected = "selected">Select your position</option>
                  <option  class = "form-control" value="1">customer</option>
                  <option class = "form-control" value="2">Manager</option>
                  <option  class = "form-control" value="3">admin</option>
                  <option  class = "form-control" value="4">staff</option

          </select>
        </td>
      </tr>


      </table>
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
          //$('#Rname').val(data.Rname);
          $('#access').val(data.access);



          $('#edit_user_modal').modal('show');
        }
      });

    });




  });

</script>
