<?php
$id = $customerinfo->id;
$name = $customerinfo->name;
$applicant_photo = $customerinfo->applicant_photo;
$applicant_photo2 = $customerinfo->applicant_photo2;
$aadhar_photo = $customerinfo->aadhar_photo;
$ration_photo = $customerinfo->ration_photo;
$phone = $customerinfo->phone_number;
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Loan Details</h1>
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLoanModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Loan
    </button>
    <!-- <a href="<?php echo base_url() . 'Customer/addLoanDetails'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Loan</a> -->
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

<style>
    .img-container {
        height: auto;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .img-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>

<div class="row">
    <div class="col-md-3">
        <?php if (!empty($applicant_photo)) : ?>
            <div class="img-container">
                <a href="<?php echo base_url() . 'uploads/' . $applicant_photo; ?>" download="ApplicantPhoto">
                    <img src="<?php echo base_url() . 'uploads/' . $applicant_photo; ?>" alt="Applicant Photo">
                </a>
            </div>
        <?php else : ?>
            <p>No Applicant photo available</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <?php if (!empty($applicant_photo2)) : ?>
            <div class="img-container">
                <a href="<?php echo base_url() . 'uploads/' . $applicant_photo2; ?>" download="ApplicantPhoto">
                    <img src="<?php echo base_url() . 'uploads/' . $applicant_photo2; ?>" alt="Applicant Photo">
                </a>
            </div>
        <?php else : ?>
            <p>No Applicant 2 photo available</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <?php if (!empty($aadhar_photo)) : ?>
            <div class="img-container">
                <a href="<?php echo base_url() . 'uploads/' . $aadhar_photo; ?>" download="AadharPhoto">
                    <img src="<?php echo base_url() . 'uploads/' . $aadhar_photo; ?>" alt="Aadhar Photo">
                </a>
            </div>
        <?php else : ?>
            <p>No Aadhar photo available</p>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <?php if (!empty($ration_photo)) : ?>
            <div class="img-container">
                <a href="<?php echo base_url() . 'uploads/' . $ration_photo; ?>" download="RationPhoto">
                    <img src="<?php echo base_url() . 'uploads/' . $ration_photo; ?>" alt="Ration Photo">
                </a>
            </div>
        <?php else : ?>
            <p>No Ration photo available</p>
        <?php endif; ?>
    </div>
</div>
<!-- <div class="card mb-4">
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-body"> <?php echo $name; ?> </div>
</div> -->

<!-- Bootstrap modal -->
<div class="modal fade" id="addLoanModal" tabindex="-1" role="dialog" aria-labelledby="addLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Your modal content goes here (form fields, buttons, etc.) -->
            <!-- Example: -->
            <div class="modal-header">
                <h5 class="modal-title" id="addLoanModalLabel">Add Loan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/saveloan" method="post" role="form">

                    <div class="form-group m-form__group row">
                        <label class="col-lg-4 col-form-label">
                            Loan Amount: <small style="color: red;">*</small>
                        </label>
                        <div class="col-lg-7">
                            <input type="number" class="form-control m-input" id="loanamount" name="loanamount" placeholder="Enter Loan Amount " required>
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">
                            <input type="hidden" name="loan_status" id="loan_status" value="in_process">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-4 col-form-label">
                            Total Loan Amount(Intrest): <small style="color: red;">*</small>
                        </label>
                        <div class="col-lg-7">
                            <input type="number" class="form-control m-input" id="totalloanamount" name="totalloanamount" placeholder="Enter Total Loan Amount " required>
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
                    <div class="form-group m-form__group row">
                        <label class="col-lg-4 col-form-label">
                            Loan Period: <small style="color: red;">*</small>
                        </label>
                        <div class="col-lg-7">
                            <input type="number" class="form-control m-input" id="loan_period" name="loan_period" placeholder="Enter Loan Period " required>
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


                </form>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">

            <table id="loanTable" class="display  table-border table-hover table-striped " width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loan Amount</th>
                        <th>Total Loan Amount</th>
                        <th>Loan Cycle</th>
                        <th>Created On</th>
                        <th>Status</th>
                        <th>Withness Signature 1</th>
                        <th>Withness Signature 2</th>
                        <th>Applicant Signature</th>
                        <th>Co-Applicant Signature</th>
                        <th>Loan Officer Signature</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var loanData = <?php echo json_encode($loanInfo); ?>;
        var table = $('#loanTable').DataTable({
            data: loanData,
            columns: [
                {
                    data: "id",
                    "orderable": false
                },
                {
                    data: "loan_amount",
                    "orderable": false
                },
                {
                    data: "totalloanamount",
                    "orderable": false
                },
                {
                    data: "loan_cycle",
                    "orderable": false
                },
                {
                    "data": "created_on",
                    "orderable": false,
                    "render": function(data, type, row) {
                        // Assuming "dob" is in a standard date format, you can format it to "d-m-y"
                        var dobDate = new Date(data);
                        var formattedDate = dobDate.getDate() + '-' + (dobDate.getMonth() + 1) + '-' + dobDate.getFullYear();
                        return formattedDate;
                    }
                },
                {
                    data: "loan_status",
                    render: function(data, type, row) {
                        if (data === 'completed') {
                            return '<span class="badge bg-success">Completed</span>';
                        } else if (data === 'in_process') {
                            return '<span class="badge bg-warning text-dark">In-Process</span>';
                        } else {
                            return '<span class="badge bg-warning text-dark">In-Process</span>';
                        }
                    }
                },

                {
                    data: "witness_signature_1",
                    render: function(data, type, row) {
                        return '<img src="<?= base_url("uploads/") ?>' + data + '" alt="Witness Signature 1" width="100" class="img-fluid">';
                    },
                    "orderable": false
                },
                {
                    data: "witness_signature_2",
                    render: function(data, type, row) {
                        return '<img src="<?= base_url("uploads/") ?>' + data + '" alt="Witness Signature 2" width="100" class="img-fluid">';
                    },
                    "orderable": false
                },
                {
                    data: "applicant_signature",
                    render: function(data, type, row) {
                        return '<img src="<?= base_url("uploads/") ?>' + data + '" alt="Applicant Signature" width="100" class="img-fluid">';
                    },
                    "orderable": false
                },
                {
                    data: "co_applicant_signature",
                    render: function(data, type, row) {
                        return '<img src="<?= base_url("uploads/") ?>' + data + '" alt="Co-Applicant Signature" width="100" class="img-fluid">';
                    },
                    "orderable": false
                },
                {
                    data: "loanofficer_signature",
                    render: function(data, type, row) {
                        return '<img src="<?= base_url("uploads/") ?>' + data + '" alt="Loan Officer Signature" width="100" class="img-fluid">';
                    },
                    "orderable": false
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var termUrl = "<?php echo base_url('Customer/termdetails/'); ?>" + row.id;
                        var editUrl = "<?php echo base_url('Customer/editloandetails/'); ?>" + row.id;
                        var deleteUrl = "<?php echo base_url('Customer/deleteloandetails/'); ?>" + row.id;
                        var deleteButton = '<a href="' + deleteUrl + '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fa fa-trash"></i></button></a>';
                        var editButton = '<a href="' + editUrl + '" class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></a>';
                        var termButton = '<a href="' + termUrl + '" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i></a>';
                        return termButton + ' ' + editButton + ' ' + deleteButton;
                    }
                }
            ]
        });
    });
</script>

<script>
    function doconfirm() {
        job = confirm("Are you sure you want to delete this loan details permanently?");
        if (job != true) {
            return false;
        }
    }
</script>