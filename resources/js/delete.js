import $ from 'jquery';

$(function () {
    // find delete class and give him event click
    $('.delete').click(function () {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Czy na pewno chcesz usunąć rekord ?',
            text: "Nie będzie możliwe jego przywrócenie !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak, Usuń to!',
            cancelButtonText: 'Nie, anuluj!',
            reverseButtons: true
        }).then((result) => {
            // Confirmed
            if (result.isConfirmed) {
                // ajax delete
                $.ajax({
                    method: "DELETE",
                    url: deleteURL + $(this).data("id")
                    // data: { id: $(this).data("id") }
                })
                    // done
                    .done(function (response) {
                        window.location.reload();
                    })
                    // fail
                    .fail(function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.responseJSON.message,
                        })
                    });
            }
        })
    })
});
