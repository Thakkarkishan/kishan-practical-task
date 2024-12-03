<!DOCTYPE html>
<html>
<head>
    <title>Add Employee Data</title>

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
                                        Add Employee
                                    </h3>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{baseUrl().'/employee/add-save'}}" id="employee"enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="name-label" for="name">First Name</label>
                                                    <input type="text" name="first_name" id="first_name" placeholder="Enter your first Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="name-label" for="email">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="number-label" for="number">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Code</label>
                                                    <select id="dropdown" name="code" class="form-control" required>
                                                        <option disabled selected value>Select</option>
                                                        <option value="+91">+91</option>
                                                 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="gender" value="Male" name="gender" class="custom-control-input" >
                                                        <label class="custom-control-label" for="gender">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" value="Female" name="gender" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hobby</label>
                                                      <input type="text" name="hobby" id="hobby" class="form-control" placeholder="Enter hobby" >
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea  id="address" class="form-control" name="address" placeholder="Enter your address here..."></textarea>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profile</label>
                                                    <input type="file" name="profile" id="profile" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <button type="submit" id="submit" class="btn btn-primary btn-block">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Footer -->
                        <x-footer/>



                    </div>
                </div>
            </body>
            </html>
