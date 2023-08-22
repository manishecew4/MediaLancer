@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>

                            <form class="form-inline" method="POST" action="{{ route('admin.add_category') }}">
                                @csrf
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" name="categories" class="form-control mb-2 mr-sm-2"
                                    id="inlineFormInputName2" placeholder="Categories">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                <a href="#" class="btn btn-primary mb-2 ml-5">View List</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sub Categories</h4>

                            <form class="form-inline" method="POST" action="{{ route('admin.add_sub_category') }}">
                                @csrf
                                <label class="sr-only" for="sun-cat">Sub-Categories</label>
                                <input type="text" name="sub_cat" class="form-control mb-2 mr-sm-2" id="sun-cat"
                                    placeholder="Sub Categories">

                                <label class="sr-only">Categories</label>
                                <select class="form-control mb-2 mr-sm-2" name="sub_parent">
                                    <option value="" disabled selected>Parent Cate..</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                <a href="#" class="btn btn-primary mb-2 ml-5">View List</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
