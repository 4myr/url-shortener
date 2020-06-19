$(document).ready(function () {

    let searching;

    let throwAlert = function(type, text) {
        let title = titles[type];

        return swal({
            title: title,
            text: text,
            icon: type,
            timer: alertTime[type]
        });
    };
    $('input#slugInput').keyup(function () {
        let inputValue = $('#slugInput').val();

        $('#checkItem').hide();
        $('#loadingItem').hide();
        $('#closeItem').hide();

        if(inputValue.length >= 3) {
            if(searching) return;
            $.ajax({
                type: "POST",
                url: baseURL + "/api/checkSlug",
                data: {
                    slug: inputValue
                },
                beforeSend: function () {
                    $('#loadingItem').show();
                    searching = true;
                },
                success: function (data) {
                    if(data.ok) {
                        setTimeout(function () {
                            $('#loadingItem').hide();
                            $('#checkItem').show();
                        }, 500)

                    }
                    else {
                        $('#loadingItem').hide();
                        $('#closeItem').show();
                    }
                },
                complete: function() {
                    searching = false;
                }
            })
        }
    })

    $('#shortLinkButton').click(function(e) {
        let slug = $('#slugInput').val();
        let link = $('#linkInput').val();

        $.ajax({
            type: 'POST',
            url: baseURL + '/api/shortLink',
            data: {
                link,
                slug
            },
            beforeSend: function() {
                $('#postForm').hide();
                $('#formLoading').fadeIn(1000);
            },
            success: function(data) {
                if(data.ok) {
                    throwAlert('success', messages.success)
                    $('#copyInput').val(data.fullUrl)
                    $('#formLoading').hide();
                    $('#postForm').hide();
                    $('#copyForm').fadeIn(1000);
                }
                else {
                    throwAlert('error', data.error)
                    $('#formLoading').hide();
                    $('#postForm').fadeIn(1000);
                }
            },
            error: function() {
                throwAlert('error', messages.error)
                $('#formLoading').hide();
                $('#postForm').fadeIn(1000);
            },
            complete: function() {

            }
        })
        e.preventDefault();
    })
    $('#copyButton').click(function (e) {
        let input = $(this).prev('input');
        input.select();
        input[0].setSelectionRange(0, 99999);
        document.execCommand('copy');
        e.preventDefault();
    });
    $('#againButton').click(function(e) {
        $('#slugInput').val('');
        $('#linkInput').val('');
        $('#formLoading').hide();
        $('#copyForm').hide();
        $('#postForm').fadeIn(1000);
        e.preventDefault();

    });
    $('#screenLoading').hide();
});
