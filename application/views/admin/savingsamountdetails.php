<?php
$id = $customerinfo->id;
$name = $customerinfo->name;
$applicant_photo = $customerinfo->applicant_photo;
$phone = $customerinfo->phone_number;
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Savings Amount Details</h1>
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addaccount">
        <i class="fas fa-plus fa-sm text-white-50"></i> New Savings Account
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
        height: 300px;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .img-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>

<!-- Customer Info Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <h5> <b>Name : </b> <?php echo ($name); ?> </h5>
            </div>
            <div class="col-sm-4">
                <h5> <b>Phone Number : </b> <?php echo ($phone); ?> </h5>
            </div>
            <!-- <div class="col-sm-4">
                <h5> <b>Total Loan Period : </b> <?php echo ($customerloaninfo->loan_period); ?> </h5>
            </div>
            <div class="col-sm-4">
                <h5> <b>Loan Cycle : </b> <?php echo ($customerloaninfo->loan_cycle); ?> </h5>
            </div>
            <div class="col-sm-4">
                <h5> <b>Balance Loan Period : </b> <?php echo ($customerloaninfo->remaining_loan_period); ?> </h5>
            </div>
            <div class="col-sm-4">
                <h5> <b>Amount Paid : </b> <?php echo ($customerloaninfo->total_term_amount); ?> </h5>
            </div> -->
        </div>
    </div>
</div>
<!-- <div class="card mb-4">
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-header"> <img src="<?php echo base_url() . 'uploads/' . $applicantphoto; ?>" alt="Applicant Photo"></div>
    <div class="card-body"> <?php echo $name; ?> </div>
</div> -->

<!-- Bootstrap modal -->
<div class="modal fade" id="addaccount" tabindex="-1" role="dialog" aria-labelledby="addaccountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Your modal content goes here (form fields, buttons, etc.) -->
            <!-- Example: -->
            <div class="modal-header">
                <h5 class="modal-title" id="addaccountLabel">Add Loan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields here -->
                <!-- Example: -->
                <!-- <form action="<?= base_url('Customer/addLoanDetails'); ?>" method="post"> -->
                <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/saveaccount" method="post" role="form">

                    <div class="form-group m-form__group row">
                        <label class="col-lg-4 col-form-label">
                            Date: <small style="color: red;">*</small>
                        </label>
                        <div class="col-lg-7">
                            <input type="date" class="form-control m-input" id="date" name="date" placeholder="Enter Date" value="<?= date('Y-m-d'); ?>">
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">
                            <input type="hidden" name="loan_status" id="loan_status" value="in_process">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <!-- <button type="button" class="btn btn-secondary prev-section ">Back</button> -->
                        <input type="submit" class="btn btn-primary float-right" value="Submit" />
                    </div>


                </form>
            </div>
            <!-- Add other modal sections as needed -->
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">

            <table id="account" class="display  table-border table-hover table-striped " width="100%">
                <thead>
                    <tr>
                        <th>Account ID</th>
                        <th>Created On</th>
                        <th>Status</th>
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
        var account = <?php echo json_encode($account); ?>;
        var table = $('#account').DataTable({
            data: account,
            columns: [{
                    data: "id",
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
                    data: "status",
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
                    data: null,
                    render: function(data, type, row) {
                        var termUrl = "<?php echo base_url('Customer/savingstermdetails/'); ?>" + row.id;
                        var editUrl = "<?php echo base_url('Customer/editsavingsaccountdetails/'); ?>" + row.id;
                        var deleteUrl = "<?php echo base_url('Customer/deletesavingsaccountdetails/'); ?>" + row.id;
                        var deleteButton = '<a href="' + deleteUrl + '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fa fa-trash"></i></button></a>';
                        var editButton = '<a href="' + editUrl + '" class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></a>';
                        var termButton = '<a href="' + termUrl + '" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i></a>';
                        return termButton + ' ' +editButton + ' ' + deleteButton;
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