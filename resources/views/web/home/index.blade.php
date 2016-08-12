@extends('layouts.default')

@section('content')
<div ng-app='home'>
	<div class="col-sm-2 sidenav panel panel-default" ui-view="left">
      
    </div>
    <div class="col-sm-8 text-left panel panel-default" ui-view="main">
      
    </div>
    <div class="col-sm-2 sidenav panel panel-default" ui-view="right">
      
    </div>
</div>
@stop


@section('script')
    {!! Html::script('/assets/angular/modules/home.js') !!}
@stop
