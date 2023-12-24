<?php
$id = $accountInfo->id;
$status = $accountInfo->status;

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
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="editloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/editsavingaccount" method="post" role="form">



            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Status: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                <input type="hidden" class="form-control m-input" id="id" name="id" placeholder=" " value="<?= $id ?>" required>

                    <select name="status" id="status" class='form-control m-input' required>

                        <option value="in_process" <?php if ($status == "in_process") echo "selected"; ?>>In-Process</option>
                        <option value="completed" <?php if ($status == "completed") echo "selected"; ?>>Completed</option>

                    </select>
                </div>

            </div>

            <div class="form-group m-form__group row">
                <!-- <button type="button" class="btn btn-secondary prev-section ">Back</button> -->
                <input type="submit" class="btn btn-primary float-right" value="Submit" />
            </div>
    </div>

    </form>
</div>