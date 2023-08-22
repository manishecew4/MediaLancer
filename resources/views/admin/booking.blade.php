@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Booking Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                User
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Contact
                                            </th>
                                            <th>
                                                Plan
                                            </th>
                                            <th>
                                                Booking ID
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booking as $item)
                                            <tr>
                                                <td class="py-1">
                                                    <img src="../../images/faces/face1.jpg" alt="image" />
                                                </td>
                                                <td>
                                                    {{ App\Models\User::find($item->user_id)->name }}
                                                </td>
                                                <td>
                                                    {{ 'Phone: ' . App\Models\User::find($item->user_id)->phone }}
                                                    <br>
                                                    {{ 'Email: ' . App\Models\User::find($item->user_id)->email }}
                                                </td>
                                                <td>
                                                    {{ $item->plan }}
                                                </td>
                                                <td>
                                                    {{ $item->booking_id }}
                                                </td>
                                                <td>
                                                    @if ($item->is_allow == '')
                                                        <a href="{{ route('admin.booking_approve', ['id' => $item->id]) }}">
                                                            <iconify-icon icon="mdi:approve" style="color: red;"
                                                                width="32" height="32"></iconify-icon>
                                                        </a>
                                                    @elseif($item->is_allow == 'true')
                                                        <iconify-icon icon="mdi:approve" style="color: green;"
                                                            width="32" height="32"></iconify-icon>
                                                    @endif
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
