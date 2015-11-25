@extends('app')


@section('content')
<div class="container">
    <div class="col-lg-12">
        <div id="react-render"></div>
    </div>
</div>
@endsection

@section('footer')
    <script src="build/bundle.js"></script>
@endsection