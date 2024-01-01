<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Customer</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addCustomer" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/save" method="post" role="form">
            <div class="form-section" data-section="1">
                <div class="form-group m-form__group row ">
                    <h3> <b> Branch Details </b></h3>
                </div>
                <div class="form-group m-form__group row ">

                    <label class="col-lg-4 col-form-label">
                        Date: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= date('Y-m-d'); ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Customer Name: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter Customer Name " required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch Code: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch_code" name="branch_code" placeholder="Enter Branch Code" required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch" name="branch" placeholder="Enter Branch " required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Name Group: 
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="namegroup" name="namegroup" placeholder="Enter Name Group ">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Client ID: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Enter Client ID" required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Center Name: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="centre_name" name="centre_name" placeholder="Enter Centre Name" required>
                    </div>

                </div>
                <div class="form-group m-form__group row">
                    <button type="button" class="btn btn-primary next-section float-right">Next</button>
                </div>

            </div>

            <!-- Page 2 -->
            <div class="form-section" data-section="2">
                <div class="form-group m-form__group row">
                    <h3> <b> Personal details </b></h3>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        DOB:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter DOB">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Gender: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <select name="gender" id="gender" class='form-control m-input' required>
                            <option value="">Select type</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Occupation: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="occupation" name="occupation" placeholder="Enter Occupation " required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="AppRelation" name="AppRelation" placeholder="Enter App Relation">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Address: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>

                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Phone Number: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control disable-scroll" id="phone" name="phone" placeholder="Enter Phone Number" required>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Additional Phone Number:
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control disable-scroll" id="additional_phone" name="additional_phone" placeholder="Enter Additional Phone Number">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Material Status:
                    </label>
                    <div class="col-lg-7">
                        <select name="marital_status" id="marital_status" class='form-control m-input'>
                            <option value="">Select type</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                            <option value="divorced">Divorced</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Religion:
                    </label>
                    <div class="col-lg-7">
                        <select name="religion" id="religion" class='form-control m-input'>
                            <option value="">Select type</option>
                            <option value="hindu">Hindu</option>
                            <option value="muslim">Muslim</option>
                            <option value="christian">Christian</option>
                            <option value="sikh">Sikh</option>
                            <option value="jain">Jain</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <button type="button" class="btn btn-secondary prev-section float-right">Back</button>
                    <button type="button" class="btn btn-primary next-section float-right">Next</button>
                </div>
            </div>
            <!-- Page 3 -->
            <div class="form-section" data-section="3">
                <!-- Co Applicant -->
                <div class="form-group m-form__group row">
                    <h3> <b> Co-Applicant Details </b></h3>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Name:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="co_name" name="co_name" placeholder="Enter Co-Applicant Name ">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant DOB:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" id="Co_Applicant_DOB" name="Co_Applicant_DOB" placeholder="Enter Co-Applicant_DOB">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Gender:
                    </label>
                    <div class="col-lg-7">
                        <select name="Co_Applicant_gender" id="Co_Applicant_gender" class='form-control m-input'>
                            <option value="">Select type</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="Co_Applicant_AppRelation" name="Co_Applicant_AppRelation" placeholder="Enter Co-Applicant  App Relation">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Address:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="co_address" name="co_address" placeholder="Enter Co-Applicant Address">
                    </div>

                </div>


                <!-- Father -->
                <div class="form-group m-form__group row">
                    <h3> <b> Father Details </b></h3>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father Name: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="father_name" name="father_name" placeholder="Enter Father Name " required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father DOB:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" id="Father_DOB" name="Father_DOB" placeholder="Enter Father_DOB">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="Father_AppRelation" name="Father_AppRelation" placeholder="Enter Father  App Relation">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father Address:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="father_address" name="father_address" placeholder="Enter Father Address">
                    </div>

                </div>
                <div class="form-group m-form__group row">
                    <button type="button" class="btn btn-secondary prev-section ">Back</button>
                    <button type="button" class="btn btn-primary next-section ">Next</button>
                </div>
            </div>
            <!-- Page 4 -->
            <div class="form-section" data-section="4">
                <div class="form-group m-form__group row">
                    <h3> <b> KYC </b> <small>( Upload jpg|png )</small></h3>

                    
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Applicant Photo 1: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo" name="applicant_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" required>
                    </div>
                </div>
                
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Applicant Photo 2: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo2" name="applicant_photo2" placeholder="Upload Applicant photo 2" multiple accept="image/png, image/gif, image/jpeg, image/jpg" required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Aadhar Card Photo: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="aadhar_photo" name="aadhar_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Ration Photo: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="ration_photo" name="ration_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <h3> <b> Co Applicant KYC </b></h3>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co Applicant Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="co_applicant_photo" name="co_applicant_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co Applicant Aadhar Card Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="co_aadhar_photo" name="co_aadhar_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co Applicant Ration Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="co_ration_photo" name="co_ration_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <button type="button" class="btn btn-secondary prev-section ">Back</button>
                    <input type="submit" class="btn btn-primary float-right" value="Submit" />
                </div>
            </div>
            
        </form>
    </div>
</div>

<!-- Scrpit -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var currentSection = 1;
        var formSections = $(".form-section");

        $(".next-section").click(function() {
            if (currentSection < formSections.length) {
                if (validateSection(currentSection)) {
                    formSections.eq(currentSection - 1).hide();
                    currentSection++;
                    formSections.eq(currentSection - 1).show();
                } else {
                    // Display an error message or highlight the required fields
                    alert("Please fill out all required fields before proceeding.");
                }
            }
        });


        $(".prev-section").click(function() {
            if (currentSection > 1) {
                formSections.eq(currentSection - 1).hide();
                currentSection--;
                formSections.eq(currentSection - 1).show();
            }
        });
    });
</script>


<script>
    function validateSection(sectionNumber) {
        var currentSection = $(".form-section[data-section='" + sectionNumber + "']");
        var requiredInputs = currentSection.find("input[required], select[required]");
        var isValid = true;

        requiredInputs.each(function() {
            if ($(this).val().trim() === "") {
                isValid = false;
                return false; // Break the loop if any required field is empty
            }
        });

        return isValid;
    }

    // Get all input elements with the class "disable-scroll"
    var numberInputs = document.querySelectorAll(".disable-scroll");

    // Disable scrolling behavior for all number inputs with the specified class
    numberInputs.forEach(function(input) {
        input.addEventListener("wheel", function(event) {
            event.preventDefault();
        });
    });
</script>