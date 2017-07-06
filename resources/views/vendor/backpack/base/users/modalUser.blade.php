{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 7px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2 class="modal-title" id="myModalLabel" style="color: blue;">Update User</h2>
			</div>
			<div class="modal-body">
				<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
				<div class="bootstrap-iso">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<form class="form-horizontal" method="post" id="frmUser" name="frmUser">
								{{ csrf_field() }}
									<div class="form-group ">
										<label class="control-label col-sm-2 requiredField" for="name">
											Name
											<span class="asteriskField">
												*
											</span>
										</label>
										<div class="col-sm-10">
											<input class="form-control" id="name" name="name" type="text"/>
										</div>
									</div>
									<div class="form-group ">
										<label class="control-label col-sm-2 requiredField" for="email">
											Email
											<span class="asteriskField">
												*
											</span>
										</label>
										<div class="col-sm-10">
											<input class="form-control" id="email" name="email" type="text"/>
										</div>
									</div>
									<div class="form-group ">
										<label class="control-label col-sm-2" for="phone">
											Phone
										</label>
										<div class="col-sm-10">
											<input class="form-control" id="phone" name="phone" type="text"/>
										</div>
									</div>
									<div class="form-group ">
										<label class="control-label col-sm-2" for="textarea">
											address
										</label>
										<div class="col-sm-10">
											<textarea class="form-control" cols="40" id="address" name="address" rows="5"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button class="btn btn-primary " name="submit" type="submit">
												Submit
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>