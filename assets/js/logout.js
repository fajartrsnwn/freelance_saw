
$('#sa-logout').click(function(){
    swal({
        title: "Logout",
        text: "Apakah anda yakin ?",
        type: "warning",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false
      },
      function(){
        var url=base_url+"login/log_out";
        console.log(url);
        
        $.ajax({
            url: url,
            type: "post",
            success:function(){
              swal('Anda Berhasil Logout', ' ', 'success');
              $("#delete").fadeTo("slow", 0.7, function(){
                $(this).remove();
              })
              window.location.href=base_url+"login";
    
            },
           
        });
        
      });
});    

