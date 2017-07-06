<?php
	use App\Http\Controllers\Helpers\Language;
?>
@extends('frontend.layout.app')

@section('after_styles')

@stop

@section('content')
	<!-- Page Content -->
	<div class="container">
		<!-- Marketing Icons Section -->
		<div class="row" style="margin-top:2px;">
			
			@include('frontend.inc.video-image')
			
			<div class="col-sm-9" style="background:none; height:40px; color:#103a71;">
				<h3 style="margin-top:5px;"><?php echo Language::getTitleLang()=='en'?'Contact Us':'ទាក់ទងមកពួកយើង';?></h3>
			</div>
			<div class="col-sm-4">
				<h3><?php echo Language::getTitleLang()=='en'?'Contact Details':'ព័ត៌មានលំអិត';?></h3>
				<p>
					<?php echo Language::getTitleLang()=='en'?'N0 . 160 E2, Preah Sihanouk Boulevard':'160 E2, មហាវិថីព្រះសីហនុ ';?>
					<br><?php echo Language::getTitleLang()=='en'?'Beoung Keng Kong I, Khan Chamkarmon':'សង្កាត់បឹងកេងកងទី​1 ខណ្ឌចំការមន';?>
					<br><?php echo Language::getTitleLang()=='en'?'Phnom Penh, Cambodia':'ភ្នំពេញប្រទេសកម្ពុជា ';?><br>
				</p>
				<p><i class="fa fa-phone"></i>
					<abbr title="Phone"><?php echo Language::getTitleLang()=='en'?'Tel':'ទូរស័ព្ទ';?></abbr>: (+855) 63 760 743</p>
				<p><i class="fa fa-envelope-o"></i>
					<abbr title="Email"><?php echo Language::getTitleLang()=='en'?'E-mail':'អ៊ីម៉ែល';?></abbr>: <a href="kao.sokharany@lhtcapital.com">kao.sokharany@lhtcapital.com</a>
				</p>
				
				<!-- For success/fail messages -->
				<button type="submit" class="btn btn-primary"><?php echo Language::getTitleLang()=='en'?'Open with map':'បើកជាមួយផែនទី';?></button>
				<h3 style="color:red;"><?php echo Language::getTitleLang()=='en'?'Business hours':'ម៉ោងធ្វើការ';?></h3>
				<p>
					<i class="fa fa-clock-o"></i>
					<abbr title="Hours"><?php echo Language::getTitleLang()=='en'?'H':'ម៉ោង';?></abbr><?php echo Language::getTitleLang()=='en'?': Monday - Sunday: 8:00 AM to 9:00 PM':': ថ្ងៃចន្ទ - ថ្ងៃអាទិត្យ : 8:00 AM ដល់ 9:00 PM';?>
				</p>
			
			</div>
			
			<!-- Contact Form -->
			<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
			
			<div class="col-sm-5">
				<h3>E-mail</h3>
				<form method="POST" action="{{ url('/contact-us/sendMail') }}" name="sentMessage" id="contactForm" novalidate>
					{{ csrf_field() }}
					<div class="control-group form-group">
						<div class="controls">
							<label><?php echo Language::getTitleLang()=='en'?'Name:':'ឈ្មោះ:';?></label>
							<input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label><?php echo Language::getTitleLang()=='en'?'Email Address:':'អាស័យដ្ឋានអ៊ីម៉េល:';?></label>
							<input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label><?php echo Language::getTitleLang()=='en'?'Message:':'សារ:';?></label>
							<textarea rows="2" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
						</div>
					</div>
					@include('vendor.backpack.base.inc.message')
					<!-- For success/fail messages -->
					<button type="submit" class="btn btn-primary"><?php echo Language::getTitleLang()=='en'?'Submit':'ផ្ញើសារមកកាន់យើង';?></button>
				</form>
			</div>
			<!-- /.row -->
			
			<!-- Content Row -->
			<div class="row">
				<div class="col-md-4" style="margin-top:2%;">
					<a href="#" class="thumbnail">
						<img src="{{ asset('images/1499155846luckymail.JPG') }}" alt="..." style="width:100%; height:250px;">
					</a>
				</div>
				<!-- Map Column -->
				<div class="col-md-5" style="margin-top:2%;">
					<!-- Embedded Google Map -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15527.238826322044!2d103.8552592!3d13.3621056!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe144b495cd2a8758!2sLucky+Mall!5e0!3m2!1skm!2skh!4v1465948779875" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
				
				</div>
				<!-- Contact Details Column -->
			</div>
		
		</div><!-- close row--->
		<hr>
	</div><!-- /.container -->
@stop