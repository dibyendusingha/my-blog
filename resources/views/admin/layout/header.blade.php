<?php 
use Illuminate\Support\Facades\Auth;
//$user_name = "hi";//admin()->user()->name; 
 $user_name = session()->get('username');
 $user_id = session()->get('userid');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!---- DataTable  -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <scripy type="javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></scripy>

    <!-- Toster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Add SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="../../index.html"><img src="{{asset('admin/assets/images/logo.svg')}}" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="{{asset('admin/assets/images/faces/face15.jpg')}}" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">SUPER-ADMIN</h5>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/home">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="#"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>

                    <ul class="navbar-nav navbar-nav-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="{{asset('admin/assets/images/faces/face15.jpg')}}" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{$user_name}}</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <!-- <h6 class="p-3 mb-0">Admin Profile</h6> -->
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item preview-item" 
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                   
                                    <div class="preview-item-content">
                                        <form id="logout-form"  action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       </form>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->

            @yield('content')

            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- Plugin js for this page -->
    <script src="{{asset('admin/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin/assets/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script>
        $('#myTablea').DataTable();
    </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- page css  -->
    <style>
        .table-responsive thead th {
            color: #fc424a;
        }

        .table-responsive tbody td {
            color: #ffffff;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check for success message
            @if(Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "timeOut": 3000
            };
            toastr.success("{{ session('success') }}");
            @endif

            // Check for error message
            @if(Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "timeOut": 3000
            };
            toastr.error("{{ session('error') }}");
            @endif

            // Check for validation errors
            @if($errors-> any())
            toastr.options = {
                "closeButton": true,
                "timeOut": 3000
            };

            @foreach($errors-> all() as $error)
            toastr.error("{{ $error }}");
            @endforeach
            @endif
        });
    </script>
    <style>
        .select2-selection.select2-selection--single {
            height: 48px;
        }
    </style>

     <script>
        function isValidEmail(email) {
          // You can use a regular expression or any other validation method here
          // For simplicity, this example just checks for a basic email format
          return /\S+@\S+\.\S+/.test(email);
        }

        // Function to validate mobile number format
        function isValidMobile(mobile) {
          // You can use a regular expression or any other validation method here
          // For simplicity, this example just checks for a 10-digit number
          return /^\d{10}$/.test(mobile);
        }
      function validateForm() {
        // alert("inthefun");
        // Your validation logic here
        if ($("#name").val()== null || $("#name").val()== "") {
          alert("please enter post name !");
          return false; // Submit the form
        }


        // Validate Image upload (optional, depends on your requirements)
        var fileUpload = $("input[name='image']").val();
        if (fileUpload == "") {
          alert("Please upload an image!");
          return false;
        }

        // Validate Description
        var description = $("#description").val();
        if (description == null || description == "") {
          alert("Please enter post Description!");
          return false;
        }

        // Validate Status (optional, depends on your requirements)
        var status = $("#status").val();
        if (status == null || status == "") {
          alert("Please select the status!");
          return false;
        }
          return true; // Prevent form submission
        
      }
    </script>

    <script>
        function performSearch() {
        // Get input element and filter value
        var input = document.getElementById("searchInput");
        var filter = input.value.toUpperCase();

        // Get table rows
        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (var i = 1; i < rows.length; i++) { // starting from 1 to skip the header row
                var shouldDisplay = false;
                var cells = rows[i].getElementsByTagName("td");
                
                // Loop through all cells in the current row
                for (var j = 0; j < cells.length; j++) {
                var cellText = cells[j].innerText || cells[j].textContent;
                
                // Check if the cell text matches the search query
                if (cellText.toUpperCase().indexOf(filter) > -1) {
                    shouldDisplay = true;
                    break;
                }
                }

                // Display or hide the row based on the search result
                rows[i].style.display = shouldDisplay ? "" : "none";
            }
        }
    </script>

   
</body>

</html>