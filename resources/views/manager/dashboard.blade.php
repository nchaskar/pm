@include('manager.layouts.app')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                            <img src="">
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                            <h4>Team Members</h4>
                            <h2 class="member_count">0</h2>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                            <img src="">
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                            <h4>Projects</h4>
                            <h2 class="project_count">0</h2>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                            <img src="">
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                            <h4>Tasks</h4>
                            <div style="text-align: right;margin-right: 30px;">Completed: <span class="complete_task_count">0</span></div>
                            <div style="text-align: right;margin-right: 30px;">Pending: <span class="pending_task_count">0</span></div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                        
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
    
    getMembers();
    function getMembers() {
        
        $.ajax({
           type:'GET',
           url:"<?php echo url('manager/getMembers'); ?>",
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
              $(".member_count").html(data.data_count);
           }
        });
        
    }
    getProjects();
    function getProjects() {
        
        $.ajax({
           type:'GET',
           url:"<?php echo url('manager/getProjects'); ?>",
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
              $(".project_count").html(data.data_count);
           }
        });
        
    }
    getTasks();
    function getTasks() {
        
        $.ajax({
           type:'GET',
           url:"<?php echo url('manager/getTasks'); ?>",
           data:'_token = <?php echo csrf_token() ?>',
           success:function(data){
              $(".complete_task_count").html(data.comp_data_count);
              $(".pending_task_count").html(data.pend_data_count);
           }
        });
        
    }
</script>
<style type="text/css">
    .inforide {
  box-shadow: 1px 2px 8px 0px #f1f1f1;
  background-color: white;
  border-radius: 8px;
  height: 125px;
}

.rideone img {
  width: 70%;
}

.ridetwo img {
  width: 60%;
}

.ridethree img {
  width: 50%;
}

.rideone {
  background-color: #6CC785;
  padding-top: 25px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridetwo {
  background-color: #9A75FE;
  padding-top: 30px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.ridethree {
  background-color: #4EBCE5;
  padding-top: 35px;
  border-radius: 8px 0px 0px 8px;
  text-align: center;
  height: 125px;
  margin-left: 15px;
}

.fontsty {
  margin-right: -15px;
}

.fontsty h2{
  color: #6E6E6E;
  font-size: 35px;
  margin-top: 15px;
  text-align: right;
  margin-right: 30px;
}

.fontsty h4{
  color: #6E6E6E;
  font-size: 25px;
  margin-top: 20px;
  text-align: right;
  margin-right: 30px;
}

.content-wrapper {
  min-height: calc(100vh - 56px);
  padding-top: 4rem;
  overflow-x: hidden;
  background: transparent;
}
</style>
</body>

</html>
