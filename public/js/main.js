function confirmDelete(formId) {
    Swal.fire({
        title: "آیا مطمئن هستید؟",
        text: "بعد از حذف این آیتم دیگر قابل بازیابی نیست!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "بله حذف کن!",
        cancelButtonText: "انصراف",
    }).then((result) => {
        if (result.isConfirmed) {
            //console.log(formId);
            document.getElementById(formId).submit();
            Swal.fire({
                title: "حذف شد!",
                text: "آیتم با موفقیت حذف شد.",
                icon: "success"
            });
        }
    });
}
