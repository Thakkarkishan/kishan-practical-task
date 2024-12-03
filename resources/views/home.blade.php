<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>

    <x-header/>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row mt-5">
                            <div class="content-wrapper">
                                <div class="page-header">
                                    <h3 class="page-title">
                                        All Employee
                                    </h3>
                                </div>
                                {{-- page design --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <a href="{{baseUrl().'/employee/add'}}" id="add_btn" class="btn btn-primary">Add New Employee
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="emp-table"
                                                    class="table table-bordered table-striped py-3 table-hover"
                                                    style="color: #212529;">
                                                    <thead>
                                                        <tr>
                                                            <th>#ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="app_data"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End page design --}}
                        </div>
                    </div>
                    <!-- Footer -->
                    <x-footer/>
                    <!-- / Footer -->
                    <script>
                        $(document).ready(function() {
                            assignData();
                        });


                        function assignData() {
                            $('.loader').show();
                            $('#emp-table').DataTable().destroy();
                            ajaxDataTableInit('<?=baseUrl()?>' + '/employee/list', 'emp-table', 0, 0, '', 1);
                            $('.loader').hide();
                        }
                    </script>

                    <script type="text/javascript">
                        $('body').on('click', 'a[id^="delete_"]', function(){

                            var id = $(this).attr('data-value');
                            var confirmation = confirm("Are you sure you want to delete this employee?");
                            if(confirmation)
                            {
                                $.ajax({
                                    url: "{{route('employee/delete')}}",
                                    type: "post",
                                    data :{
                                        _token: "{{ csrf_token() }}",
                                        id: id,
                                    },
                                    success: function(res)
                                    {
                                        alert("deleted successfully!");
                                        location.reload();
                                    },
                                    error: function()
                                    {
                                        alert("error");
                                    }

                                });
                            }
                            else
                            {
                                console.log("delete cancelled");
                            }
                        
                        });
                    </script>

                </div>
            </div>
        </body>
        </html>
