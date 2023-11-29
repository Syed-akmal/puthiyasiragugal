
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
    <a href="<?php echo base_url() . 'Customer/addCustomerDetails'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Customer</a>
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

        <div class="table-responsive">

            <table id="customerTable" class="display  table-border table-hover table-striped " width="100%">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Applicant Photo</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Father Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Add Loan</th>
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
    // Initialize DataTable with search, pagination, and export options
    $(document).ready(function() {
        $('#customerTable').DataTable({
            // "order": [
            //   [0, "desc"]
            // ],


            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('Customer/ajaxFetchCustomerDetails'); ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "name",
                    "orderable": false
                },
                {
                    "data": "applicant_photo",
                    "render": function(data, type, row) {
                        return '<img src="' + data + '" alt="Applicant Photo" width="100" class="img-fluid">';
                    },
                    "orderable": false

                },

                {
                    "data": "dob",
                    "orderable": false
                },
                {
                    "data": "gender",
                    "orderable": false
                },
                {
                    "data": "father_name",
                    "orderable": false
                },
                {
                    "data": "phone_number",
                    "orderable": false
                },
                {
                    "data": "address",
                    "orderable": false
                },
                {
                    "data": "loan",
                    "orderable": false
                },
                {
                    "data": "actions",
                    "orderable": false
                }
                // {
                //     "data": "aadhar_photo",
                //     "render": function(data, type, row) {
                //         return '<img src="' + data + '" alt="Aadhar Photo" width="100">';
                //     }
                // },
                // Add other image columns here
            ]
        });
    });
</script>