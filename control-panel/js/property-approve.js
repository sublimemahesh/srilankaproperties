$(document).ready(function () {
    
    $('.toggle-approvation').click(function (e) {
        
        e.preventDefault();

        let property = $(this).attr("data-id");
        let type = $(this).attr("toggler");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to ${type == 0 ? "Approve" : "Reject"} this proprty!`,
            icon:  `${type == 0 ? "info" : "warning"}`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${type == 0 ? "Approve" : "Reject"} it!`
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/property.php",
                    type: "POST",
                    data: {
                        property,
                        option: type == 0 ? "APPROVEPROPERTY" : "REJECTPROPERTY"
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data == "approved") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Approved!',
                                text: 'Proprty has been approved.',
                                showConfirmButton: false,
                                timer: 1500
                              });
                              setTimeout(() => { 
                                  location.reload();
                              }, 1000);
                        }
                        if (data == "rejected") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Rejected!',
                                text: 'Proprty has been rejected.',
                                showConfirmButton: false,
                                timer: 1500
                              });
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