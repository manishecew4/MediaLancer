@extends('layouts.user')

@section('content')
    <section class="mt60px pr">
        <div class="py-4 text-center">
            <h1 class="mb-0 text-muted">Contact Us</h1>
        </div>
        <div class="d-flex container aic">
            <div class="col-6">
                <img src="./assets/img/contactpng.png" alt="" style="max-width:100%">
            </div>
            <div class="col">
                <form action="">
                    <div class="mb-3">
                        <label for="name_form" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_form" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="num_form" class="form-label">Mobile No.</label>
                        <input type="number" class="form-control" id="num_form" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="email_form" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email_form" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="msg_form" class="form-label">Message</label>
                        <textarea class="form-control" id="msg_form" rows="3"></textarea>
                    </div>
                    <button class="btn btn_default">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
