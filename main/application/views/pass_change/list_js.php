<script type="text/javascript">

$(function(){
    $.ajax({
        url : '<?php echo site_url('pass_change/view/'.(isset($id_user) ? $id_user : ''))?>',
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(xhr){
            xhr.onSuccess = function(data){
                window.location = '<?php echo site_url('dashboard');?>';
            }
            xhr.successMessage = 'Berhasil Mengubah Data';

            $('.form').form(xhr);
        }


    });
    
});


</script>