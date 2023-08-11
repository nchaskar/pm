$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
    window.location = 'microsoft-edge:' + window.location;
    setTimeout(function() {
        window.open('', '_self', '').close();
        window.location =
            'https://support.microsoft.com/en-us/topic/we-recommend-viewing-this-website-in-microsoft-edge-160fa918-d581-4932-9e4e-1075c4713595?ui=en-us&rs=en-us&ad=us';
    }, 0);
}

function notificationme(type,msg){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if(type=='success'){
        toastr.success(msg);
    }else
    if(type=='error'){
        toastr.error(msg);
    }
}

// Open Change Password Form
$("#chpassword_modal").click(function(event){
    $("#chpasswordModal").modal('show');
    setTimeout(function () { $("#current_password").focus(); }, 500);
});

$(document ).ready(function() {
    if(pvalidation==1){
        $("#chpasswordModal").modal('show');
    }
});

document.querySelectorAll('#page-header-notifications-dropdown').forEach(bsDropdown)
function bsDropdown(e) {
    e.addEventListener('show.bs.dropdown',notifications)
}

function notifications() {
    $.ajax({
        url:  base_url+'/'+guard+'/view-notifications',
        type: 'POST',
        dataType: "json",
        success: function (response, status)
        {
            if(status=='success')
            {
                $(".bx-bell").removeClass("bx-tada");
                $("#notifycount").remove();
            }
        },
        error: function (xhr, desc, err)
        {

        }
    });
}

$(document).on('click','#vertical-menu-btn',function(){
    var collapse='';
    if ($('.vertical-collpsed').length > 0) {
        collapse=1;
    }else{
        collapse=0;
    }

    $.ajax({
        url:  base_url+'/'+guard+'/setmenusettings',
        type: 'POST',
        dataType: "json",
        data: {collapse:collapse},
        success: function (response, status)
        {
            if(status=='success')
            {

            }
        },
        error: function (xhr, desc, err)
        {

        }
    });
});
