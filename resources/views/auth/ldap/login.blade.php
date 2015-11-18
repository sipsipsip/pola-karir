@extends('app')


@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 login-ldap-box">
        <h3>Masuk ke aplikasi </h3>
        <hr/>
        {!!Form::open(['url'=>'auth/ldap', 'method'=>'POST'])!!}
            <div class="input-group">
              <input type="text" class="form-control" placeholder="username" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2">@kemenkeu.go.id</span>
            </div>
            <br/>

            <input type="password" name="password" class="form-control" placeholder="password"/>
            <br/>

            <input type="submit" value="Masuk" class="btn btn-fluid btn-primary"/>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
@stop