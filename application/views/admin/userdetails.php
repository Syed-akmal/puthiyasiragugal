<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>

    <!-- <a href="<?php echo base_url() . 'Customer/downloadPdf'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Download PDF</a> -->
</div>


<style>
    .img-container {
        height: auto;
        
        overflow: hidden;
    }

    .img-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>



<div class="card shadow mb-4">
    <div class="card-body">

        <div class="row">
            <div class="col-md-4 my-2"> <b> Name: </b> <?php echo ($userdetails->name); ?></div>
            <div class="col-md-4 my-2"> <b> DOB: </b> <?php echo date('d-m-Y', strtotime($userdetails->dob)); ?></div>
            <div class="col-md-4 my-2"> <b> Gender: </b> <?php echo ($userdetails->gender); ?></div>
            <div class="col-md-4 my-2"> <b> Occupation: </b> <?php echo ($userdetails->occupation); ?></div>
            <div class="col-md-4 my-2"> <b> Address: </b> <?php echo ($userdetails->address); ?></div>
            <div class="col-md-4 my-2"> <b> Phone: </b> <?php echo ($userdetails->phone_number); ?></div>
            <div class="col-md-4 my-2"> <b> Additional Phone: </b> <?php echo ($userdetails->additional_phone_number); ?></div>
            <div class="col-md-4 my-2"> <b> App Relation: </b> <?php echo ($userdetails->app_relation); ?></div>
            <div class="col-md-4 my-2"> <b> Marital Status: </b> <?php echo ($userdetails->marital_status); ?></div>
            <div class="col-md-4 my-2"> <b> Religion: </b> <?php echo ($userdetails->religion); ?></div>
            <div class="col-md-4 my-2"> <b> Co-Applicant Name: </b> <?php echo ($userdetails->co_applicant_name); ?></div>
            <div class="col-md-4 my-2"> <b> Co-Applicant DOB: </b> <?php echo date('d-m-Y', strtotime($userdetails->co_applicant_dob)); ?></div>
            <div class="col-md-4 my-2"> <b> Co-Applicant Gender: </b> <?php echo ($userdetails->co_applicant_gender); ?></div>
            <div class="col-md-4 my-2"> <b> Co-Applicant App Relation: </b> <?php echo ($userdetails->co_applicant_app_relation); ?></div>
            <div class="col-md-4 my-2"> <b> Father Name: </b> <?php echo ($userdetails->co_applicant_address); ?></div>
            <div class="col-md-4 my-2"> <b> Father DOB: </b> <?php echo ($userdetails->father_name); ?></div>
            <div class="col-md-4 my-2"> <b> Father App Relation: </b> <?php echo ($userdetails->father_app_relation); ?></div>
            <div class="col-md-4 my-2"> <b> Father Address: </b> <?php echo ($userdetails->father_address); ?></div>
            <div class="col-md-4 my-2"> <b> Account Created Date: </b> <?php echo date('d-m-Y', strtotime($userdetails->created_date)); ?> </div>
            <div class="col-md-4 my-2"> <b> Branch Code : </b> <?php echo ($userdetails->branch_code); ?></div>
            <div class="col-md-4 my-2"> <b> Branch: </b> <?php echo ($userdetails->branch); ?></div>
            <div class="col-md-4 my-2"> <b> Client Id: </b> <?php echo ($userdetails->client_id); ?></div>
            <div class="col-md-4 my-2"> <b> Center Name: </b> <?php echo ($userdetails->centre_name); ?></div>
            <div class="col-md-4 my-2"> <b> Name Group: </b> <?php echo ($userdetails->namegroup); ?></div>

        </div>

        <div class="row mt-5">

            <div class="col-md-3"><?php if (!empty($userdetails->applicant_photo)) : ?>
                    <label for="applicant_photo"><b>Applicant Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->applicant_photo; ?>" download="ApplicantPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->applicant_photo)); ?>" alt="Applicant Photo">
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Applicant photo available</p>
                <?php endif; ?>
            </div>
            <div class="col-md-3"><?php if (!empty($userdetails->applicant_photo2)) : ?>
                    <label for="applicant_photo2"><b>Applicant Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->applicant_photo2; ?>" download="ApplicantPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->applicant_photo2)); ?>" alt="Applicant Photo">
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Applicant photo available</p>
                <?php endif; ?>
            </div>
        <!-- </div>
        <div class="row mt-5"> -->

            <div class="col-md-3">
                <?php if (!empty($userdetails->aadhar_photo)) : ?>
                    <label for="aadhar_photo"><b>Aadhar Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->aadhar_photo; ?>" download="AadharPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->aadhar_photo)); ?>" alt="Aadhar Photo">
                            <!-- <img src="<?php echo base_url() . 'uploads/' . $userdetails->aadhar_photo; ?>" alt="Aadhar Photo"> -->
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Aadhar photo available</p>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <?php if (!empty($userdetails->ration_photo)) : ?>
                    <label for="ration_photo"><b>Ration Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->ration_photo; ?>" download="RationPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->ration_photo)); ?>" alt="Ration Photo">
                            <!-- <img src="<?php echo base_url() . 'uploads/' . $userdetails->ration_photo; ?>" alt="Ration Photo"> -->
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Ration photo available</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row mt-5">

            <div class="col-md-3"><?php if (!empty($userdetails->co_applicant_photo)) : ?>
                    <label for="co_applicant_photo"><b>Co-Applicant Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_photo; ?>" download="ApplicantPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_photo)); ?>" alt="Co-Applicant Photo">
                            <!-- <img src="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_photo; ?>" alt="Applicant Photo"> -->
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Co-Applicant photo available</p>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php if (!empty($userdetails->co_applicant_aadhar)) : ?>
                    <label for="co_applicant_aadhar_photo"><b>Co-Applicant Aadhar Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_aadhar; ?>" download="AadharPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_aadhar)); ?>" alt="Co-Aadhar Photo">
                            <!-- <img src="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_aadhar; ?>" alt="Aadhar Photo"> -->
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Co-Aadhar photo available</p>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <?php if (!empty($userdetails->co_applicant_ration)) : ?>
                    <label for="co_applicant_ration_photo"><b>Co-Applicant Ration Photo </b></label>
                    <div class="img-container">
                        <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_ration; ?>" download="RationPhoto">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_ration)); ?>" alt="Co-Ration Photo">
                            <!-- <img src="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_ration; ?>" alt="Ration Photo"> -->
                        </a>
                    </div>
                <?php else : ?>
                    <p>No Co-Ration photo available</p>
                <?php endif; ?>
            </div>
        </div>


    </div>
</div>