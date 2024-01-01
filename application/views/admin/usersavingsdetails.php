<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Savings Customer Details</h1>
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
            <div class="col-md-4 my-2"> <b> Address: </b> <?php echo ($userdetails->address); ?></div>
            <div class="col-md-4 my-2"> <b> Phone: </b> <?php echo ($userdetails->phone_number); ?></div>
            <div class="col-md-4 my-2"> <b> Account Created Date: </b> <?php echo date('d-m-Y', strtotime($userdetails->created_date)); ?> </div>
            <div class="col-md-4 my-2"> <b> Branch Code : </b> <?php echo ($userdetails->branch_code); ?></div>
            <div class="col-md-4 my-2"> <b> Branch: </b> <?php echo ($userdetails->branch); ?></div>
            

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
            

            
        </div>

        


    </div>
</div>