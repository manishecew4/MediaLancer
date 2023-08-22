@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categories Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>View Sample</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendor as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                @if ($item->is_approve == 'true')
                                                    <td><label class="badge badge-success">Verified</label></td>
                                                @endif
                                                @if ($item->is_approve == 'false' || $item->is_approve == '')
                                                    <td><label class="badge badge-danger">Pending</label></td>
                                                @endif
                                                <td><a onclick="photoSample({{ $item->id }});">Sample</a> </td>
                                                <td>
                                                    <div class="form-group">

                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch1{{ $item->id }}" role="switch"
                                                                name="{{ $item->id }}"
                                                                @if ($item->is_approve == 'true') {{ 'checked' }} @endif
                                                                onclick="isApprove({{ $item->id }}, this.checked);">
                                                            <label class="custom-control-label"
                                                                for="customSwitch1{{ $item->id }}">
                                                                @if ($item->is_approve == 'true')
                                                                    {{ 'Approved' }}
                                                                @else
                                                                    {{ 'Action Required!' }}
                                                                @endif
                                                            </label>
                                                        </div>


                                                        {{-- <div class="form-check form-switch">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" role="switch"
                                                                    @if ($item->is_approve == 'true') {{ 'checked' }} @endif
                                                                    onclick="isApprove({{ $item->id }}, this.checked);"
                                                                    class="form-check-input">

                                                                @if ($item->is_approve == 'true')
                                                                    {{ 'Approved' }}
                                                                @else
                                                                    {{ 'Action Required!' }}
                                                                @endif

                                                            </label>
                                                        </div> --}}
                                                    </div>
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
@section('js')
    <script>
        const params = new URLSearchParams();

        function photoSample(req) {
            params.append("vendor_id", req);
            window.location.href = "{{ route('admin.sample') }}?" + params.toString();
        }

        function isApprove(id, isChecked) {
            console.log(id, isChecked);

            params.append("vendor_id", id);
            params.append("isApprove", isChecked);
            window.location.href = "{{ route('admin.approve') }}?" + params.toString();
        }
    </script>
@endsection
