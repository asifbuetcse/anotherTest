@extends('layouts.default')

@section('content')
 {!! Html::script('/assets/angular/modules/home.js') !!}
<div ng-app='home'>
	this is content from home index before ui-views
    <div class="main-content column-left" ui-view="left">
    </div>
    <div class="main-content detail-right" ui-view="main">
    </div>
</div>
@stop


@section('script')
    {!! Html::script('/assets/angular/modules/home.js') !!}
@stop
