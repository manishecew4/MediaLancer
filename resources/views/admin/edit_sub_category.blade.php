@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sub Categories</h4>

                            <form class="form-inline" method="POST" action="{{ route('admin.subcat.edit-cat') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <label class="sr-only" for="sun-cat">Sub-Categories</label>
                                <input type="text" name="sub_cat" value="{{ $data->name }}"
                                    class="form-control mb-2 mr-sm-2" id="sun-cat" placeholder="Sub Categories">

                                <label class="sr-only">Categories</label>
                                <select class="form-control mb-2 mr-sm-2" name="sub_parent">
                                    <option value="" disabled>Parent Cate..</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $data->category_id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
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
