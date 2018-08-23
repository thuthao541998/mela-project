@extends('layouts.index')
@section('content')
@section('page-topic','LIST PRODUCT')
<div class="content">
    <!-- Main menu -->
    <div class="container-fluid row bg1-pattern p-t-30 p-b-30">
        <form action="/client/login" method="POST" class="wrap-form-reservation size22 m-l-r-auto">
            <h2 class="text-center m-b-10">Login form</h2>
            <div class="col-lg-12">
                <div class="form-group p-t-10">
                    <label class="txt9 control-label col-lg-3 p-t-10">Username</label>
                    <div class="col-lg-9 p-t-10">
                        <input class="form-control bo-rad-5 txt12" type="text" name="username" placeholder="Password">
                    </div>
                </div>
                <div class="form-group p-t-10">
                    <label class="txt9 control-label col-lg-3 p-t-10">Password</label>
                    <div class="col-lg-9 p-t-10">
                        <input class="form-control bo-rad-5 txt12" type="password" name="password" placeholder="Password">
                    </div>
                </div>
            </div>


            <div class="col-lg-12 row wrap-btn-booking flex-c-m m-t-13">
                <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
                    Submit
                </button>
            </div>
        </form>

    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>

@endsection