<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Savings Account Customer</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addCustomer" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/savesavings" method="post" role="form">
            <div class="form-section" data-section="1">
                <div class="form-group m-form__group row ">
                    <h3> <b> Customer Details </b></h3>
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
                <!-- <div class="form-group m-form__group row">
                    <label class="col-lg-4 col-form-label">
                        Name Group:
                    </label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control m-input" id="namegroup" name="namegroup" placeholder="Enter Name Group ">
                    </div>
                </div> -->
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
                        Applicant Photo: <small style="color: red;">*</small>
                    </label>
                    <div class="col-lg-7">
                        <input type="file" class="" id="applicant_photo" name="applicant_photo" placeholder="Upload Applicant photo " multiple accept="image/png, image/gif, image/jpeg, image/jpg" required>
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

        // $(".next-section").click(function() {
        //     if (currentSection < formSections.length) {
        //         formSections.eq(currentSection - 1).hide();
        //         currentSection++;
        //         formSections.eq(currentSection - 1).show();
        //     }
        // });

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