@extends('layouts.default')

@section('content')
<div ng-app='threads'>
	this is content from threads index before ui-views
    <div class="main-content column-left" ui-view="left">
    </div>
    <div class="main-content detail-right" ui-view="main">
    </div>
</div>
@stop


@section('script')
    {!! Html::script('/assets/angular/modules/threads.js') !!}
@stop