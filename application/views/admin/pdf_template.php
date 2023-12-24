<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>



    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .img-container {
            height: 350px;
            overflow: hidden;
        }

        .img-container img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .card {
            margin: 20px;
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            word-wrap: break-word;
        }

        .col-md-4 {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            box-sizing: border-box;
            /* word-wrap: break-word; */
            padding: 7px;
        }

        .card-head {
            margin-bottom: 5px;
        }

        .card-body {
            margin-top: 20px;
        }

        .mb-5 {
            margin-bottom: 5px;
        }

        .h3 {
            font-size: 1.75rem;
        }

        .my-2 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .btn {
            font-size: 0.875rem;
            line-height: 1.5;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
        }

        .btn-sm {
            font-size: 0.75rem;
            line-height: 1.5;
            padding: 0.25rem 0.5rem;
            border-radius: 0.2rem;
            text-align: center;
            vertical-align: middle;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.5);
        }

        .fas {
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-style: normal;
            font-size: 1.25em;
        }

        .fa-sm {
            font-size: 0.875em;
        }

        @media print {
            .card {
                margin: 0;
                padding: 0;
            }

            .row {
                display: block;
            }

            .col-md-4 {
                width: 100%;
                box-sizing: border-box;
                padding: 7px;
                page-break-inside: avoid;
                /* Prevent breaking inside the column */
            }

            /* Word wrap for long text */
            .col-md-4 {
                word-wrap: break-word;
                overflow: hidden;
            }
        }

        /* .img {
            height: 100%;
            width: 100%;
        } */

        .table {
            width: 100%;
            /* height: fit-content; */
            border: 1px solid black;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <div class="d-sm-flex align-items-center justify-content-between ">
        <center>
            <h1 class="h1 mb-0 text-gray-800 ">Puthiya Siragugal</h1>
        </center>
        <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>

        <!-- <a href="<?php echo base_url() . 'Customer/downloadPdf'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Download PDF</a> -->
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 my-2"> <b> Name: </b> <?php echo ($userdetails->name); ?></div>
                <div class="col-md-4 my-2"> <b> DOB: </b><?php echo date('d-m-Y', strtotime($userdetails->dob)); ?></div>
                <div class="col-md-4 my-2"> <b> Gender: </b> <?php echo ($userdetails->gender); ?></div>
                <div class="col-md-4 my-2"> <b> Occupation: </b> <?php echo ($userdetails->occupation); ?></div>
                <div class="col-md-4 my-2"> <b> Address: </b> <?php echo ($userdetails->address); ?></div>
                <div class="col-md-4 my-2"> <b> Phone: </b> <?php echo ($userdetails->phone_number); ?></div>
                <div class="col-md-4 my-2"> <b> Additional Phone: </b> <?php echo ($userdetails->additional_phone_number); ?></div>
                <div class="col-md-4 my-2"> <b> App Relation: </b> <?php echo ($userdetails->app_relation); ?></div>
                <div class="col-md-4 my-2"> <b> Marital Status: </b> <?php echo ($userdetails->marital_status); ?></div>
                <div class="col-md-4 my-2"> <b> Religion: </b> <?php echo ($userdetails->religion); ?></div>
                <div class="col-md-4 my-2"> <b> Co-Applicant Name: </b> <?php echo ($userdetails->co_applicant_name); ?></div>
                <div class="col-md-4 my-2"> <b> Co-Applicant DOB: </b> <?php echo ($userdetails->co_applicant_dob); ?></div>
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

            </div>

            <!-- Applicant Photo -->
            <table class="table">
                <tr>
                    <td><b> Applicant Photo 1: </b></td>
                    <td><b> Applicant Photo 2: </b></td>
                </tr>
                <tr>
                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->applicant_photo)) : ?>
                                <div class="img-container">
                                    <a href="<?php echo base_url() . 'uploads/' . $userdetails->applicant_photo; ?>" download="ApplicantPhoto">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->applicant_photo)); ?>" alt="Applicant Photo">
                                    </a>
                                </div>
                            <?php else : ?>

                                <p>No Applicant photo available</p>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->applicant_photo2)) : ?>
                                <div class="img-container">
                                    <a href="<?php echo base_url() . 'uploads/' . $userdetails->applicant_photo2; ?>" download="ApplicantPhoto">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->applicant_photo2)); ?>" alt="Applicant Photo">
                                    </a>
                                </div>
                            <?php else : ?>

                                <p>No Applicant photo available</p>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>

                    <td><b> Aadhar Photo: </b></td>
                    <td><b> Ration Photo: </b></td>
                </tr>
                <tr>

                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->aadhar_photo)) : ?>
                                <div class="img-container">
                                    <a href="<?php echo base_url() . 'uploads/' . $userdetails->aadhar_photo; ?>" download="AadharPhoto">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->aadhar_photo)); ?>" alt="Aadhar Photo">
                                    </a>
                                </div>
                            <?php else : ?>

                                <p>No Aadhar photo available</p>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->ration_photo)) : ?>
                                <div class="img-container">
                                    <a href="<?php echo base_url() . 'uploads/' . $userdetails->ration_photo; ?>" download="RationPhoto">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->ration_photo)); ?>" alt="Ration Photo">
                                    </a>
                                </div>
                            <?php else : ?>

                                <p>No Ration photo available</p>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Co-applicant photo -->

            <table class="table">
                <tr>
                    <td><b> Co-Applicant Photo: </b></td>
                    <td><b> Co-Applicant Aadhar Photo: </b></td>
                    <td><b> Co-Applicant Ration Photo: </b></td>
                </tr>
                <tr>
                    <td>
                        <div class="img"><?php if (!empty($userdetails->co_applicant_photo)) : ?>
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
                    </td>
                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->co_applicant_aadhar)) : ?>
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
                    </td>
                    <td>
                        <div class="img">
                            <?php if (!empty($userdetails->co_applicant_ration)) : ?>
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
                    </td>
                </tr>
            </table>





            <!-- <div class="row mt-5">

                <div class="img">
                    <?php if (!empty($userdetails->applicant_photo)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->applicant_photo; ?>" download="ApplicantPhoto">
                                <b> Applicant Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->applicant_photo)); ?>" alt="Applicant Photo">
                            </a>
                        </div>
                    <?php else : ?>
                        <b> Applicant Photo: </b>
                        <p>No Applicant photo available</p>
                    <?php endif; ?>
                </div>

                <div class="img">
                    <?php if (!empty($userdetails->aadhar_photo)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->aadhar_photo; ?>" download="AadharPhoto">
                                <b> Aadhar Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->aadhar_photo)); ?>" alt="Aadhar Photo">
                            </a>
                        </div>
                    <?php else : ?>
                        <b> Aadhar Photo: </b>
                        <p>No Aadhar photo available</p>
                    <?php endif; ?>
                </div>

                <div class="img">
                    <?php if (!empty($userdetails->ration_photo)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->ration_photo; ?>" download="RationPhoto">
                                <b> Ration Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->ration_photo)); ?>" alt="Ration Photo">
                            </a>
                        </div>
                    <?php else : ?>
                        <b> Ration Photo: </b>
                        <p>No Ration photo available</p>
                    <?php endif; ?>
                </div>

            </div>



            <div class="row mt-5">

                <div class="img"><?php if (!empty($userdetails->co_applicant_photo)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_photo; ?>" download="ApplicantPhoto">
                                <b> Co-Applicant Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_photo)); ?>" alt="Co-Applicant Photo">

                            </a>
                        </div>
                    <?php else : ?>
                        <b> Co-Applicant Photo: </b>
                        <p>No Co-Applicant photo available</p>
                    <?php endif; ?>
                </div>
                <div class="img">
                    <?php if (!empty($userdetails->co_applicant_aadhar)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_aadhar; ?>" download="AadharPhoto">
                                <b> Co-Aadhar Applicant Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_aadhar)); ?>" alt="Co-Aadhar Photo">

                            </a>
                        </div>
                    <?php else : ?>
                        <b> Co-Aadhar Applicant Photo: </b>
                        <p>No Co-Aadhar photo available</p>
                    <?php endif; ?>
                </div>

                <div class="img">
                    <?php if (!empty($userdetails->co_applicant_ration)) : ?>
                        <div class="img-container">
                            <a href="<?php echo base_url() . 'uploads/' . $userdetails->co_applicant_ration; ?>" download="RationPhoto">
                                <b> Co-Ration Photo: </b> <img src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents(base_url() . 'uploads/' . $userdetails->co_applicant_ration)); ?>" alt="Co-Ration Photo">

                            </a>
                        </div>
                    <?php else : ?>
                        <b> Co-Ration Photo: </b>
                        <p>No Co-Ration photo available</p>
                    <?php endif; ?>
                </div>
            </div> -->


        </div>
    </div>
</body>

</html>