<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->

            @include('admin.navbar')

            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">

                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $appoint)
                        <tr>
                            <th scope="row">{{$appoint->name}}</th>
                            <th scope="row">{{$appoint->phone}}</th>
                            <th scope="row">{{$appoint->email}}</th>
                            <th scope="row">{{$appoint->doctor}}</th>
                            <td>{{$appoint->date}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->status}}</td>
                            <td>
                                @if($appoint->status!="Cancelled")
                                @if($appoint->status!="Approved")
                                <a href="{{url('approved', $appoint->id)}}" class="btn btn-success" onclick="return confirm('Are you sure to approve?')">Approve</a>
                                @endif
                                <a href="{{url('cancelled', $appoint->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to cancel?')">Cancel</a>
                                @endif
                            
                                <a href="{{url('emailview', $appoint->id)}}" class="btn btn-primary" >Send Mail</a>
                                
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.script')
</body>

</html>