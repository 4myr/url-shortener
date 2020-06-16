@extends('layouts.frontend')
@section('headJS')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        let baseURL = '{{ env('APP_URL') }}/public'
        $(document).ready(function () {
            $('#slugInput').on('input', function () {
                let inputValue = $('#slugInput').val();

                $('#checkItem').hide();
                $('#loadingItem').hide();
                $('#closeItem').hide();

                if(inputValue.length >= 3) {
                    $.ajax({
                        type: "POST",
                        url: baseURL + "/api/checkSlug",
                        data: {slug: inputValue},
                        beforeSend: function () {
                            $('#loadingItem').show(1);
                        }
                    }).done(function (data) {
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
                    })
                }
            })
        });
    </script>
@endsection
@section('content')
    <div class="content text-center">
        <h2 class="font-weight-bold">کوتاه کننده لینک سریع</h2><br>
        <p>سرویس آنلاین و پرسرعت کوتاه کننده لینک</p>

        <div class="container pt-5 shortForm">
            <form method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9 pl-md-2 mb-5-sm">
                        <div class="form-group mb-0">
                            <input type="text" name="link" id="linkInput" class="form-control" placeholder="لینک خود را وارد کنید...">
                        </div>
                        <div class="justify-content-left" dir="ltr">
                            <div class="form-group form-inline slugForm m-0">
                                <div class="input-group">
                                    <input type="text" name="slug" id="slugStaticInput" class="form-control" placeholder="{{ env('APP_URL') }}/" disabled>
                                    <input type="text" autocomplete="off" name="slug" id="slugInput" class="form-control w-50" placeholder="آدرس کوتاه دلخواه">
                                    <span class="loading form-control-feedback" id="loadingItem" style="display: none"></span>
                                    <span class="check" id="checkItem" style="display: none"></span>
                                    <span class="close" id="closeItem" style="display: none"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 pr-lg-0">
                        <div class="form-group">
                        <button type="submit" id="shortLinkButton" class="btn btn-primary form-control">کوتاه کن!</button>
                    </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @include('partials.features')
@endsection
