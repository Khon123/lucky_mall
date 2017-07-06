<?php
use App\Http\Controllers\Helpers\Language;
?>
{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 7px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2 class="modal-title" id="job_title" style="color:#007bb6;" ></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<h3 style="color: #0066cc"><?php echo Language::getTitleLang()=='en'?'Job Description :':'ការពិពណ៌នាការងារ :';?></h3>
						<hr>
						<p id="job_des"></p>
						<h3 style="color: #0066cc"><?php echo Language::getTitleLang()=='en'?'Job requirement :':'តម្រូវការការងារ :';?></h3>
						<hr>
						<p id="job_req"></p>
						
						<h3 style="color: #0066cc"><?php echo Language::getTitleLang()=='en'?'Contact Us':'ទំនាក់ទំនងមកពួកយើង';?></h3>
						<hr>
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
						<br>
						<br>
					
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>