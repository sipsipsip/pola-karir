@extends('app')

@section('head')
    <link href="css/react-select.min.css" rel="stylesheet"/>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div id="react-render"></div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        window.user = {!! \Auth::user() !!}
        console.log(user);
        console.warn(new Date().getFullYear());
    </script>
    <script src="build/bundle.js"></script>
@endsection