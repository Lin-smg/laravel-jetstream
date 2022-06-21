<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>
    
    @include('user.header')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointment as $appoint)
                        <tr>
                            <th scope="row">{{$appoint->doctor}}</th>
                            <td>{{$appoint->date}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->status}}</td>
                            <td>
                                <a href="{{url('cancel_appointment', $appoint->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Cancel</a>
                            </td>
                        </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>