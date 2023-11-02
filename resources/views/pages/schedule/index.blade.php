@extends('layouts.app')

@section('title', 'Schedule')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Schedule</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedule</a></div>
                    <div class="breadcrumb-item">All Schedule</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Schedule</h4>
                                <div class="section-header-button">
                                    <a href="{{route('schedule.create')}}"
                                        class="btn btn-primary">New User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="get" action="{{route('schedule.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subject</th>
                                                <th>Day</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room</th>
                                                <th>Attandance Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($schedules as $key=>$schedule)
                                        <tr>
                                            @if($schedules->onFirstPage())
                                            <td>{{$key+1}}
                                            @else
                                            <td>{{($schedules->currentPage()*$schedules->perPage())+$key+1}}
                                            </td>
                                            @endif
                                            <td>{{$schedule->subject->title}}</td>
                                            <td>{{$schedule->hari}}</td>
                                            <td>{{$schedule->jam_mulai}}</td>
                                            <td>{{$schedule->jam_selesai}}</td>
                                            <td>{{$schedule->ruangan}}</td>
                                            {{-- <td>{{$schedule->kode_absensi}}</td> --}}
                                            <td>
                                                <a href="{{url('generate-qrcode',$schedule->id)}}" class="btn btn-primary btn-sm"> <i class="fas fa-qrcode"></i></a>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                <a href="{{route('schedule.edit', $schedule->id)}}" class="btn btn-sm btn-info btn-icon">
                                                <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{route('schedule.destroy', $schedule->id)}}" method="post" class="ml-2">

                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $schedules->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
