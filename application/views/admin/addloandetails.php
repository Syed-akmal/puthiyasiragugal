<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Loan Details</h1>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/saveloan" method="post" role="form">

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Amount: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="loanamount" name="loanamount" placeholder="Enter Loan Amount " required>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Cycle: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <select name="loan_cycle" id="loan_cycle" class='form-control m-input' required>
                        <option value="">Select type</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="half-yearly">Half-Yearly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>

            </div>

            <div class="form-group m-form__group row ">

                <label class="col-lg-4 col-form-label">
                    Loan Date: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= date('Y-m-d'); ?>">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Withness Signature 1:
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="witnesssignature1" name="witnesssignature1" placeholder=" " accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Withness Signature 2:
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="witnesssignature2" name="witnesssignature2" placeholder=" " accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Applicant Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="applicantsignature" name="applicantsignature" placeholder=" " accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Co-Applicant Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="coapplicantsignature" name="coapplicantsignature" placeholder=" " accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Officer Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="loanofficersignature" name="loanofficersignature" placeholder=" " accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <!-- <button type="button" class="btn btn-secondary prev-section ">Back</button> -->
                <input type="submit" class="btn btn-primary float-right" value="Submit" />
            </div>
    </div>

    </form>
</div>