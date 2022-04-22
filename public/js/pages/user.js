var token = $('#token').val();
$( document ).ready(function() {

    $('#password_confirmation').on('keyup', function () {
        if ($('#password').val() == $('#password_confirmation').val()) {
            $('#password-hint').html('');
        } else
        $('#password-hint').html('Password Must be Matching').css('color', 'red');
    });

    //listing page
    if($('#UserTableList').length){
        fetchData();
        function fetchData()
        {
            var url = "user/list";
            $.ajax({
                url:url,
                success:function(data)
                {
                    $('#users').html(data);
                    $('#userTable').DataTable();
                }
            });
        }
    }

    $(document).on("click", ".deleteModal", function () {
        $('#deleteUser').data('id',$(this).data('id'));
    });

    $(document).on("click", "#deleteUser", function () {
        $('#deleteModal').modal('hide');
        var id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+token
            },
            type: "POST",
            url: base_url+"/api/user/delete",
            data:{id:id},
            success: function (data) {
                handleResponse(data);
                fetchData();
            }
        });
    });

});

var base_url = window.location.origin;

//form page
if($('#userForm').length)
{
    var id = $('input[name="id"]').val();
    $('#userForm').on( 'submit', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+token
            },
            type: "POST",
            url: base_url+"/api/user/store",
            data:$(this).serialize(),
            success: function (data) {
                handleResponse(data);
                if(id == '' && data.success == true){
                    $('#userForm')[0].reset();
                }
            }
        });
    });
}

if($('#profileForm').length)
{
    $('#profileForm').on( 'submit', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+token
            },
            type: "POST",
            url: base_url+"/api/updateprofile",
            data:$(this).serialize(),
            success: function (data) {
                handleResponse(data);
            }
        });
    });
}

if($('#passwordForm').length)
{
    $('#passwordForm').on( 'submit', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+token
            },
            type: "POST",
            url: base_url+"/api/user/changepassword",
            data:$(this).serialize(),
            success: function (data) {
                handleResponse(data);
            }
        });

    });
}

function handleResponse(data)
{
    $('#successMsg').hide();
    $('#errorMsg').hide();
    if(data.success == true){$('#successMsg').show();$('#successMsg').text(data.message);}
    else{$('#errorMsg').show();$('#errorMsg').text(data.message ? data.message : data);}
    $('html, body').animate({
        scrollTop: $(".alert").offset().top
    }, 2000);
}
