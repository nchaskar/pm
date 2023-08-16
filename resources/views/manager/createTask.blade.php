@include('manager.layouts.app')

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">           
            <div class="card-body pt-0" >
                <div class="auth-logo">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                </div>
                <div class="p-2 col-md-6">
                        <form method="POST" action='{{ url("/manager/project/create") }}' class="form-horizontal" id="create_task" name="create_task">
                            @csrf
                            <input type="hidden" name="status" id="status" value="Assigned">
                            <div class="mb-3">
                                <label for="name" class="form-label">Task Name</label>
                                <input type="name" class="form-control" id="task_name" name="task_name"
                                    placeholder="Enter task name" value="{{ old('task_name') }}" required
                                    autofocus />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Task Description</label>
                                
                                <div class="input-group auth-pass-inputgroup">
                                    <textarea class="form-control" placeholder="Task description" name="description" id="description" required></textarea>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Assign Task</label>
                                
                                <div class="input-group auth-pass-inputgroup" id="team_members">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Project</label>
                                
                                <div class="input-group auth-pass-inputgroup" id="my_projects">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    placeholder="Enter start date" value="" required
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="Enter end date" value="" required
                                    autofocus />
                            </div>
                            <div class="mt-2 d-grid">
                                <button type="submit" name="loginbtn" id="loginbtn" onclick="createTask()" 
                                    class="btn btn-primary btn-orange waves-effect waves-light">Create</button>
                            </div>
                            
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery.validator.addMethod("greaterThan", 
    function(value, element, params) {

        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }

        return isNaN(value) && isNaN($(params).val()) 
            || (Number(value) > Number($(params).val())); 
    },'Must be greater than start date.');

    $("#create_task").validate({
        rules: {
            task_name: {
                required: true,
                maxlength: 100
            },
            description: {
                required: true,
                maxlength: 10000
            },
            assigned_to: {
                required: true
            },
            project_id: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true,
                greaterThan: start_date
            }

        },
        
        submitHandler: function(form) {
            $("#loginbtn").prop('disabled', true);
            $("#loginbtn").html("<span>SUBMITTING...</span>");

            $.ajax({
                type: "POST",
                url: '<?php {{ url("/manager/task/create"); }} ?>',
                data: $("#create_task").serialize(),
                success: function(data) {
                  //success message mybe...
                  if(data.success)
                    {
                        alert("Task created successfully!");
                        window.location.href = "<?php echo url("/manager/tasks/show"); ?>";
                    }
                }
            });
        }
    });

    getMembers();
    function getMembers() {
        $.ajax({
            type:'GET',
            url:"<?php echo url('manager/getMembers/');  ?>",
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data)
            {
                if(data.success)
                {
                    var users = data.data;
                    var html = '';
                        html+='<select class="form-control" id="assigned_to" name="assigned_to">';
                        html+='<option value="">Select Member</option>';
                        $.each(users, function( key, value ) 
                        {
                            html+='<option value="'+value.id+'">'+value.fname+' '+value.lname+'</option>';
                        });
                        html+='</select>';
                    
                    $("#team_members").html(html);
                    //$("#prj_name").text(pname);

                }
            }
        });
        
    }

    getProjects();
    function getProjects() {
        $.ajax({
            type:'GET',
            url:"<?php echo url('manager/getProjects/');  ?>",
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data)
            {
                if(data.success)
                {
                    var users = data.data;
                    var html = '';
                        html+='<select class="form-control" id="project_id" name="project_id">';
                        html+='<option value="">Select Project</option>';
                        $.each(users, function( key, value ) 
                        {
                            html+='<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        html+='</select>';
                    
                    $("#my_projects").html(html);
                    //$("#prj_name").text(pname);

                }
            }
        });
        
    }
    /*
    function createProject()
    {
        $.ajax({
            type: "POST",
            url: '<?php {{ url("/manager/project/create"); }} ?>',
            data: $("#create_proj").serialize(),
            success: function() {
              //success message mybe...
            }
        });
    }
    */
</script>





