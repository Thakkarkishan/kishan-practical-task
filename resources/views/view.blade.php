<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee Data</title>

    <x-header/>
    <style type="text/css">
        .note
        {
            color: red;
        }
    </style>
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
                                        Edit Employee
                                    </h3>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="{{baseUrl().'/employee/edit'}}" id="employee"enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="name-label" for="name">First Name</label>
                                                    <input type="text" name="first_name" id="first_name" placeholder="Enter your first Name" class="form-control" value="{{$empData[0]->first_name}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="name-label" for="email">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" class="form-control" value="{{$empData[0]->last_name}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label id="number-label" for="number">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$empData[0]->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Code</label>
                                                    <select id="dropdown" name="code" class="form-control" required>
                                                        <option disabled value>Select</option>
                                                        <option value="+91" @if($empData[0]->code == '+91') selected @endif>+91</option>
                                                 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="{{$empData[0]->mobile}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="gender" value="Male" name="gender" class="custom-control-input" @if($empData[0]->gender == 'Male') checked @endif>
                                                        <label class="custom-control-label" for="gender">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" value="Female" name="gender" class="custom-control-input"  @if($empData[0]->gender == 'Female') checked @endif>
                                                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Hobby</label>
                                                      <input type="text" name="hobby" id="hobby" class="form-control" placeholder="Enter hobby" value="{{$empData[0]->hobby}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea  id="address" class="form-control" name="address" placeholder="Enter your address here...">{{$empData[0]->address}}</textarea>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Existing Profile</label>
                                                    <img src="{{baseUrl().'/storage/'.$empData[0]->profile}}" class="w-50">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group note">
                                                   Note: if you want to change then upload new one
                                                </div>
                                            </div>
                                             
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <input type="hidden" name="id" value="{{$empData[0]->id}}">
                                                <button type="submit" id="submit" class="btn btn-primary btn-block">Update</button>
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
