$('#change_password').change(function(){
    let status = !$(this).is(":checked");
    console.log(status);
    showChangePassword(status);
});
$('#resetForm').click(function(){
    showChangePassword(true);
});
function showChangePassword(status){
    $('#password').attr('readonly',status);
    $('#repeatPassword').attr('readonly',status); 
    $('#password').val('');
    $('#repeatPassword').val(''); 
}
$('.delete-btn').click(function(){
    let url = $(this).data('url');
    console.log(url);
    if(!confirm('Dữ liệu sẽ bị xóa vĩnh viễn. Bạn có chắc muốn xóa không?')){
        return;
    }
    window.location.href = url;
});

function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    
    reader.onload = function(){
        var imgElement = document.getElementById('preview_img');
        imgElement.style.display = 'block';
        imgElement.src = reader.result;
    };

    reader.readAsDataURL(input.files[0]);
}