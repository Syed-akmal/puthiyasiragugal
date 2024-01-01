<?php
$id = $userInfo->id;
$name = $userInfo->name;
$branch_code = $userInfo->branch_code;
$branch = $userInfo->branch;
$dob = $userInfo->dob;
$gender = $userInfo->gender;
$address = $userInfo->address;
$phone_number = $userInfo->phone_number;
$applicant_photo = $userInfo->applicant_photo;
$created_date = $userInfo->created_date;

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Savings Customer Details</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addCustomer" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/editsavings" method="post" role="form">
            <div class="form-section" data-section="1">
                <div class="form-group m-form__group row ">
                    <h3> <b> Savings Customer Details </b></h3>
                </div>
                <div class="form-group m-form__group row ">

                    <label class="col-lg-4 col-form-label">
                        Date: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="hidden" class="form-control m-input" id="id" name="id" placeholder=" " value="<?= $id ?>">
                        <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= $created_date ?>">
                    </div>
                </div>



                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch Code: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch_code" name="branch_code" placeholder="Enter Branch Code" value="<?= $branch_code ?>">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Branch: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="branch" name="branch" placeholder="Enter Branch " value="<?= $branch ?>">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Customer Name: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter Customer Name " value="<?= $name ?>">
                    </div>
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
                        Address: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?= $address ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Phone Number: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="number" class="form-control disable-scroll" id="phone" name="phone" placeholder="Enter Phone Number" value="<?= $phone_number ?>">
                    </div>

                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Applicant Photo:
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo" name="applicant_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" value="<?php echo base_url(); ?>uploads/<?= $applicant_photo ?>">
                        <input type="hidden" name="applicant_photo_existing" value="<?= $applicant_photo ?>">

                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <!-- <button type="button" class="btn btn-secondary prev-section ">Back</button> -->
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