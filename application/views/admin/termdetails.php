<?php
$loan_id = $customerloaninfo->id;
$customer_id = $customerloaninfo->customer_id;
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Term Details</h1>
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addTermModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Term
    </button>
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

<!-- Customer Info Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <h5> <b>Name : </b> <?php echo ($customerloaninfo->name); ?> </h5>
            </div>
            <div class="col-sm-4">
                <h5> <b>Phone Number : </b> <?php echo ($customerloaninfo->phone_number); ?> </h5>
            </div>
            <div class="col-sm-4"><h5> <b>Total Loan Period : </b> <?php echo ($customerloaninfo->loan_period); ?> </h5></div>
            <div class="col-sm-4"><h5> <b>Loan Cycle : </b> <?php echo ($customerloaninfo->loan_cycle); ?> </h5></div>
            <div class="col-sm-4"><h5> <b>Balance Loan Period : </b> <?php echo ($customerloaninfo->remaining_loan_period); ?> </h5></div>
            <div class="col-sm-4"><h5> <b>Amount Paid : </b> <?php echo ($customerloaninfo->total_term_amount); ?> </h5></div>
        </div>
    </div>
</div>

<!-- Term Table Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="termTable" class="display  table-border table-hover table-striped " width="100%">
                <thead>
                    <tr>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Collection date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Customer details will be populated here using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
        var termData = <?php echo json_encode($termInfo); ?>;
        var table = $('#termTable').DataTable({
            data: termData,
            columns: [{
                    data: "term",
                    "orderable": false
                },
                {
                    data: "amount",
                    "orderable": false
                },
                {
                    "data": "collectionDate",
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
                    "orderable": false
                },
                {
                    data: null,
                    render: function(data, type, row) {
                       
                        var editUrl = "<?php echo base_url('Customer/edittermdetails/'); ?>" + row.id;
                        var deleteUrl = "<?php echo base_url('Customer/deletetermdetails/'); ?>" + row.id;
                        var deleteButton = '<a href="' + deleteUrl + '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fa fa-trash"></i></button></a>';
                        var editButton = '<a href="' + editUrl + '" class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></a>';
                        
                        return  editButton + ' ' + deleteButton;
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
<!-- Add Term Modal -->
<div class="modal fade" id="addTermModal" tabindex="-1" role="dialog" aria-labelledby="addTermModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTermModalLabel">Add New Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form elements for adding a new term here -->
                <!-- Example: -->
                <form role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="addloan" enctype="multipart/form-data" action="<?php echo base_url() ?>Customer/saveterm" method="post" role="form">
                    <div class="form-group">
                        <label for="term">Term:</label>
                        <input type="number" class="form-control" id="term" name="term" placeholder="Enter Term" required>
                        <input type="hidden" class="form-control" id="loan_id" name="loan_id" value="<?= $loan_id ?>" >
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?= $customer_id ?>" >
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="collectionDate">Collection Date:</label>
                        <input type="date" class="form-control" id="collectionDate" name="collectionDate" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" id="status" class='form-control ' required>
                            <option value="">Select type</option>
                            <option value="Paid">Paid</option>
                            <option value="Not-Paid">Not-Paid</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>