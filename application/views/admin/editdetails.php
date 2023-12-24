<?php
$id = $userInfo->id;
$name = $userInfo->name;
$branch_code = $userInfo->branch_code;
$branch = $userInfo->branch;
$client_id = $userInfo->client_id;
$centre_name = $userInfo->centre_name;
$dob = $userInfo->dob;
$gender = $userInfo->gender;
$occupation = $userInfo->occupation;
$app_relation = $userInfo->app_relation;
$address = $userInfo->address;
$phone_number = $userInfo->phone_number;
$additional_phone_number = $userInfo->additional_phone_number;
$marital_status = $userInfo->marital_status;
$religion = $userInfo->religion;
$co_applicant_name = $userInfo->co_applicant_name;
$co_applicant_dob = $userInfo->co_applicant_dob;
$co_applicant_gender = $userInfo->co_applicant_gender;
$co_applicant_app_relation = $userInfo->co_applicant_app_relation;
$co_applicant_address = $userInfo->co_applicant_address;
$father_name = $userInfo->father_name;
$father_dob = $userInfo->father_dob;
$father_app_relation = $userInfo->father_app_relation;
$father_address = $userInfo->father_address;
$applicant_photo = $userInfo->applicant_photo;
$applicant_photo2 = $userInfo->applicant_photo2;
$aadhar_photo = $userInfo->aadhar_photo;
$ration_photo = $userInfo->ration_photo;
$co_applicant_photo = $userInfo->co_applicant_photo;
$co_applicant_aadhar = $userInfo->co_applicant_aadhar;
$co_applicant_ration = $userInfo->co_applicant_ration;
$created_date = $userInfo->created_date;

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Customer Details</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addCustomer" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/saveedit" method="post" role="form">
            <div class="form-section" data-section="1">
                <div class="form-group m-form__group row ">
                    <h3> <b> Branch Details </b></h3>
                </div>
                <div class="form-group m-form__group row ">

                    <label class="col-lg-4 col-form-label">
                        Date:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= $created_date ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Customer Name:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter Customer Name " value="<?= $name ?>">
                        <input type="hidden" class="form-control m-input" id="id" name="id" placeholder=" " value="<?= $id ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch Code:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch_code" name="branch_code" placeholder="Enter Branch Code" value="<?= $branch_code ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch" name="branch" placeholder="Enter Branch " value="<?= $branch ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Client ID:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Enter Client ID" value="<?= $client_id ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Center Name:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="centre_name" name="centre_name" placeholder="Enter Centre Name" value="<?= $centre_name ?>">
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
                        <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Enter DOB" value="<?= $dob ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Gender:
                    </label>
                    <div class="col-lg-7">
                        <select name="gender" id="gender" class='form-control m-input'>
                            <option value="" <?php if ($gender == "") echo "selected"; ?>>Select type</option>
                            <option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
                            <option value="Others" <?php if ($gender == "Others") echo "selected"; ?>>Others</option>
                        </select>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Occupation:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="occupation" name="occupation" value="<?= $occupation ?>" placeholder="Enter Occupation ">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="AppRelation" name="AppRelation" placeholder="Enter App Relation" value="<?= $app_relation ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Address:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?= $address ?>">
                    </div>

                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Phone Number:
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control disable-scroll" id="phone" name="phone" placeholder="Enter Phone Number" value="<?= $phone_number ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Additional Phone Number:
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control disable-scroll" id="additional_phone" name="additional_phone" placeholder="Enter Additional Phone Number" value="<?= $additional_phone_number ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Material Status:
                    </label>
                    <div class="col-lg-7">
                        <select name="marital_status" id="marital_status" class='form-control m-input'>
                            <option value="" <?php if ($marital_status == "") echo "selected"; ?>>Select type</option>
                            <option value="single" <?php if ($marital_status == "single") echo "selected"; ?>>Single</option>
                            <option value="married" <?php if ($marital_status == "married") echo "selected"; ?>>Married</option>
                            <option value="widowed" <?php if ($marital_status == "widowed") echo "selected"; ?>>Widowed</option>
                            <option value="divorced" <?php if ($marital_status == "divorced") echo "selected"; ?>>Divorced</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Religion:
                    </label>
                    <div class="col-lg-7">
                        <select name="religion" id="religion" class='form-control m-input'>
                            <option value="" <?php if ($religion == "") echo "selected"; ?>>Select type</option>
                            <option value="hindu" <?php if ($religion == "hindu") echo "selected"; ?>>Hindu</option>
                            <option value="muslim" <?php if ($religion == "muslim") echo "selected"; ?>>Muslim</option>
                            <option value="christian" <?php if ($religion == "christian") echo "selected"; ?>>Christian</option>
                            <option value="sikh" <?php if ($religion == "sikh") echo "selected"; ?>>Sikh</option>
                            <option value="jain" <?php if ($religion == "jain") echo "selected"; ?>>Jain</option>
                            <option value="other" <?php if ($religion == "other") echo "selected"; ?>>Other</option>
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
                <!-- <div class="form-group m-form__group row">
                    <h3> <b> Applicant Details </b></h3>
                </div> -->


                <!-- Co Applicant -->
                <div class="form-group m-form__group row">
                    <h3> <b> Co-Applicant Details </b></h3>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Name:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="co_name" name="co_name" placeholder="Enter Co-Applicant Name " value="<?= $co_applicant_name ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant DOB:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" id="Co_Applicant_DOB" name="Co_Applicant_DOB" placeholder="Enter Co-Applicant_DOB" value="<?= $co_applicant_dob ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Gender:
                    </label>
                    <div class="col-lg-7">
                        <select name="Co_Applicant_gender" id="Co_Applicant_gender" class='form-control m-input'>
                            <option value="" <?php if ($co_applicant_gender == "") echo "selected"; ?>>Select type</option>
                            <option value="Male" <?php if ($co_applicant_gender == "Male") echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if ($co_applicant_gender == "Female") echo "selected"; ?>>Female</option>
                            <option value="Others" <?php if ($co_applicant_gender == "Others") echo "selected"; ?>>Others</option>
                        </select>
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="Co_Applicant_AppRelation" name="Co_Applicant_AppRelation" placeholder="Enter Co-Applicant  App Relation" value="<?= $co_applicant_app_relation ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co-Applicant Address:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="co_address" name="co_address" placeholder="Enter Co-Applicant Address" value="<?= $co_applicant_address ?>">
                    </div>

                </div>


                <!-- Father -->
                <div class="form-group m-form__group row">
                    <h3> <b> Father Details </b></h3>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father Name:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="father_name" name="father_name" placeholder="Enter Father Name " value="<?= $father_name ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father DOB:
                    </label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" id="Father_DOB" name="Father_DOB" placeholder="Enter Father_DOB" value="<?= $father_dob ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father App Relationship:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="Father_AppRelation" name="Father_AppRelation" placeholder="Enter Father  App Relation" value="<?= $father_app_relation ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Father Address:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="father_address" name="father_address" placeholder="Enter Father Address" value="<?= $father_address ?>">
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
                    <h3> <b> KYC </b> <small>( Upload jpg|jpeg|png|gif )</small></h3>


                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Applicant Photo 1:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo" name="applicant_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $applicant_photo ?>">
                        <input type="hidden" name="applicant_photo_existing" value="<?= $applicant_photo ?>">

                    </div>
                </div>
                
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Applicant Photo 2:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo2" name="applicant_photo2" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $applicant_photo2 ?>">
                        <input type="hidden" name="applicant_photo_existing2" value="<?= $applicant_photo2 ?>">

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Aadhar Card Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="aadhar_photo" name="aadhar_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $aadhar_photo ?>">
                        <input type="hidden" name="aadhar_photo_existing" value="<?= $aadhar_photo ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Ration Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="ration_photo" name="ration_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $ration_photo ?>">
                        <input type="hidden" name="ration_photo_existing" value="<?= $ration_photo ?>">
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
                        <input type="file" class="" id="co_applicant_photo" name="co_applicant_photo" placeholder="Upload Co-Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $co_applicant_photo ?>">
                        <input type="hidden" name="co_applicant_photo_existing" value="<?= $co_applicant_photo ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co Applicant Aadhar Card Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="co_aadhar_photo" name="co_aadhar_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $co_applicant_aadhar ?>">
                        <input type="hidden" name="co_aadhar_photo_existing" value="<?= $co_applicant_aadhar ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Co Applicant Ration Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="co_ration_photo" name="co_ration_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $co_applicant_ration ?>">
                        <input type="hidden" name="co_ration_photo_existing" value="<?= $co_applicant_ration ?>">
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