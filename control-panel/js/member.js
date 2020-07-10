$(document).ready(function() {

    $('.toggle-activation').click(function(e) {

        e.preventDefault();

        let member = $(this).attr("data-id");
        let type = $(this).attr("toggler");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to ${type == 0 ? "Active" : "Inactive"} this member!`,
            icon: `${type == 0 ? "info" : "warning"}`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${type == 0 ? "Active" : "Inactive"} this member!`
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/member.php",
                    type: "POST",
                    data: {
                        member,
                        option: type == 0 ? "ACTIVEMEMBER" : "INACTIVEMEMBER"
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data == "activated") {
                            Swal.fire('Activated!', 'Member has been activated.', 'success')
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                        if (data == "inactivated") {
                            Swal.fire('Inactivated!', 'Member has been inactivated.', 'success');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    }

                })
            }
        })

    })

})