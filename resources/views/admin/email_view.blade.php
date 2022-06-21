<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

                            <form action="{{url('sendemail', $data->id)}}" method="post" >
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Greeting</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="greeting" placeholder="hello" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Body</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="body" placeholder="body letter" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Action</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="actiontext" placeholder="action" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Action Url</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="actionurl" placeholder="url" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">End Part</label>
                                    <div class="col-sm-9" style="color: black;">
                                        <input type="text" name="endpart" placeholder="" style="width: 100%; border-radius: 5px;">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>

                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success btn-fw" style="background-color: #00d25b;">Send</button>
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