<x-app-layout>
    <div class="row">
        <!-- left column -->
        <div class="col-md-6 mx-auto pt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Manager</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('managers.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Branch</label>
                            <select name="branch_id" class="form-control">
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}"> {{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText">First Name</label>
                            <input type="text" class="form-control" id="exampleInputText" placeholder="Enter First Name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputText" placeholder="Enter Last Name" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email">
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