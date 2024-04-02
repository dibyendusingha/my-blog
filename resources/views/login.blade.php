<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Login </title>
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
			    <form method="post" action="{{url('user-login')}}" id="myFormLog" onsubmit="return validateForm()">
					@csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" id="email" name="email" placeholder="Email" >
					<input type="password" id="password" name="password" placeholder="Password" >
					<button type="submit">Login</button>
				</form>
				<script>

					function validateForm() {

						var email = $("#email").val();
						var password = $("#password").val();
						var passwordInput = document.getElementById("password");
						var password = passwordInput.value;
						


						if (email== null || email == "") {
							alert("please enter email id !");
							return false; // Submit the form
						}

						if (password== null || password== "") {
							alert("please enter password !");
							return false; // Submit the form
						}

					}


					$(document).ready(function() {
						$('#myFormLog').submit(function(e) {
							e.preventDefault(); // prevent default form submission
							var formData = $(this).serialize(); // serialize form data
							$.ajax({
								url: '{{ route("submit.login") }}', // route to handle the AJAX request
								type: 'POST',
								data: formData,
								success: function(response) {
									// handle success response
									//console.log(response);

									if (response.message === true) {
										toastr.success('Login successfully.' ,'', { timeOut: 2000 });
										setTimeout(function() {
											window.location.href = '{{ route("home") }}';
										}, 1000);
									} else if(response.message === false) {
										toastr.error('Login unsuccessful.' ,'', { timeOut: 3000 });
										//  document.getElementById("email").value = "";
										//  document.getElementById("password").value = "";
										
										// setTimeout(function() {
										// 	window.location.href = '/';
										// }, 3000);
									}

								},
								error: function(xhr) {
									// handle error response
									console.log(xhr.responseText);
								}
							});
						});
					});
				</script>

			</div>

			<div class="login">
				<!-- <form method="post" action="{{url('user-login')}}" id="myFormLog"> -->
					<!-- @csrf -->
					<label for="chk" aria-hidden="true"><a href="/register-user">Register</a></label>
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