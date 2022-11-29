<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
          <div class="container text-center bg-dark text-white p-2">
            <h2>PHP & AJAX CRUD</h2>
          </div>

          <div class="container cont-2">
              <h4>Insert Records</h4>

              <form class="fw-bold justify-content-between p-3" id="form">
                <label>Full Name: </label>
                <input type="text" id="fname" size="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Email: </label>
                <input type="text" id="email" size="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>Mobile: </label>
                <input type="text" id="mobile" size="25">&nbsp;&nbsp;&nbsp;&nbsp;

                <input type="submit" id="submit" value="ADD">
              </form>
          </div>

          <div class="container mt-3 cont-3">
          <table class="table table-success table-striped border-0 text-center">
                <thead class="border-0">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="trow">
                    
                </tbody>
            </table>

          </div>
          <div id="error-message"> this is error</div>
          <div id="success-message"></div>

          <div id="modal">
          <div id="modal-form">
        <h2>Edit form</h2>
        <table cellpadding = "10px" width="100%">
         

        </table>
                 <div id="close-btn">X</div>

            </div>
          </div>


    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        // Insert in the database using AJAX

       $("#submit").on("click",function(e){
         e.preventDefault();
         var sname = $("#fname").val();
         var semail = $("#email").val();
         var smobile = $("#mobile").val();

         if(sname == "" || semail == "" || smobile == ""){
            $("#error-message").html("All fields are required*").slideDown();
            $("#success-message").slideUp();
         }else{

         $.ajax({
           url : "crud/insert.php",
           type : "POST",
           data :{name : sname, email : semail, mobile : smobile },
           success : function(data){
            if(data == 1){
                $("#form").trigger("reset");
                $("#error-message").slideUp();
                $("#success-message").html("Data Inserted Successfully").slideDown();
                loaddata();
            }else{
                $("#error-message").html("Data not Inserted").slideDown();
                $("#success-message").slideUp();
            }

           }
         });
        }
       });

   // Select data using AJAX

   function loaddata(){
    $.ajax({
        url: "crud/select.php",
        type : "POST",
        success : function(data){
                $("#trow").html(data);
        }
    });

   }
   loaddata();

   // Delete data using Ajax

   $(document).on("click",".delete-btn",function(){
    var s_id = $(this).data("did");
    
    $.ajax({
        url : "crud/delete.php",
        type : "POST",
        data : {id : s_id},
        success : function(data){
            if(data == 1){
                $("#error-message").slideUp();
                $("#success-message").html("Data Deleted Successfully").slideDown();
                loaddata();
            }else{
                $("#error-message").html("Data not Deleted").slideDown();
                $("#success-message").slideUp();

            }
        }
    });

   });

   // update using Ajax and php
   $(document).on("click",".edit-btn",function(){
    $("#modal").show();
    var s_id = $(this).data("eid");

    $.ajax({
        url : "crud/update-select.php",
        type : "POST",
        data : {id : s_id},
        success :function(data){
            $("#modal-form table").html(data);
        }
    });
   });

   $("#close-btn").click(function(){
       $("#modal").hide();
   });

   $(document).on("click","#edit-submit",function(){
    var s_id = $("#edit-id").val();
    var s_name = $("#edit-name").val();
    var s_email = $("#edit-email").val();
    var s_mobile = $("#edit-mobile").val();
    // alert(s_id);
    // alert(s_name);
    // alert(s_email);
    // alert(s_mobile);

    
    if(s_name == "" || s_email == "" || s_mobile == ""){
        $("#error-message").html("All fields are required*").slideDown();
        $("#success-message").slideUp();
     }else{
        $.ajax({
             url : "crud/update-form.php",
              type : "POST",
              data : {id : s_id, name : s_name, email : s_email, mobile : s_mobile},
              success : function(data){
               if(data == 1){
                $("#modal").hide();
                loaddata();
                $("#error-message").slideUp();
                $("#success-message").html("Data Updated Successfully").slideDown();
               }else{
                $("#error-message").html("Data not Updated").slideDown();
                $("#success-message").slideUp();
               }
             }
      });
     }

   });


    });
</script>
</body>
</html>