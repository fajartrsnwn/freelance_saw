/**
 * Created by sankester on 14/05/2017.
 */

function hapus_siswa(id){
    $.ajax({
        url :  base_url + "siswa/" + "delete/"+id,
        type : "POST",
        dataType : "JSON",
        success : function(data){
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Data gagal di ubah/di hapus');
        }
    });
}
