 $(function () {
    $('.hapus-item').on('click', function (e) {
        e.preventDefault();

        let el = $(this);

        let route = el.data('route');

        Swal.fire({
            title: 'Hapus Data',
            text: 'Apakah anda yakin akan menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan!',
            cancelButtonText: 'Tidak!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                var formdata = document.createElement("form");
                formdata.setAttribute("method", "POST");
                formdata.setAttribute("action", route);

                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", "_token");
                hiddenField.setAttribute("value", $('meta[name="csrf-token"]').attr('content'));

                var hiddenField2 = document.createElement("input");
                hiddenField2.setAttribute("type", "hidden");
                hiddenField2.setAttribute("name", "_method");
                hiddenField2.setAttribute("value", 'DELETE')

                formdata.appendChild(hiddenField);
                formdata.appendChild(hiddenField2);
                document.body.appendChild(formdata);
                formdata.submit();
            }
        });
    });
});