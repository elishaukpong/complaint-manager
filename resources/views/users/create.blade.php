<x-app-layout>
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 mx-auto pt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('branches.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">Name</label>
                            <input type="text" class="form-control" id="exampleInputText" placeholder="Enter Name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputAddress">Address</label>
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter Address" name="address">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputCity">City</label>
                            <input type="text" class="form-control" id="exampleInputCity" placeholder="Enter City" name="city">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputState">State</label>
                            <input type="text" class="form-control" id="exampleInputState" placeholder="Enter State" name="state">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPhone">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Phone" name="phone">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->

    </div>
</x-app-layout>