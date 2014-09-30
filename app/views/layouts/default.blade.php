<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>{{ $title }}</title>
<meta name="viewport" content="width=device-width">
<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

<script type="text/javascript">
	var base_url = "http://foldgram.herokuapp.com/"; // doesn't come WITH a trailing slash!
	var total_itme = "0";
</script>

{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-responsive.min.css') }}

{{ HTML::style('css/style.css') }}
{{ HTML::style('css/flexslider.css') }}

{{ HTML::script('js/jquery-1.9.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/global.js') }}
{{ HTML::script('js/jquery.validate.js') }}
{{ HTML::script('js/jquery.flexslider.js') }}
{{ HTML::script('js/jquery.limit.js') }}




<script>
	$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
	});
});			
</script>			
</head>
<body class={{ $page }}>
	<div class="container">
		<div class="row-fluid header">
			<p class="userlink">
				{{ link_to_route('login', 'Login/Register') }}
			</p>
			<div class="span4 logo">
				<a href="{{ URL::to('/') }}">
					<img class="logo" src="{{ URL::asset('img/logo.png') }}" /></a>
			</div>
			<div class="span6 menu">
				<ul>
					<li><a href="#popup" data-toggle="modal">Create Foldagram</a></li>
					<li>{{ link_to_route('pcredit', 'Purchase Credits') }}</li>
					<li>{{ link_to_route('contact', 'Contact') }}</li>
					<li>{{ link_to_route('cart', 'Cart') }}</li>
					
				</ul>
			</div>
			<div class="span2 social">
				<a href="https://www.facebook.com/TheFoldagram" target="_blank">
					<img class="facebook" src="{{ URL::to('/') }}/img/img_trans.png" />
				</a>
				<a href="https://twitter.com/thefoldagram" target="_blank">
					<img class="twit" src="{{ URL::to('/') }}/img/img_trans.png" />
				</a>
				<a href="https://pinterest.com/thefoldagram/" target="_blank">
					<img class="ping" src="{{ URL::to('/') }}/img/img_trans.png" />
				</a>
			</div>
		</div>
				
		@yield('inner-banner')

		<div class="row-fluid content">
			
			@if(Session::has('success'))
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert" type="button">×</button>
					{{ Session::get('success') }}
				</div>	
			@endif

			@if($errors->any())	
				<div class="alert alert-error alert-block">
					<button class="close" data-dismiss="alert" type="button">×</button>
					<h4>Error!</h4>  {{-- Session::get('error') --}}
					<p>The following errors have occurred:</p>
					<ul>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
					</ul>
				</div>	
			@endif

		</div>

		@yield('content')

			
		<div class="row-fluid subcribe-form">
			<div class="span12 subscribe-content">
				{{ Form::open(array('url' => 'subscribe', 'class'=>'form-inline')) }}
				{{ Form::label('something', 'Sign Up for Our Newsletter and Updates!') }}
				{{ Form::text('email', null, array('class' => 'input-large', 'placeholder' => '')) }}
				{{ Form::submit('Subscribe', array('class'=>'btn')) }}
				{{ Form::close() }}
			</div>
		</div>
		
		<div class="row-fluid footer">
			<div class="span8 footer-menu">
				<ul>
					<li>{{ link_to_route('contact', 'Contact') }}</li>
					<li>{{ link_to_route('about', 'About Us') }}</li>
					<li>{{ link_to_route('login', 'Log In')	}}</a></li>
					<li>{{ link_to_route('register', 'Register') }}</a></li>
				</ul>
			</div>
			<div class="span4 copyright">
				<h4>Foldagram is patent pending</h4>
				<p>&copy;Copyright All Encompassing Productions llc, 2012</p>
			</div>
		</div>
		</div>
	</div><!-- End Container -->

	@include('foldgram')
</body>
</html>