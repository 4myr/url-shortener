@extends('layouts.frontend')
@section('content')

    <h2 class="font-weight-bold">کوتاه کننده لینک سریع</h2>
    <p>سرویس آنلاین و پرسرعت کوتاه کننده لینک</p>

    <div class="container w-75 pt-5">
        <form action="" method="post">
            <div class="form-inline justify-content-center">
                <div class="form-group">
                    <input type="text" name="link" id="linkInput" class="form-control" size="30" placeholder="لینک خود را وارد کنید...">
                </div>
                <div class="form-group mr-2">
                    <button type="submit" class="btn btn-primary form-control">کوتاه کن!</button>
                </div>
            </div>
            <div class="form-inline justify-content-center" dir="ltr">
                <div class="form-group slugForm">
                    <input type="text" name="slug" id="slugStaticInput" class="form-control" size="7" placeholder="{{ env('APP_URL') }}/" disabled>
                    <input type="text" autocomplete="off" name="slug" id="slugInput" class="form-control" size="7" placeholder="آدرس کوتاه دلخواه">

                </div>
            </div>
        </form>
    </div>
@endsection
