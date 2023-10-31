<?= $this->extend('Layout/FrontEndLayout') ?>
<?= $this->section('content') ?>
<section class="parallax_window_in" data-parallax="scroll" data-image-src="<?= base_url('frontend/assets/img/office2.jpg') ?>" data-natural-width="1400" data-natural-height="800">
	<div id="sub_content_in">
		<h1>Registration</h1>
		<!-- <p>"Usu habeo equidem sanctus no ex melius labitur conceptam eos"</p> -->
		<!-- <a href="<?= base_url('registration') ?>" type="button" class="btn_1 add_bottom_15">Register Now</a> -->
	</div>
</section>
<!-- end map-->
<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-8">
			<h3>Register Now</h3>
			<p>
				Fill the form below to submit your request
			</p>
			<div>
				<div id="message-contact"></div>
				<form id="registrationForm">
					<?= tokenField() ?>
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>First name</label>
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Middle name</label>
								<input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label>Last name</label>
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Company Name</label>
								<input type="text" id="companyName" name="companyName" class="form-control" placeholder="Company Name" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Sector</label>
								<select class="form-control" name="sector" required>
									<option disabled selected value="">--Select Sector</option>
									<option value="Pubic">Pubic</option>
									<option value="Private">Private</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Type Of Business </label>
								<select class="form-control" name="typeOfBusiness" required>
									<option disabled selected value="">--Select Type Of Business </option>
									<option value="Small">Small</option>
									<option value="Medium">Medium</option>
									<option value="Large">Large</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="">Nationality Type</label>
								<select class="form-control" name="nationalityType" onchange="switchNationality(this.value)" required>
									<option disabled selected value="">--Select Nationality</option>
									<option value="Tanzanian">Tanzanian</option>
									<option value="Foreign">Foreign</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="">Registration Body</label>
								<select class="form-control" name="registrationBody" required>
									<option disabled selected value="">--Select Registration Body</option>
									<option value="TIC">TIC</option>
									<option value="TCCIA">TCCIA</option>
									<option value="Other Bodies Registration ">Other Bodies Registration</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6" id="nida" style="display: none;">
							<div class="form-group">
								<label>NIDA Number</label>
								<input type="text" id="nidaNumber" name="nidaNumber" class="form-control" placeholder="NIDA Number" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6" id="country" style="display: none;">
							<div class="form-group">
								<label for="">Country </label>
								<select class="form-control" name="country" required>
									<option disabled selected value="">--Select Country</option>
									<option value="Algeria">Algeria</option>
									<option value="Tanzanian">Tanzanian</option>
									<option value="Canada">Canada</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="">Physical Address </label>
								<input type="text" id="physicalAddress" name="physicalAddress" class="form-control" placeholder="Physical Address">

							</div>
						</div>
						<div class="col-md-6 col-sm-6" id="passport" style="display: none;">
							<div class="form-group">
								<label>Passport Number</label>
								<input type="text" id="passportNumber" name="passportNumber" class="form-control" placeholder="Passport Number" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Phone number</label>
								<input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Phone Number" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Alternative Phone number</label>
								<input type="text" id="alternativePhoneNumber" name="alternativePhoneNumber" class="form-control" placeholder="Alternative Phone Number">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Your message</label>
								<textarea rows="5" id="message_contact" name="message_contact" class="form-control" style="height:100px;" placeholder="Hello world!"></textarea>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label>Are you human? 3 + 1 =</label>
								<input type="text" id="verify_contact" class=" form-control" placeholder=" 3 + 1 =">
							</div> -->
							<p>
								<button type="submit" class="btn btn-primary btn-sm " >
									<div class="spinner-border spinner-border-sm" id="spinner" role="status" style="display: none;"></div>
									Submit
								</button>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End col lg 9 -->
		<aside class="col-lg-4">
			<div class="box_style_2">
				<h4>Contacts info</h4>
				<p>
					The United Republic of Tanzania
					<br>
					Tanzania Investment Centre (TIC)
					<br>
					Head Office,
					<br>
					P.O. Box 938 <br><br>
					Golden Jubilee Tower, <br><br>
					1st Floor, Ohio Street, <br><br>
					Dar es Salaam <br><br>

					Email Address: info@tic.go.tz <br><br>

					Telephone: +255 734 - 989 469 <br><br>

					Phone: +255 734 989470 <br><br>

					Fax: +255 25 25 - 2504399 <br><br>

				</p>

				<hr class="styled">
				<!-- <h4>Departmens</h4>
				<ul class="contacts_info">
					
				</ul> -->
			</div>
		</aside>
		<!--End aside -->
	</div>
	<!-- end row-->
</div>
<!-- end container-->

<script>
	//switching from nida to passport number based on nationality
	function switchNationality(nationality) {
		const nida = document.querySelector('#nida')
		const passport = document.querySelector('#passport')
		const country = document.querySelector('#country')
		if (nationality == 'Tanzanian') {
			nida.style.display = 'block'
			passport.style.display = 'none'
			country.style.display = 'none'
		} else {
			nida.style.display = 'none'
			passport.style.display = 'block'
			country.style.display = 'block'
		}
	}



	//get the form
	const registrationForm = document.querySelector('#registrationForm')

	$('#registrationForm').validate()
	registrationForm.addEventListener('submit', e => {
		e.preventDefault()
		//check if all required fields are filled
		if ($('#registrationForm').valid()) {
			submitInProgress(e.submitter)
			//get the form data using form object
			const formData = new FormData(registrationForm)

			//send a fetch request to submit form data
			fetch('registration', {
				method: 'post',
				headers: {
					// 'Content-Type': 'application/json;charset=utf-8',
					"X-Requested-With": "XMLHttpRequest",
					'X-CSRF-TOKEN': document.querySelector('.token').value
				},
				body: formData
			}).then(res => res.json()).then(data => {
				submitDone(e.submitter)
				registrationForm.reset()
				console.log(data)
				const {
					token,
					msg,
					status
				} = data

				document.querySelector('.token').value = token
				swal({
					text: msg,
					//text: ,
					icon: status == 1 ? 'success' : 'warning',
				});
			})

		}
	})
</script>

<?= $this->endSection() ?>