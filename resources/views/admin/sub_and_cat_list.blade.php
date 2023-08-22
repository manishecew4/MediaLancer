@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories Table</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Categories Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.cat.delete-cat', ['id' => $item->id, 'type' => 'delete']) }}">
                                                        <iconify-icon icon="icon-park-solid:delete-five"></iconify-icon>
                                                    </a>
                                                    ||
                                                    <a
                                                        href="{{ route('admin.cat.edit-cat', ['id' => $item->id, 'type' => 'edit']) }}">
                                                        <iconify-icon icon="bx:edit"></iconify-icon>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sub Categories Table</h4>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Sub Categories Name</th>
                                            <th>Parent Categories</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_categories as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ App\Models\Category::find($item->category_id)->name }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.subcat.delete-cat', ['id' => $item->id, 'type' => 'delete']) }}">
                                                        <iconify-icon icon="icon-park-solid:delete-five"></iconify-icon>
                                                    </a>
                                                    ||
                                                    <a
                                                        href="{{ route('admin.subcat.edit-cat', ['id' => $item->id, 'parent_id' => $item->category_id, 'type' => 'edit']) }}">
                                                        <iconify-icon icon="bx:edit"></iconify-icon>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
