@extends('lectureExt.view-lecture-ext')
@section('session-lecture')
    @if (session('success'))
        <div class="" style="color: greenyellow">
            {{ session('success') }}
        </div>
    @endif
@endsection
