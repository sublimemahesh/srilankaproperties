$(document).ready(function () {
    
    $('.toggle-boost').click(function (e) {
        
        e.preventDefault();

        let property = $(this).attr("data-id");
        let type = $(this).attr("toggler");

        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to ${type == 0 ? "boost this proprty" : "stop this boost"}!`,
            icon:  `${type == 0 ? "warning" : "warning"}`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, ${type == 0 ? "Boost" : "Stop"} it!`
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "post-and-get/property.php",
                    type: "POST",
                    data: {
                        property,
                        option: type == 0 ? "BOOSTPROPERTY" : "STOPBOOST"
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data == "boosted") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Boosted!',
                                text: 'Proprty has been boosted.',
                                showConfirmButton: false,
                                timer: 1500
                              });
                              setTimeout(() => { 
                                  location.reload();
                              }, 1000);
                        }
                        if (data == "stop") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Proprty boost has been stoped.',
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