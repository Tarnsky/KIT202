<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Participant Details</h5>
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
              <td>Gender</td>
              <td><input  type="radio" id="edit_gender" name = "edit_gender" value = "female" >Female
                <input   type="radio" id="edit_gender" name = "edit_gender" value = "male">Male
                <input   type="radio" id="edit_gender" name = "edit_gender" value = "other">Other
              </td>
            </tr>

            <tr class="form-group">
              <td>Select a race</td>
              <td><select  class = "form-control" name="edit_race" id="edit_race" >
                <option  class = "form-control" value = "" hidden disabled selected = "selected">Select your race</option>
                <option  class = "form-control" value="5k">Fun Run 5k</option>
                <option  class = "form-control" value="half">Half Marathon</option>
                <option  class = "form-control"  value="full">Full Marathon</option>

              </select>
            </td>
          </tr>

          <tr class="form-group">
            <td>Email</td>
            <td><input  class = "form-control" type="email" id="edit_email" name ="edit_email" ></td>
          </tr>

          <tr class="form-group">
            <td>Age Group</td>
            <td><select  class = "form-control"  name="edit_division" id="edit_division" >
              <option value = "" hidden disabled selected = "selected">Select your age group</option>
              <option class = "form-control" value="kids">under 18</option>
              <option  class = "form-control" value="ya">18-30</option>
              <option  class = "form-control"  value="adults">30-50</option>
              <option  class = "form-control" value="seniors">50+</option>
            </select>
          </td>
        </tr>
        <tr class="form-group">
          <td>Access</td>
          <td><select  class = "form-control"  name="access" id="access" >
            <option value = "" hidden disabled selected = "selected">Select access level</option>
            <option class = "form-control" value="1">1</option>
            <option  class = "form-control" value="2">2</option>

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
          $('#gender').val(data.gender);
          $('#race').val(data.race);
          $('#email').val(data.email);
          $('#division').val(data.age_group);
          $('#access').val(data.access);



          $('#edit_user_modal').modal('show');
        }
      });

    });




  });

</script>
