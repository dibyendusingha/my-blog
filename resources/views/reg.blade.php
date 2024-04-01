<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Register </title>
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <!-- Toster -->
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
	<!-- partial:index.partial.html -->
	<!DOCTYPE html>
	<html>

	<head>
		<title>Slide Navbar</title>
		<link rel="stylesheet" type="text/css" href="slide navbar style.css">
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		 <!-- Toster -->
		 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	</head>

	<body>
		<div class="main">
			<!-- <input type="checkbox" id="chk" aria-hidden="true"> -->

			<div class="signup">
				<form method="post" action="{{url('user-reg')}}" id="myFormReg" onsubmit="return validateForm()">
					@csrf
					<label for="chk" aria-hidden="true">Register</label>
					<input type="text" id="name" name="name" placeholder="User name" required="">
					<input type="email" id="email" name="email" placeholder="Email" required="">
					<input type="password" id="password" name="password" placeholder="Password" >
					<button type="submit">Register</button>
				</form>
				<script>
					 function validateForm() {
						var passwordInput = document.getElementById("password");
						var password = passwordInput.value;
						if (password.length < 6) {
							alert("The password field must be at least 6 characters.");
							return false; // stop form submission
						}
						else if ($("#password").val()== null || $("#password").val()== "") {
							alert("please enter password !");
							return false; // Submit the form
						}
						
					}

					$(document).ready(function() {
						$('#myFormReg').submit(function(e) {
							e.preventDefault(); // prevent default form submission
							var formData = $(this).serialize(); // serialize form data
							$.ajax({
								url: '{{ route("submit.reg") }}', // route to handle the AJAX request
								type: 'POST',
								data: formData,
								success: function(response) {
									// handle success response
									console.log(response);
									// toastr.success('registration successfully.' ,'', { timeOut: 2000 });
									// setTimeout(function() {
									// 	window.location.href = '{{ route("home") }}';
									// }, 1000);

									if (response.message === true) {
										toastr.success('Registration successfully.' ,'', { timeOut: 2000 });
										setTimeout(function() {
											window.location.href = '{{ route("home") }}';
										}, 1000);
									} else if(response.message === false) {
										toastr.error('Your email id already have login','', { timeOut: 3000 });
										// document.getElementById('name').value = "";
										// document.getElementById('email').value = "";
										// document.getElementById('password').value = "";
									}

								},
								error: function(xhr) {
									// handle error response
									console.log("hi");
								}
							});
						});
					});
				</script>

			</div>

			<div class="login">
				<!-- <form method="post" action="{{url('user-login')}}" id="myFormLog"> -->
					<!-- @csrf -->
					<label for="chk" aria-hidden="true"><a href="/login-user">Login</a></label>
					<!-- <input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit">Login</button> -->
				</form>
			</div>
		</div>


	</body>

	</html>
	<!-- partial -->

</body>

</html>