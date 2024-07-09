<x-app-layout>
    <div class="row">
        <div class="col-10  mt-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Managers</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(function () {
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('managers.index') }}",
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'phone', name: 'phone'},
                        {data: 'branch', name: 'branch'},
                        {data: 'action', name: 'action'},
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>