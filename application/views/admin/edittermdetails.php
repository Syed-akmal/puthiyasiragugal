<?php
$id = $termInfo->id;
$term = $termInfo->term;
$amount = $termInfo->amount;
$collectionDate = $termInfo->collectionDate;
$status = $termInfo->status;
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Term Details</h1>
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
        <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="editterm" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/editsaveterm" method="post" role="form">
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Term: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="term" name="term" placeholder="Enter Term " value="<?= $term ?>" required>
                    <input type="hidden" class="form-control m-input" id="id" name="id" value="<?= $id ?>" required>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Amount: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="number" class="form-control m-input" id="amount" name="amount" placeholder="Enter Amount " value="<?= $amount ?>" required>

                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Collection Date: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <input type="date" class="form-control m-input" id="collectionDate" name="collectionDate" placeholder="Enter Collection Date " value="<?= $collectionDate ?>" required>

                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-4 col-form-label">
                    Status: <small style="color: red;">*</small>
                </label>
                <div class="col-lg-7">
                    <select name="status" id="status" class='form-control m-input' required>
                        <option value="" <?php if ($status == "") echo "selected"; ?>>Select type</option>
                        <option value="Paid" <?php if ($status == "Paid") echo "selected"; ?>>Paid</option>
                        <option value="Not-Paid" <?php if ($status == "Not-Paid") echo "selected"; ?>>Not-Paid</option>
                        <option value="Completed" <?php if ($status == "Completed") echo "selected"; ?>>Completed</option>

                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>