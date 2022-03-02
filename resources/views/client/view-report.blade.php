@extends('layouts.client')

@section('container')
    <!-- Nav  -->
    <div class="col-span-1">
        @include('includes.nav-front')
    </div>
    <!-- Menu  -->
    <div class="col-span-11">
        @include('includes.report-view-front')
    </div>
@endsection