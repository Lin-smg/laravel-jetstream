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

                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Room No</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $doctor)
                        <tr>
                            <th scope="row">
                                <img src="doctorimage/{{$doctor->image}}" style="width: 50px; height: 50px;"/>    
                            </th>
                            <th scope="row">{{$doctor->name}}</th>
                            <th scope="row">{{$doctor->phone}}</th>
                            <th scope="row">{{$doctor->speciality}}</th>
                            <td scope="row">{{$doctor->room}}</td>

                            <td>
                                <a href="{{url('updatedoctor', $doctor->id)}}" class="btn btn-primary" >Edit</a>
                                
                                <a href="{{url('delete_doctor', $doctor->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                
                            </td>
                            
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
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