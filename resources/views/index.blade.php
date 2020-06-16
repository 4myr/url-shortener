@extends('layouts.frontend')
@section('content')
    <div class="content text-center">
        <h2 class="font-weight-bold">کوتاه کننده لینک سریع</h2><br>
        <p>سرویس آنلاین و پرسرعت کوتاه کننده لینک</p>

        <div class="container pt-5 shortForm">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-9 pl-md-2 mb-5-sm">
                        <div class="form-group mb-0">
                            <input type="text" name="link" id="linkInput" class="form-control" placeholder="لینک خود را وارد کنید...">
                        </div>
                        <div class="justify-content-left" dir="ltr">
                            <div class="form-group form-inline slugForm m-0">
                                <input type="text" name="slug" id="slugStaticInput" class="form-control w-50" placeholder="{{ env('APP_URL') }}/" disabled>
                                <input type="text" autocomplete="off" name="slug" id="slugInput" class="form-control w-50" placeholder="آدرس کوتاه دلخواه">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 pr-lg-0">
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">کوتاه کن!</button>
                    </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @include('partials.features')
@endsection
