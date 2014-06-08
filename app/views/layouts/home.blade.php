<<<<<<< HEAD
@extends('layouts.main')
@section('content')

<div class="vpheight">
	<div class="home-cont">
		<div class="row sub-cont">
			<div class="large-12 medium-12 columns centered text-center" >
				Carles S. Soriano Pérez				
			</div>			
		</div>
		<div class="cover-separator">
				.
		</div>				
		<div class="row sub-cont">
			<div class="large-12 medium-12 columns text-center">
			<a href="//www.facebook.com/cssp1989" target="_blank">
				{{HTML::image('assets/imgs/iconset/PNG/facebook.png')}}
			</a>
			<a href="//github.com/Carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/github.png')}}
			</a>
			<a href="mailto:sorianoperez.carles@gmail.com" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/google.png')}}
			</a>
			<a href="//www.linkedin.com/in/carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/linkedin.png')}}
			</a>
			<a href="skype:sorianoperez.carles?call">
			{{HTML::image('assets/imgs/iconset/PNG/skype.png')}}
			</a>
			<a href="//twitter.com/Carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/twitter.png')}}
			</a>
				<!-- <?php $cat = Category::getIDCategory('Contact') ; ?>
				{{ HTML::link('categories/'.$cat->id, $cat->name) }}-->
			</div>
		</div>
	</div>
</div>
<div class="vpheight under">
	<div class="row under-cont">
		<div class="under-h large-12 medium-12 columns centered text-center" >
			Welcome to my web!				
		</div>			
	</div>
	<div class="row under-cont">
		<div class="large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-justify" >
			</br>
			Above you can find links to contact me and to check my previous works.</br>
			However, if this is not enough for you, this web is built on one of my personal projects.
			You can find my progress on it on github, in case you prefer, you can also check its live
			progress just by going to the {{ HTML::link('portal/', 'portal')}}.
			</br></br></br>
		</div>			
	</div>
	<div class="row under-cont">
		<div class="under-h large-12 medium-12 columns centered text-center" >
			About Me!				
		</div>			
	</div>
	<div class="row under-cont">
		<div class="large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-justify" >
			</br>
			As I said, most of my information related to my studies and work experience
			may be found in the links above.
			</br>
			But checking all those sites is maybe tiring, so I tried to make it simpler below.
			</br></br>
		</div>
	</div>
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered" >
			<fieldset>
			<legend>Skills and knowledge graph</legend>
				<div id="skills-graph">
				</div>
				<p>This graph is updated during my spare time, but you may get a fast idea</p>
			</fieldset>
		</div>
	</div>
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Language skills</legend>
			<canvas id="languages-chart" height="250"></canvas>	
			<div class="chart-legend">
				<ul class="languages-chart text-left">
		            <li class="l-spa">Spanish</li>
		            <li class="l-val">Valencian/Catalan</li>
		            <li class="l-eng">English</li>
		            <li class="l-fre">French</li>
		            <li class="l-dut">Dutch</li>
	        	</ul>
        	</div>

        	<div class="chart-sublegend">
        		<ul class="text-left">
        			<li>20 - A1</li>
        			<li>40 - A2</li>
        			<li>60 - B1</li>
        			<li>80 - B2</li>
        			<li>100 - C1</li>
        			<li>120 - C2</li>
        		</ul>
        	</div>
        	</fieldset>
		</div>
	</div>
	
<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Hobbies</legend>
			<canvas id="hobbies-chart"></canvas>
			<div class="chart-legend">
				<ul class="hobbies-chart text-left">
		            <li class="h-sports">Practicing sport</li>
		            <li class="h-read">Reading</li>
		            <li class="h-travel">Travelling</li>
		            <li class="h-music">Music</li>
		            <li class="h-motor">Motorbikes</li>
	        	</ul>
        	</div>
    		</fieldset>
		</div>
	</div>
	
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Me</legend>
			<canvas id="overall-chart" width="400" height="400"></canvas>
			</fieldset>
		</div>
	</div>
	
</div>
@stop
=======
@extends('layouts.main')
@section('content')

<div class="vpheight">
	<div class="home-cont">
		<div class="row sub-cont">
			<div class="large-12 medium-12 columns centered text-center" >
				Carles S. Soriano Pérez				
			</div>			
		</div>
		<div class="cover-separator">
				.
		</div>				
		<div class="row sub-cont">
			<div class="large-12 medium-12 columns text-center">
			<a href="//www.facebook.com/cssp1989" target="_blank">
				{{HTML::image('assets/imgs/iconset/PNG/facebook.png')}}
			</a>
			<a href="//github.com/Carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/github.png')}}
			</a>
			<a href="mailto:sorianoperez.carles@gmail.com" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/google.png')}}
			</a>
			<a href="//www.linkedin.com/in/carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/linkedin.png')}}
			</a>
			<a href="skype:sorianoperez.carles?call">
			{{HTML::image('assets/imgs/iconset/PNG/skype.png')}}
			</a>
			<a href="//twitter.com/Carsopre" target="_blank">
			{{HTML::image('assets/imgs/iconset/PNG/twitter.png')}}
			</a>
				<!-- <?php $cat = Category::getIDCategory('Contact') ; ?>
				{{ HTML::link('categories/'.$cat->id, $cat->name) }}-->
			</div>
		</div>
	</div>
</div>
<div class="vpheight under">
	<div class="row under-cont">
		<div class="under-h large-12 medium-12 columns centered text-center" >
			Welcome to my web!				
		</div>			
	</div>
	<div class="row under-cont">
		<div class="large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-justify" >
			</br>
			Above you can find links to contact me and to check my previous works.</br>
			However, if this is not enough for you, this web is built on one of my personal projects.
			You can find my progress on it on github, in case you prefer, you can also check its live
			progress just by going to the {{ HTML::link('portal/', 'portal')}}.
			</br></br></br>
		</div>			
	</div>
	<div class="row under-cont">
		<div class="under-h large-12 medium-12 columns centered text-center" >
			About Me!				
		</div>			
	</div>
	<div class="row under-cont">
		<div class="large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-justify" >
			</br>
			As I said, most of my information related to my studies and work experience
			may be found in the links above.
			</br>
			But checking all those sites is maybe tiring, so I tried to make it simpler below.
			</br></br>
		</div>
	</div>
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered" >
			<fieldset>
			<legend>Skills and knowledge graph</legend>
				<div id="skills-graph">
				</div>
				<p>This graph is updated during my spare time, but you may get a fast idea</p>
			</fieldset>
		</div>
	</div>
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Language skills</legend>
			<canvas id="languages-chart" height="250"></canvas>	
			<div class="chart-legend">
				<ul class="languages-chart text-left">
		            <li class="l-spa">Spanish</li>
		            <li class="l-val">Valencian/Catalan</li>
		            <li class="l-eng">English</li>
		            <li class="l-fre">French</li>
		            <li class="l-dut">Dutch</li>
	        	</ul>
        	</div>

        	<div class="chart-sublegend">
        		<ul class="text-left">
        			<li>20 - A1</li>
        			<li>40 - A2</li>
        			<li>60 - B1</li>
        			<li>80 - B2</li>
        			<li>100 - C1</li>
        			<li>120 - C2</li>
        		</ul>
        	</div>
        	</fieldset>
		</div>
	</div>
	
<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Hobbies</legend>
			<canvas id="hobbies-chart"></canvas>
			<div class="chart-legend">
				<ul class="hobbies-chart text-left">
		            <li class="h-sports">Practicing sport</li>
		            <li class="h-read">Reading</li>
		            <li class="h-travel">Travelling</li>
		            <li class="h-music">Music</li>
		            <li class="h-motor">Motorbikes</li>
	        	</ul>
        	</div>
    		</fieldset>
		</div>
	</div>
	
	<div class="row under-cont">
		<div class="chart large-offset-2 medium-offset-2 large-8 medium-8 columns centered text-center">		
			<fieldset>
			<legend>Me</legend>
			<canvas id="overall-chart" width="400" height="400"></canvas>
			</fieldset>
		</div>
	</div>
	
</div>
@stop
>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
