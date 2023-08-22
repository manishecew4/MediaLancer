@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories</h4>
                            <form class="form-inline" method="POST" action="{{ route('admin.cat.edit-cat') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <label class="sr-only" for="inlineFormInputName2">Name</label>
                                <input type="text" value="{{ $data->name }}" name="categories"
                                    class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Categories">
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
