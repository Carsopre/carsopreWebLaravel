@extends('layouts.main')
@section('content')

<div class="vpheight">
	<div class="home-cont">
		<div class="row sub-cont">
			<div class="large-6 medium-6 columns centered text-right" >
				<?php $cat = Category::getIDCategory('Portfolio') ; ?>
				{{ HTML::link('categories/'.$cat->id, $cat->name) }}
				
			</div>
			<div class="large-6 medium-6 columns centered" >
				<?php $cat = Category::getIDCategory('Curriculum') ; ?>
				{{ HTML::link('categories/'.$cat->id, $cat->name) }}
			</div>
		</div>
		<div class="cover-separator">
				.
		</div>				
		<div class="row sub-cont">
			<div class="large-12 medium-12 columns text-center">
				<?php $cat = Category::getIDCategory('Contact') ; ?>
				{{ HTML::link('categories/'.$cat->id, $cat->name) }}
			</div>
		</div>
	</div>
</div>
@stop
