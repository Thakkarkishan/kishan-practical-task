var oTable;

function startLoading() {
    $.blockUI({
        message: "Please Wait...",
        css: {
            border: "none",
            padding: "20px",
            backgroundColor: "#000",
            "-webkit-border-radius": "10px",
            "-moz-border-radius": "10px",
            opacity: 0.5,
            color: "#fff",
            baseZ: 999999999999999,
            position: "fixed",
            margin: "auto",
        },
    });
}
function stopLoading() {
    $.unblockUI();
}

$(document).ready(function () {
    $(window).scroll(function () {
        var sticky = $(".content-header"),
            scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass("fixed");
        else sticky.removeClass("fixed");
    });
});

function ajaxDataTableInit(
    url,
    id,
    order = 0,
    number = -1,
    filter = "",
    cd = ""
) {
    // alert(number);
    oTable = $("#" + id).dataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        order: [[order, "desc"]],
        bFilter: true,
        bLengthChange: true,
        scrollX: false,
        language: {
            loadingRecords: "&nbsp;",
            processing: "Loading...",
            info: " _START_ - _END_  of _TOTAL_ ",
            paginate: {
                previous: "<span class='lnr lnr-chevron-left-circle'></span>",
                next: "<span class='lnr lnr-chevron-right-circle'></span>",
            },
            aria: {
                paginate: {
                    previous: "Previous",
                    next: "Next",
                },
            },
        },
        ajax: {
            url: url,
            type: "POST",
            dataType: "json",
            data: { _token: csrf(), filters: filter },
        },
        fnDrawCallback: function () {},

        pageLength: 10,
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: number,
            },
        ],
        columnDefs: [{ targets: cd, className: "truncate" }],
    });
}
