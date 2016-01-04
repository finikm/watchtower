@extends(config('watchtower.views.layouts.master'))

@section('content')

  <h1>'{{ $role->name }}' Users</h1>
  <hr/>

  {!! Form::model($role, [ 'route' => [ 'watchtower.role.user.update', $role->id ], 'class' => 'form-horizontal']) !!}
  {!! Form::hidden('id', $role->id) !!}

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <h2 class="panel-title"><i class="fa fa-user fa-lg"></i> Current Users <small>({{$users->count()}})</small></h2>
        </div>
        
        <div class="panel-body">
          @foreach($users->chunk(6) as $c)
            @foreach ($c as $u)
            <div class="col-md-2 col-sm-3 col-xs-4">
            <label class="checkbox-inline" title="{{ $u->slug }}">
              <input type="checkbox" name="slug[]" value="{{$u->id}}" checked=""> {{ $u->name }}
            </label>
            </div>
            @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <h2 class="panel-title"><i class="fa fa-user"></i> Available Users <small>({{$available_users->count()}})</small></h2>
        </div>
        
        <div class="panel-body">
          @foreach($available_users->chunk(6) as $chunk)
            @foreach ($chunk as $au)
            <div class="col-md-2 col-sm-3 col-xs-4">
            <label class="checkbox-inline" title="{{ $au->slug }}">
              <input type="checkbox" name="slug[]" value="{{$au->id}}"> {{ $au->name }}
            </label>
            </div>
            @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-3">
          {!! Form::submit('Update Users', ['class' => 'btn btn-primary form-control']) !!}
      </div>    
  </div>

  {!! Form::close() !!}

@endsection