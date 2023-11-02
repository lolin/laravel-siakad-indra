@extends('layouts.app')

@section('title', 'Subject')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Subject</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Subject</a></div>
                    <div class="breadcrumb-item">All Subject</div>
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
                                <h4>All Subject</h4>
                                <div class="section-header-button">
                                    <a href="{{route('subject.create')}}"
                                        class="btn btn-primary">New User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="get" action="{{route('subject.index')}}">
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
                                                <th>Title</th>
                                                <th>Lecturer</th>
                                                <th>Semester</th>
                                                <th>Academic Year</th>
                                                <th>SKS</th>
                                                {{-- <th>Code</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($subjects as $key=>$subject)
                                        <tr>
                                            @if($subjects->onFirstPage())
                                            <td>{{$key+1}}
                                            @else
                                            <td>{{($subjects->currentPage()*$subjects->perPage())+$key+1}}
                                            </td>
                                            @endif
                                            <td>{{$subject->title}}</td>
                                            <td>{{$subject->lecturer->name}}</td>
                                            <td>{{$subject->semester}}</td>
                                            <td>{{$subject->academic_year}}</td>
                                            <td>{{$subject->sks}}</td>
                                            {{-- <td>{{$subject->code}}</td> --}}
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                <a href="{{route('subject.edit', $subject->id)}}" class="btn btn-xs btn-info btn-icon">
                                                <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{route('subject.destroy', $subject->id)}}" method="post" class="ml-2">

                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <button type="submit" class="btn btn-xs btn-danger btn-icon">
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
                                    {{ $subjects->withQueryString()->links() }}
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
