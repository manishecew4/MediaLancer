@extends('layouts.vendor')

@section('content')


<!-- tum code karna -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Full Name">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Phone">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Address">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Location</label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Select City</option>
                    <option value="1">Kolkata</option>
                    <option value="2" disabled>Delhi</option>
                    <option value="3" disabled>Mumbai</option>
                </select>
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Landmark</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Landmark">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">PIN</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter PIN">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Discription</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Discription">
            </div>
            <div class="mb-3 col-sm-12 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Choose Profile Image ">
            </div>
        </div>
        <button type="button" class="btn btn-primary">Save</button>
    </div>
</div>


@endsection