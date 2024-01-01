<?php
$id = $loanInfo->id;
$loan_amount = $loanInfo->loan_amount;
$totalloanamount = $loanInfo->totalloanamount;
$loan_cycle = $loanInfo->loan_cycle;
$created_on = $loanInfo->created_on;
$witness_signature_1 = $loanInfo->witness_signature_1;
$witness_signature_2 = $loanInfo->witness_signature_2;
$applicant_signature = $loanInfo->applicant_signature;
$co_applicant_signature = $loanInfo->co_applicant_signature;
$loanofficer_signature = $loanInfo->loanofficer_signature;
$loan_status = $loanInfo->loan_status;
$loan_period = $loanInfo->loan_period;
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Loan Details</h1>
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
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="editloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/editsaveloan" method="post" role="form">

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Amount: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="loanamount" name="loanamount" placeholder="Enter Loan Amount " value="<?= $loan_amount ?>" required>
                    <input type="hidden" class="form-control m-input" id="id" name="id" placeholder="Enter Loan Amount " value="<?= $id ?>" required>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                   Total Loan Amount (Intrest): <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="totalloanamount" name="totalloanamount" placeholder="Enter Total Loan Amount " value="<?= $totalloanamount ?>" required>
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Cycle: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <select name="loan_cycle" id="loan_cycle" class='form-control m-input' required>
                        <option value="" <?php if ($loan_cycle == "") echo "selected"; ?>>Select type</option>
                        <option value="weekly" <?php if ($loan_cycle == "weekly") echo "selected"; ?>>Weekly</option>
                        <option value="monthly" <?php if ($loan_cycle == "monthly") echo "selected"; ?>>Monthly</option>
                        <option value="quarterly" <?php if ($loan_cycle == "quarterly") echo "selected"; ?>>Quarterly</option>
                        <option value="half-yearly" <?php if ($loan_cycle == "half-yearly") echo "selected"; ?>>Half-Yearly</option>
                        <option value="yearly" <?php if ($loan_cycle == "yearly") echo "selected"; ?>>Yearly</option>
                    </select>
                </div>

            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Period: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="loan_period" name="loan_period" placeholder="Enter Loan Period " value="<?= $loan_period ?>" required>
                </div>
            </div>

            <div class="form-group m-form__group row ">

                <label class="col-lg-4 col-form-label">
                    Loan Date: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= $created_on ?>">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Status: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <select name="loan_status" id="loan_status" class='form-control m-input' required>

                        <option value="in_process" <?php if ($loan_status == "in_process") echo "selected"; ?>>In-Process</option>
                        <option value="completed" <?php if ($loan_status == "completed") echo "selected"; ?>>Completed</option>

                    </select>
                </div>

            </div>

            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Withness Signature 1:
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="witnesssignature1" name="witnesssignature1" placeholder=" " value="<?php echo base_url(); ?>uploads/<?= $witness_signature_1 ?>" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <input type="hidden" name="witnesssignature1_existing" value="<?= $witness_signature_1 ?>">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Withness Signature 2:
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="witnesssignature2" name="witnesssignature2" placeholder=" " value="<?php echo base_url(); ?>uploads/<?= $witness_signature_2 ?>" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <input type="hidden" name="witnesssignature2_existing" value="<?= $witness_signature_2 ?>">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Applicant Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="applicantsignature" name="applicantsignature" placeholder=" " value="<?php echo base_url(); ?>uploads/<?= $applicant_signature ?>" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <input type="hidden" name="applicantsignature_existing" value="<?= $applicant_signature ?>">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Co-Applicant Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="coapplicantsignature" name="coapplicantsignature" placeholder=" " value="<?php echo base_url(); ?>uploads/<?= $co_applicant_signature ?>" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <input type="hidden" name="coapplicantsignature_existing" value="<?= $co_applicant_signature ?>">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Loan Officer Signature :
                </label>
                <div class="col-lg-7">
                    <input type="file" class="" id="loanofficersignature" name="loanofficersignature" placeholder=" " value="<?php echo base_url(); ?>uploads/<?= $loanofficer_signature ?>" accept="image/png, image/gif, image/jpeg, image/jpg">
                    <input type="hidden" name="loanofficersignature_existing" value="<?= $loanofficer_signature ?>">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <!-- <button type="button" class="btn btn-secondary prev-section ">Back</button> -->
                <input type="submit" class="btn btn-primary float-right" value="Submit" />
            </div>
    </div>

    </form>
</div>