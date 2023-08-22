@extends('layouts.vendor')

@section('css')
    <style>
        input[type=number].no-spinner::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .borderTheme {
            border: 1px solid #CED4DA;
        }

        .noLeftBorder {
            border-left: none !important;
        }

        .customTab .nav-item {
            width: 33.3%;
            display: flex;
            justify-content: center;
        }

        .customTab .nav-item .nav-link {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }

        .half_width {
            width: 48% !important;
        }
    </style>
@endsection
@section('content')
    <div class="main-panel">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Photographer</h4> <p class="card-title" style="color: rgb(20, 232, 20);" id="PHOTO_MSG"></p>

                            <div class="customTab">
                                <ul class="nav nav-tabs borderTheme" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active noLeftBorder" data-toggle="tab" href="#tabs-11"
                                            role="tab">Basic</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-22" role="tab">Standard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-33" role="tab">Premium</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-11" role="tabpanel">
                                        <form class="forms-sample" id="photo_basic">
                                            @csrf
                                            <input type="hidden" name="basic_id" value="@if (isset($photo['basic'][0])) value="{{ $photo['basic'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Basic">
                                            <input type="hidden" name="f_type" value="photo">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($photo['basic'][0])) value="{{ $photo['basic'][0]->price }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($photo['basic'][0]))
{{ $photo['basic'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control" id="maxDelvTime"
                                                    placeholder="Max Delivery Time"
                                                    @if (isset($photo['basic'][0])) value="{{ $photo['basic'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" name="support_info" class="form-control"
                                                    id="exampleInputConfirmPassword1" placeholder="Supporting Text"
                                                    @if (isset($photo['basic'][0])) value="{{ $photo['basic'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-22" role="tabpanel">
                                        <form class="forms-sample" id="photo_standard">
                                            @csrf
                                            <input type="hidden" name="standard_id" value="@if (isset($photo['standard'][0])) value="{{ $photo['standard'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Standard">
                                            <input type="hidden" name="f_type" value="photo">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($photo['standard'][0])) value="{{ $photo['standard'][0]->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($photo['standard'][0]))
{{ $photo['standard'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control" id="maxDelvTime"
                                                    placeholder="Max Delivery Time"
                                                    @if (isset($photo['standard'][0])) value="{{ $photo['standard'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" name="support_info" class="form-control"
                                                    id="exampleInputConfirmPassword1" placeholder="Supporting Text"
                                                    @if (isset($photo['standard'][0])) value="{{ $photo['standard'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-33" role="tabpanel">
                                        <form class="forms-sample" id="photo_premium">
                                            @csrf
                                            <input type="hidden" name="premium_id" value="@if (isset($photo['premium'][0])) value="{{ $photo['premium'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Premium">
                                            <input type="hidden" name="f_type" value="photo">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($photo['premium'][0])) value="{{ $photo['premium'][0]->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($photo['premium'][0]))
{{ $photo['premium'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control"
                                                    id="maxDelvTime" placeholder="Max Delivery Time"
                                                    @if (isset($photo['premium'][0])) value="{{ $photo['premium'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" name="support_info" class="form-control"
                                                    id="exampleInputConfirmPassword1" placeholder="Supporting Text"
                                                    @if (isset($photo['premium'][0])) value="{{ $photo['premium'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <button type="button" id="submitPhotoForms"
                                        class="btn btn-primary mr-2">Submit</button>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Videographer</h4><p class="card-title" style="color: rgb(20, 232, 20);" id="VIDEO_MSG"></p>
                            <div class="customTab">
                                <ul class="nav nav-tabs borderTheme" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active noLeftBorder" data-toggle="tab" href="#tabs-1"
                                            role="tab">Basic</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Standard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Premium</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <form class="forms-sample" id="video_basic">
                                            @csrf
                                            <input type="hidden" name="basic_id" value="@if (isset($video['basic'][0])) value="{{ $video['basic'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Basic">
                                            <input type="hidden" name="f_type" value="video">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($video['basic'][0])) value="{{ $video['basic'][0]->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($video['basic'][0]))
{{ $video['basic'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control"
                                                    id="maxDelvTime" placeholder="Max Delivery Time"
                                                    @if (isset($video['basic'][0])) value="{{ $video['basic'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" name="support_info" class="form-control"
                                                    id="exampleInputConfirmPassword1" placeholder="Supporting Text"
                                                    @if (isset($video['basic'][0])) value="{{ $video['basic'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <form class="forms-sample" id="video_standard">
                                            @csrf
                                            <input type="hidden" name="standard_id" value="@if (isset($video['standard'][0])) value="{{ $video['standard'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Standard">
                                            <input type="hidden" name="f_type" value="video">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($video['standard'][0])) value="{{ $video['standard'][0]->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($video['standard'][0]))
{{ $video['standard'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control"
                                                    id="maxDelvTime" placeholder="Max Delivery Time"
                                                    @if (isset($video['standard'][0])) value="{{ $video['standard'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" class="form-control"
                                                    id="exampleInputConfirmPassword1" name="support_info"
                                                    placeholder="Supporting Text"
                                                    @if (isset($video['standard'][0])) value="{{ $video['standard'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <form class="forms-sample" id="video_premium">
                                            @csrf
                                            <input type="hidden" name="premium_id" value="@if (isset($video['premium'][0])) value="{{ $video['premium'][0]->id }}" @endif">
                                            <input type="hidden" name="p_type" value="Premium">
                                            <input type="hidden" name="f_type" value="video">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Price (₹)</label>
                                                <input type="number" name="price" class="form-control no-spinner"
                                                    id="exampleInputUsername1" placeholder="Price in ₹"
                                                    @if (isset($video['premium'][0])) value="{{ $video['premium'][0]->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="shortDesc">Short Description</label>
                                                <textarea name="shortDesc" id="shortDesc" class="form-control" cols="30" rows="10">
@if (isset($video['premium'][0]))
{{ $video['premium'][0]->srt_desc }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxDelvTime">Max Delivery Time</label>
                                                <input type="text" name="del_time" class="form-control"
                                                    id="maxDelvTime" placeholder="Max Delivery Time"
                                                    @if (isset($video['premium'][0])) value="{{ $video['premium'][0]->max_del_time }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Supporting Text</label>
                                                <input type="text" class="form-control"
                                                    id="exampleInputConfirmPassword1" name="support_info"
                                                    placeholder="Supporting Text"
                                                    @if (isset($video['premium'][0])) value="{{ $video['premium'][0]->support_txt }}" @endif>
                                            </div>

                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button> --}}
                                        </form>
                                    </div>
                                    <button type="button" id="submitVideoForms"
                                        class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col-12 p-0 overflow-hidden mb-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header d-flex aic bg-gradient-light">
                        <select class="custom-select custom-select-lg" id="category" style="width: 300px;">
                            <option selected disabled>Select Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body d-flex p-3">
                        <div class="col-6 grid-margin stretch-card border-right-lg mb-0">
                            <div class="card half_width">
                                <div class="card-body">
                                    <h4 class="card-title">Photos</h4>
                                    <p class="card-description">
                                        Upload Sample Images
                                    </p>
                                    <form class="forms-sample" action="{{ route('vendor.images') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="category" id="pC" class="category" required>
                                        <div class="field" align="left">
                                            <input type="file" id="files" name="images[]" multiple
                                                accept="image/*">
                                        </div>
                                        <div class="d-flex flex-row align-center mt-4">
                                            <button type="submit" class="btn btn-primary mr-2 ">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 grid-margin stretch-card m-0">
                            <div class="card half_width">
                                <div class="card-body">
                                    <h4 class="card-title">Videos</h4>
                                    <p class="card-description">
                                        Upload Sample Videos
                                    </p>
                                    <form class="forms-sample" action="{{ route('vendor.videos') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="category" id="vC" class="category" required>
                                        <div class="field" align="left">
                                            <input type="file" id="files" name="videos[]" multiple
                                                accept="video/mp4,video/x-m4v,video/*" />
                                        </div>
                                        <div class="d-flex flex-row align-center mt-4">
                                            <button type="submit" class="btn btn-primary mr-2 ">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#category').on('change', function() {
            // console.log('value', this.value);
            $("#vC").val(this.value);
            $("#pC").val(this.value);
        });
        // portfolio_photo
        // portfolio_video
        $("#submitPhotoForms").click(function() {

            var form1Data = $("#photo_basic").serialize();
            var form2Data = $("#photo_standard").serialize();
            var form3Data = $("#photo_premium").serialize();
            console.log(form1Data, form2Data, form3Data);
            var url = "{{ route('vendor.portfolio_photo') }}";

            AjaxDispatch(form1Data, url, 'photo');
            AjaxDispatch(form2Data, url, 'photo');
            AjaxDispatch(form3Data, url, 'photo');
        });

        $("#submitVideoForms").click(function() {

            var form1Data = $("#video_basic").serialize();
            var form2Data = $("#video_standard").serialize();
            var form3Data = $("#video_premium").serialize();

            console.log(form1Data, form2Data, form3Data);

            var url = "{{ route('vendor.portfolio_video') }}";

            AjaxDispatch(form1Data, url, 'video');
            AjaxDispatch(form2Data, url, 'video');
            AjaxDispatch(form3Data, url, 'video');
        });

        AjaxDispatch = (e, url, type) => {
            $.ajax({
                type: "POST",
                url: url,
                data: e,
                success: function(data) {
                    // Handle the response from the server
                    console.log(data);
                    var P = $("#PHOTO_MSG");
                    var V = $("#VIDEO_MSG");
                    if (data == 1) {
                        if (type == 'photo') {
                            P.empty();
                            P.css("color", "rgb(20, 232, 20)");
                            P.append('Form Save Successfully!');
                        }
                        if (type == 'video') {
                            V.empty();
                            V.css("color", "rgb(20, 232, 20)");
                            V.append('Form Save Successfully!');
                        }
                    }else{
                        if (type == 'photo') {
                            P.empty();
                            P.css("color", "red");
                            P.append('Something went wrong!');
                        }
                        if (type == 'video') {
                            V.empty();
                            V.css("color", "red");
                            V.append('Something went wrong!');
                        }
                    }
                    
                }
            });
        }
    </script>
@endsection
