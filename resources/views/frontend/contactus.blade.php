@extends('frontend.layouts.app')

@section('content')
<!-- mail -->
		<div class="mail">
			<h3>Mail Us</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>address<span>868 1st Avenue NYC.</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:info@example.com">info@example.com</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>call to us<span>(+123) 233 2362 826</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					{{ Form::open(['route' => 'frontend.sendmessage', 'class' => 'form-horizontal', 'role'=>'form', 'method' => 'post', 'id' => 'create-contact']) }}
						<div class="col-md-6 wthree_contact_left_grid">
							{!!Form::text("name", null, ["class"=>"form-control", "id"=>"name", "placeholder"=>"Your Name"])!!}
							{!!Form::email("email", null, ["class"=>"form-control", "id"=>"email", "placeholder"=>"Your Email"])!!}
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							{!!Form::text("telephone", null, ["class"=>"form-control", "id"=>"telehpone", "placeholder"=>"Your Phone Number"])!!}
							{!!Form::text("subject", null, ["class"=>"form-control", "id"=>"subject", "placeholder"=>"Your Subject"])!!}
						</div>
						<div class="clearfix"> </div>
						{!!Form::textarea("message_body", null, ["class"=>"form-control", "id"=>"message_body", "placeholder"=>"Your Message"])!!}
						{!!Form::submit("Submit")!!}
						<input type="reset" value="Clear">
					{{ Form::close() }}
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
@endsection

@section('secondary_content')
@endsection