$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function() {
    $(document).on('keyup', '.number-only', function() {
        $(this).inputFilter(function(value) {
            return /^\d*[.,]?\d{0,2}$/.test(value);
        });
    });
})();

function url(url) { return script_url + url;}

function appNotify({title = "Action", message ="Success", action = "success"} = "") {
    toastr[action](message, title, {
        closeButton: true,
        tapToDismiss: false,
    });
}

function appRequest(url, body = {}, method = 'GET') {
    return new Promise((resolve, reject) => {
        return $.ajax({
            url: url,
            type: method,
            data: body,
            success: function (data) {
                resolve(data)
            },
            error: function (error) {
                reject(error.responseJSON)
            },
        })
    })
}

$.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
            this.value = "";
        }
    });
};