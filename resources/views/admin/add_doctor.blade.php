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
        <!-- partial:partials/_navbar.html -->

        @include('admin.navbar')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="container" align="center" style="padding-top: 50px;">


                    <div class="row justify-content-center">

                        <div class="col-md-6">

                            <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Doctor Name</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="name" placeholder="enter doctor name" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="phone" placeholder="enter phone number" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Speciality</label>
                                    <div class="col-sm-9" style="color: black;">

                                        <select name="speciality" style="width: 100%; border-radius: 5px;">
                                            <option>--Select--</option>
                                            <option value="skin">skin</option>
                                            <option value="heart">heart</option>
                                            <option value="eye">eye</option>
                                            <option value="nose">nose</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Room No</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="number" name="room" placeholder="enter room number" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Doctor Image</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="file" name="file" placeholder="Enter Doctor Name" style="width: 100%; border-radius: 5px; color:white;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>

                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success btn-fw" style="background-color: #00d25b;">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- main-panel ends -->
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.script')


</body>

</html>