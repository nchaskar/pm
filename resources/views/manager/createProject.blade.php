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
                        <form method="POST" action='{{ url("/manager/project/create") }}' class="form-horizontal" id="create_proj" name="create_proj">
                            @csrf
                            <input type="hidden" name="owner_id" value="{{ Auth::User()->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="name" class="form-control" id="name" name="name"
                                    placeholder="Enter project name" value="{{ old('name') }}" required
                                    autofocus />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Project Description</label>
                                
                                <div class="input-group auth-pass-inputgroup">
                                    <textarea class="form-control" placeholder="Project description" name="description"  id="description" required></textarea>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter start date" value="{{ old('start_date') }}" required
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="Enter end date" value="{{ old('end_date') }}" required
                                    autofocus />
                            </div>
                            <div class="mt-2 d-grid">
                                <button type="submit" name="loginbtn" id="loginbtn"
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

    $("#create_proj").validate({
        rules: {
            name: {
                required: true,
                maxlength: 100
            },
            description: {
                required: true,
                maxlength: 10000
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
            //form.submit();
            $.ajax({
                type: "POST",
                url: '<?php {{ url("/manager/project/create"); }} ?>',
                data: $("#create_proj").serialize(),
                success: function(data) {
                  //success message mybe...
                  if(data.success)
                    {
                        alert("Project created successfully!");
                        window.location.href = "<?php echo url("/manager/project/show");  ?>";
                    }
                }
            });
        }
    });
    
</script>





