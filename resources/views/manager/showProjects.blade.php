@include('manager.layouts.app')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-md-2 dailog-box" >
                <a class="btn btn-primary" href="{{ url('/manager/project/create') }}">Create Project</a>
                </div>

            </div>
            <!-- end page title -->
            <br>
            <div class="row">
                <div class="col-md-8 dailog-box" >
                    <div class="project_table card">
                            
                    </div>
                </div> 
                <div class="col-md-4 dailog-box" >
                    <div class="card">
                        <div class="card-body">
                            <h6>Team Members</h6>
                            <form method="POST" action='' class="form-horizontal" id="add_member" name="add_member">
                                @csrf
                                
                                <div class="members">
                                    
                                </div>
                            </form>
                            <br>
                            <br>
                            <h6>Added Members to <span = id="prj_name"></span></h6>
                            <div class="added_members">
                                 
                            </div>
                        </div>
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

<!-- JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    getData();
    function getData() {
        $.ajax({
           type:'GET',
           url:"<?php echo url('manager/getProjects/');  ?>",
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
              //alert(data);
              var html = '<table class="table table-striped"><thead><tr><th>Project name</th><th>Description</th><th style="width:120px;">Start Date</th><th style="width:120px;">End Date</th><th>Status</th></tr></thead>';
              if(data.success)
              {
                    var myarray = ["name","description","start_date","end_date"];
                   
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
                                html+='<td title="Show team members"><a href="#" onclick="showTeam('+id+',\''+pname+'\')">'+value1+'</a></td>';
                            }
                            if(key1 == "status" && value1 == 1)
                            {
                                html+='<td><div class="btn btn-success">Active</div></td>';
                            }
                            else if(key1 == "status")
                            {
                                html+='<td><div class="btn btn-danger">Inactive</div></td>';
                            } 
                        });
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
    
</style>
</body>

</html>
