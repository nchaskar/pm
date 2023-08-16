@include('team_member.layouts.app')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- end page title -->
            <br>
            <div class="row">
                <div class="col-md-12 dailog-box" >
                    <div class="project_table card">
                            
                    </div>
                </div> 
                      
            </div> <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-head">
        <div class="close">&times;</div>
        <div class="title" style="width: 80%;float: left;"><h5>Update Task</h5></div>
    </div>
    <div class="modal-body">
        <form method="POST" action='{{ url("/employee/task/update") }}' class="form-horizontal" id="edit_task" name="edit_task">
            @csrf
            <input type="hidden" name="id" id="id" value="">
            <div class="row">
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">Task Name</label>
                    <div id="task_name"></div>
                </div>
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">Project Name</label>
                    <div id="name"></div>
                </div>
            </div>
            <div class="row">
                <div class="p-2 col-md-12">
                    <label for="name" class="form-label">Description</label>
                    <div id="description"></div>
                </div>
            </div>
            <div class="row">
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">Start date</label>
                    <div id="start_date"></div>
                </div>
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">End date</label>
                    <div id="end_date"></div>
                </div>
            </div>
            <div class="row">
                
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">Status</label><br>
                    <div id="tstatus"></div>
                </div>
                <div class="p-2 col-md-6">
                    <label for="name" class="form-label">Assigned By</label>
                    <div id="full_name"></div>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="mt-2 d-grid col-md-3">
                    <button type="button" name="" id="loginbtn" onclick="updateTask()" 
                        class="btn btn-primary btn-orange waves-effect waves-light">Update</button>
                </div>
            </div>
            
        </form>
    </div>
  </div>

</div>

<!-- JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    getData();
    function getData() {
        $.ajax({
           type:'GET',
           url:"<?php echo url('employee/getTasks/');  ?>",
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
              var html = '<table class="table table-striped"><thead><tr><th>Project</th><th>Task name</th><th>Description</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Assigned By</th><th>Action</th></tr></thead>';
              if(data.success)
              {
                    var myarray = ["task_name","description","start_date","end_date","status","name","full_name"];
                   
                    var projects = data.data;

                    html+='<tbody>';
                    $.each(projects, function( key, value ) {
                        //console.log(value.id);
                        html+='<tr>';
                        var id = value.id;
                        var pname = value.name;
                        $.each(value, function( key1, value1 ) {
                            
                            if($.inArray( key1, myarray ) > -1)
                            {
                                
                                html+='<td title=""><a href="#">'+value1+'</a></td>';
                                  
                            }
                            
                            
                        });
                        html+='<td title=""><span class="btn btn-primary" onclick="getEmpTask('+id+')">Update</span></td>';
                        html+='</tr>';
                    });
                    html+='</tbody>';
              }
              html+='</table>';
              $(".project_table").html(html);
           }
        });
        
    }

    function showTeam(id, pname)
    {
        $.ajax({
            type:'GET',
            url:"<?php echo url('manager/showTeamMembers/');  ?>"+"/"+id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data)
            {
                if(data.success)
                {
                    var users = data.data1;
                    var html = '<div class="row">';
                        html+='<div class="col-md-9 dailog-box" ><select class="form-control" id="team_member" name="user_id">';
                        html+='<option value="">Select Member</option>';
                        $.each(users, function( key, value ) {
                            //console.log(value);
                            html+='<option value="'+value.id+'">'+value.fname+' '+value.lname+'</option>';
                        });
                        html+='</select></div><input type="hidden" id="project_id" name="project_id" value="'+id+'">';
                    html+='<div class="col-md-2" ><button type="button" class="btn btn-primary" onclick="AddMember('+id+',\''+pname+'\')">Add</button></div></div>';
                    //alert(html);
                    $(".members").html(html);
                    $("#prj_name").text(pname);

                    var added_users = data.data2;
                    var html1 = '<div class="row">';
                    html1+='<div class="col-md-9 dailog-box">';
                    
                    $.each(added_users, function( key, value ) {
                        //console.log(value);
                        html1+='<div class="card"><span class="memname">'+value.fname+' '+value.lname+'<span title="Remove member" onclick="removeMember('+id+','+value.id+',\''+pname+'\')" class="remove_member">X</span></span></div>';
                    });
                    html1+='<div class="col-md-2" ></div></div>';
                    //alert(html);
                    $(".added_members").html(html1);
                }
            }
        });
    }

    function AddMember(id, pname)
    {
        $.ajax({
            type:'POST',
            url:"<?php echo url('manager/addTeamMembers/');  ?>",
            data: $("#add_member").serialize(),
            success:function(data)
            {
                if(data.success)
                {
                    showTeam(id, pname);
                }
            }
        });
    }

    function removeMember(prj_id, user_id, pname)
    {
        if (confirm("Remove Member?")) {
            $.ajax({
                type:'GET',
                url:"<?php echo url('manager/removeTeamMember/');  ?>"+"/"+prj_id+"/"+user_id,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data)
                {
                    if(data.success)
                    {
                        showTeam(prj_id, pname);
                    }
                }
            });
        }
        return false;
        
    }

    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
      modal.style.display = "none";
    }
    

    function getEmpTask(id)
    {

        $.ajax({
            type:'GET',
            url:"<?php echo url('/employee/getTasks/');  ?>"+"/"+id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data)
            {
                if(data.success)
                {
                    var myarray = ["task_name","description","start_date","end_date","status","name","full_name"];

                    $.each(data.data, function( key, value ) {
                        
                        $("#id").val(value.id);
                        var status = value.status;

                        var select = '<select class="form-control" name="status">';

                        $.each([ 'Assigned', 'In Progress', 'Completed'], function( index, value ) 
                        {
                            if(status == value)
                            {
                                select+='<option selected value="'+value+'">'+value+'</option>';
                            }
                            else
                            {
                                select+='<option value="'+value+'">'+value+'</option>';
                            }
                            
                        });
                        select+='</select>';
                        
                        $.each(value, function( key1, value1 ) {
                            
                            if($.inArray( key1, myarray ) > -1)
                            {
                                if(key1 == 'status')
                                {
                                    $("#tstatus").html(select);
                                }
                                else
                                {
                                    $("#"+key1+"").html(value1);
                                }
                                
                            }  
                        });
                    });

                    modal.style.display = "block";
                }
            }
        });
    }

    function updateTask()
    {
        //$("#loginbtn").prop('disabled', true);
        $("#loginbtn").html("<span>SUBMITTING...</span>");

        $.ajax({
            type: "POST",
            url: '<?php echo url("employee/task/update"); ?>',
            data: $("#edit_task").serialize(),
            success: function(data) {
              //success message mybe...
              if(data.success)
                {
                    alert("Task updated successfully!");
                    $("#loginbtn").html("<span>Update</span>");
                    modal.style.display = "none";
                    getData();
                }
            }
        });
    }
        

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
<style type="text/css">

.added_members .card{
    background-color: #bfc8ef;
    width: 136%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.remove_member
{
    color: red;
    font-size: 14px;
    font-weight: bold;
    float: right;
    cursor: pointer;
}

.memname
{
    float: left;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
      background-color: #fefefe;
    margin: 6% 20%;
    padding: 20px;
    border: 1px solid #888;
    width: 78%;
}

/* The Close Button */
.close {
  color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    width: 2%;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.form-label{
    font-size: 13px;
    font-weight: bold;
} 
</style>
</body>

</html>
