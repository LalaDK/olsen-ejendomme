<script>
	$( document ).ready(function() {
		toggleEditMode();
	});

	function toggleEditMode() {
		$($('#edit-company-information input')).prop('disabled',!$($('#edit-company-information input')).prop('disabled'))}

</script>

<style>
	#glyphicon-edit-pen {
		position:absolute;
		right:10px;
		top:6px;
	}

	#glyphicon-edit-pen span[class~='glyphicon'] {
		color:white;
		float:right;
		font-size:26px;
		-webkit-transition: all 0.2s; /* For Safari 3.1 to 6.0 */
		transition: all 0.2s;
	}

	#glyphicon-edit-pen span[class~='glyphicon']:hover {
		color:#ffdb99;
		-ms-transform: rotate(-45deg); /* IE 9 */
		-webkit-transform: rotate(-45deg); /* Chrome, Safari, Opera */
		transform: rotate(-45deg);		
	}
</style>


<div class="box">
	<div class="top">
		Firmainformation
		<div id="glyphicon-edit-pen">
		<span class="hint--right" data-hint="Tryk for at redigere"><span onClick="toggleEditMode();" class="glyphicon glyphicon-pencil"></span></span>
		</div>
	</div>
	<div class="row">
		<form role="form" action="companies/edit" method="POST" id="edit-company-information">
			<div class="col-md-6">
				<input type="hidden" name="id" value="{{ $company->id }}" />
				<input type="hidden" name="_method" value="put" />
				<div class="form-group">
					<label for="companyname">Firma navn</label>
					<input class="form-control" type="text" name="name" value="{{ $company->name }}">
				</div>
				<div class="form-group">
					<label for="address">Adresse</label>
					<input class="form-control" type="text" name="address" value="{{ $company->address }}">
				</div>
				<div class="form-group">
					<label for="phonenumber">Telefon</label>
					<input class="form-control" type="text" name="phonenumber" value="{{ $company->phonenumber }}">
				</div>
				<div class="form-group">
					<label for="fax">Fax</label>
					<input class="form-control" type="text" name="fax" value="{{ $company->fax }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="registration_number">CVR</label>
					<input class="form-control" type="text" name="registration_number" value="{{ $company->registration_number }}">
				</div>
				<div class="form-group">
					<label for="vat_number">Moms nr.</label>
					<input class="form-control" type="text" name="vat_number" value="{{ $company->vat_number }}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" type="text" name="email" value="{{ $company->email }}">
				</div>
				<div class="form-group">
					<input class="btn btn-default" type="submit" value="Gem ændringer">
				</div>
			</div>
		</form>
	</div>
</div>
