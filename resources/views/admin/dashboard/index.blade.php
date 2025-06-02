@extends('admin.main.index')

@section('content')

    @can('admin')
        @include('admin.dashboard.admin')
    @endcan

    @can('student')
        @include('admin.dashboard.student')
    @endcan
@endsection


