@extends('layouts.frontend')
@section('headJS')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="content text-center">
        <h2 class="font-weight-bold">کوتاه کننده لینک سریع</h2><br>
        <p>سرویس آنلاین و پرسرعت کوتاه کننده لینک</p>



        <div class="container pt-5 shortForm">
            <div class="spinner-border" style="display: none; width: 3rem; height: 3rem;" role="status" id="formLoading">
                <span class="sr-only">Loading...</span>
            </div>
            <form id="postForm" method="post">
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
            <form id="copyForm" style="display: none">
                <div class="form-group form-inline justify-content-center">
                    <input type="text" id="copyInput" dir="ltr" class="form-control text-center" size="40" placeholder="لینک ایجاد شده!" readonly>
                    <button id="copyButton" class="btn btn-primary form-control mr-md-2">کپی</button>
                    <button id="againButton" class="btn btn-secondary form-control mr-md-2">دوباره</button>
                </div>
            </form>
        </div>
    </div>
    @include('partials.features')
@endsection
