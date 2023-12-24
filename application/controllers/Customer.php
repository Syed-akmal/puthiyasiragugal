<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/footer');
        // $this->load->view('login');
    }

    public function addCustomerDetails()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/addcustomerdetails');
        $this->load->view('admin/footer');
    }

    ##Save the Customer Details
    public function save()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        // $this->form_validation->set_rules('branch_code', 'Branch Code ', 'required');
        // $this->form_validation->set_rules('branch', 'Branch ', 'required');
        // $this->form_validation->set_rules('client_id', 'Client Id ', 'required');
        // $this->form_validation->set_rules('centre_name', 'Centre Name ', 'required');
        // $this->form_validation->set_rules('phone', 'Phone Number ', 'required');
        // $this->form_validation->set_rules('loan_amount', 'Loan Amount ', 'required');
        // $this->form_validation->set_rules('address', 'Address ', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Customer/CustomerDetails');
        } else {

            // Handle image uploads
            $config['upload_path'] = './uploads/'; // Specify your upload folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2050; // 2MB max file size
            $this->upload->initialize($config);

            $uploaded_images = array();
            $image_fields = array('applicant_photo','applicant_photo2', 'aadhar_photo', 'ration_photo', 'co_applicant_photo', 'co_aadhar_photo', 'co_ration_photo');

            foreach ($image_fields as $field) {
                if ($this->upload->do_upload($field)) {
                    $uploaded_data = $this->upload->data();
                    $file_name = time() . '_' . $uploaded_data['file_name']; // Append timestamp to the original file name
                    rename($uploaded_data['full_path'], $config['upload_path'] . $file_name); // Rename the uploaded file
                    $uploaded_images[$field] = $file_name; // Store the renamed file names in an array
                } else {
                    // Handle upload errors here, if any
                    $uploaded_images[$field] = ''; // Set the field value to empty string if upload fails
                }
            }

            $name = $this->input->post('name');
            $date = $this->input->post('date');
            $branch_code = $this->input->post('branch_code');
            $branch = $this->input->post('branch');
            $namegroup = $this->input->post('namegroup');
            $client_id = $this->input->post('client_id');
            $centre_name = $this->input->post('centre_name');
            $marital_status = $this->input->post('marital_status');
            $phone = $this->input->post('phone');
            $additional_phone = $this->input->post('additional_phone');
            $religion = $this->input->post('religion');
            // $loan_amount = $this->input->post('loan_amount');
            // $loan_cycle = $this->input->post('loan_cycle');
            $DOB = $this->input->post('DOB');
            $gender = $this->input->post('gender');
            $AppRelation = $this->input->post('AppRelation');
            $address = $this->input->post('address');
            $co_name = $this->input->post('co_name');
            $Co_Applicant_DOB = $this->input->post('Co_Applicant_DOB');
            $Co_Applicant_gender = $this->input->post('Co_Applicant_gender');
            $Co_Applicant_AppRelation = $this->input->post('Co_Applicant_AppRelation');
            $co_address = $this->input->post('co_address');
            $father_name = $this->input->post('father_name');
            $Father_DOB = $this->input->post('Father_DOB');
            $Father_AppRelation = $this->input->post('Father_AppRelation');
            $father_address = $this->input->post('father_address');
            // $applicant_photo = $this->input->post('applicant_photo');
            // $aadhar_photo = $this->input->post('aadhar_photo');
            // $ration_photo = $this->input->post('ration_photo');
            // $co_applicant_photo = $this->input->post('co_applicant_photo');
            // $co_aadhar_photo = $this->input->post('co_aadhar_photo');
            // $co_ration_photo = $this->input->post('co_ration_photo');
            $occupation = $this->input->post('occupation');
            // $numberLoan = $this->input->post('numberLoan');
            // $outstanding = $this->input->post('outstanding');
            // $Paid = $this->input->post('Paid');

            $CustomerDetails = array(
                'name' => $name,
                'created_date' => $date,
                'branch_code' => $branch_code,
                'branch' => $branch,
                'namegroup' => $namegroup,
                'client_id' => $client_id,
                'centre_name' => $centre_name,
                'marital_status' => $marital_status,
                'phone_number' => $phone,
                'additional_phone_number' => $additional_phone,
                'religion' => $religion,
                // 'loan_amount' => $loan_amount,
                // 'loan_cycle' => $loan_cycle,
                'dob' => $DOB,
                'gender' => $gender,
                'app_relation' => $AppRelation,
                'address' => $address,
                'co_applicant_name' => $co_name,
                'co_applicant_dob' => $Co_Applicant_DOB,
                'co_applicant_gender' => $Co_Applicant_gender,
                'co_applicant_app_relation' => $Co_Applicant_AppRelation,
                'co_applicant_address' => $co_address,
                'father_name' => $father_name,
                'father_dob' => $Father_DOB,
                'father_app_relation' => $Father_AppRelation,
                'father_address' => $father_address,
                'applicant_photo' => $uploaded_images['applicant_photo'],
                'applicant_photo2' => $uploaded_images['applicant_photo2'],
                'aadhar_photo' => $uploaded_images['aadhar_photo'],
                'ration_photo' => $uploaded_images['ration_photo'],
                'co_applicant_photo' => $uploaded_images['co_applicant_photo'],
                'co_applicant_aadhar' => $uploaded_images['co_aadhar_photo'],
                'co_applicant_ration' => $uploaded_images['co_ration_photo'],
                'occupation' => $occupation,
                // 'numberLoan' => $numberLoan,
                // 'outstanding' => $outstanding,
                // 'Paid' => $Paid,
            );

            if ($this->db->insert('customer_details', $CustomerDetails)) {
                $this->session->set_flashdata('success', 'Customer added successfully.');
                redirect('Customer/CustomerDetails');
            } else {
                redirect('Customer/CustomerDetails');
            }
        }
    }


    public function CustomerDetails()
    {
        $this->load->view('admin/header');
        // $this->load->view('admin/customerdetails');
        // $data['customer_details'] = $this->Customer_model->getCustomerDetails(); // Replace 'your_model' with the actual model name and method to retrieve customer details from the database

        // $this->load->view('admin/customerdetails', $data);
        $this->load->view('admin/customerdetails');

        $this->load->view('admin/footer');
    }

    public function editdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['userInfo'] = $this->Customer_model->getUserInfo($id);
        $this->load->view('admin/editdetails', $data);
        $this->load->view('admin/footer');
    }

    public function saveedit()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');

        $id = $this->input->post('id');

        // Handle image uploads
        $config['upload_path'] = './uploads/'; // Specify your upload folder
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2050; // 2MB max file size
        $this->upload->initialize($config);

        $uploaded_images = array();
        $image_fields = array('applicant_photo','applicant_photo2', 'aadhar_photo', 'ration_photo', 'co_applicant_photo', 'co_aadhar_photo', 'co_ration_photo');

        foreach ($image_fields as $field) {
            if ($this->upload->do_upload($field)) {
                // Handle successful upload
                $uploaded_data = $this->upload->data();
                $file_name = time() . '_' . $uploaded_data['file_name'];
                rename($uploaded_data['full_path'], $config['upload_path'] . $file_name);
                $uploaded_images[$field] = $file_name;
            } else {
                // If no new image is uploaded, retain the existing value from the database
                $uploaded_images[$field] = $this->input->post($field . '_existing');
            }
        }

        $name = $this->input->post('name');
        $date = $this->input->post('date');
        $branch_code = $this->input->post('branch_code');
        $branch = $this->input->post('branch');
        $namegroup = $this->input->post('namegroup');
        $client_id = $this->input->post('client_id');
        $centre_name = $this->input->post('centre_name');
        $marital_status = $this->input->post('marital_status');
        $phone = $this->input->post('phone');
        $additional_phone = $this->input->post('additional_phone');
        $religion = $this->input->post('religion');
        // $loan_amount = $this->input->post('loan_amount');
        // $loan_cycle = $this->input->post('loan_cycle');
        $DOB = $this->input->post('DOB');
        $gender = $this->input->post('gender');
        $AppRelation = $this->input->post('AppRelation');
        $address = $this->input->post('address');
        $co_name = $this->input->post('co_name');
        $Co_Applicant_DOB = $this->input->post('Co_Applicant_DOB');
        $Co_Applicant_gender = $this->input->post('Co_Applicant_gender');
        $Co_Applicant_AppRelation = $this->input->post('Co_Applicant_AppRelation');
        $co_address = $this->input->post('co_address');
        $father_name = $this->input->post('father_name');
        $Father_DOB = $this->input->post('Father_DOB');
        $Father_AppRelation = $this->input->post('Father_AppRelation');
        $father_address = $this->input->post('father_address');
        // $applicant_photo = $this->input->post('applicant_photo');
        // $aadhar_photo = $this->input->post('aadhar_photo');
        // $ration_photo = $this->input->post('ration_photo');
        // $co_applicant_photo = $this->input->post('co_applicant_photo');
        // $co_aadhar_photo = $this->input->post('co_aadhar_photo');
        // $co_ration_photo = $this->input->post('co_ration_photo');
        $occupation = $this->input->post('occupation');
        // $numberLoan = $this->input->post('numberLoan');
        // $outstanding = $this->input->post('outstanding');
        // $Paid = $this->input->post('Paid');

        $EditedCustomerDetails = array(
            'name' => $name,
            'created_date' => $date,
            'branch_code' => $branch_code,
            'branch' => $branch,
            'namegroup' => $namegroup,
            'client_id' => $client_id,
            'centre_name' => $centre_name,
            'marital_status' => $marital_status,
            'phone_number' => $phone,
            'additional_phone_number' => $additional_phone,
            'religion' => $religion,
            // 'loan_amount' => $loan_amount,
            // 'loan_cycle' => $loan_cycle,
            'dob' => $DOB,
            'gender' => $gender,
            'app_relation' => $AppRelation,
            'address' => $address,
            'co_applicant_name' => $co_name,
            'co_applicant_dob' => $Co_Applicant_DOB,
            'co_applicant_gender' => $Co_Applicant_gender,
            'co_applicant_app_relation' => $Co_Applicant_AppRelation,
            'co_applicant_address' => $co_address,
            'father_name' => $father_name,
            'father_dob' => $Father_DOB,
            'father_app_relation' => $Father_AppRelation,
            'father_address' => $father_address,
            'applicant_photo' => $uploaded_images['applicant_photo'],
            'applicant_photo2' => $uploaded_images['applicant_photo2'],
            'aadhar_photo' => $uploaded_images['aadhar_photo'],
            'ration_photo' => $uploaded_images['ration_photo'],
            'co_applicant_photo' => $uploaded_images['co_applicant_photo'],
            'co_applicant_aadhar' => $uploaded_images['co_aadhar_photo'],
            'co_applicant_ration' => $uploaded_images['co_ration_photo'],
            'occupation' => $occupation,
            // 'numberLoan' => $numberLoan,
            // 'outstanding' => $outstanding,
            // 'Paid' => $Paid,
        );

        $result = $this->Customer_model->editCustomerDetails($EditedCustomerDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Customer details updated successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', 'Customer details updation failed');
            redirect('Customer/CustomerDetails');
        }
    }


    // public function customerloandetails($id = null)
    // {
    //     // $this->load->view('header');
    //     if ($id = null) {
    //         redirect('Customer/CustomerDetails');
    //     }
    //     $data['customerinfo'] = $this->Customer_model->getcustomerinfo($id);
    //     // $data['loaninfo'] = $this->Customer_model->getloaninfo($id);
    //     $this->load->view('admin/loandetails');
    // }

    public function customerloandetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['customerinfo'] = $this->Customer_model->getcustomerinfo($id);
        $data['loanInfo'] = $this->Customer_model->getloaninfo($id);
        $this->load->view('admin/loandetails', $data);
        $this->load->view('admin/footer');
    }
    // public function ajaxFetchCustomerDetails()
    // {
    //     // $this->load->model('Customer_model');
    //     $postData = $this->input->post();
    //     $this->load->model('Customer_model');

    //     $totalRecords = $this->Customer_model->getTotalRecords();
    //     $filteredRecords = $this->Customer_model->getFilteredRecords($postData);

    //     $customerDetails = $this->Customer_model->getCustomerDetails();

    //     $data = array();
    //     foreach ($customerDetails as $customer) {
    //         $data[] = array(
    //             'name' => $customer['name'],
    //             'dob' => $customer['dob'],
    //             'gender' => $customer['gender'],
    //             'phone_number' => $customer['phone_number'],
    //             'father_name' => $customer['father_name'],
    //             'address' => $customer['address'],
    //             'applicant_photo' => base_url('uploads/' . $customer['applicant_photo']),
    //             'aadhar_photo' => base_url('uploads/' . $customer['aadhar_photo']),
    //             // Add other image URLs here
    //         );
    //     }

    //     echo json_encode(array(
    //         "draw" => $postData['draw'],
    //         "recordsTotal" => $totalRecords,
    //         "recordsFiltered" => count($filteredRecords),
    //         "data" => $data
    //     ));
    // }

    public function ajaxFetchCustomerDetails()
    {
        $postData = $this->input->post();
        // Get data
        $data = $this->Customer_model->getcustomers($postData);

        echo json_encode($data);
    }

    // public function downloadCustomer($customerId)
    // {
    //     // Fetch customer details based on the ID
    //     $customerDetails = $this->Customer_model->getCustomerDetailsById($customerId);

    //     // Generate and send a download response (you can customize this based on your needs)
    //     header('Content-Type: application/json');
    //     header('Content-Disposition: attachment; filename="customer_details.json"');
    //     echo json_encode($customerDetails);
    //     exit;
    // }

    // public function downloadCustomer($customerId)
    // {
    //     // Load TCPDF library
    //     $this->load->library('tcpdf');

    //     // Fetch customer details based on the ID
    //     $customerDetails = $this->Customer_model->getCustomerDetailsById($customerId);

    //     // Generate PDF content
    //     $pdfContent = $this->load->view('pdf_template', ['customerDetails' => $customerDetails], true);

    //     // Set the PDF filename
    //     $pdfFileName = 'customer_details_' . $customerId . '.pdf';

    //     // Create PDF
    //     $this->tcpdf->SetTitle('Customer Details');
    //     $this->tcpdf->AddPage();
    //     $this->tcpdf->writeHTML($pdfContent);
    //     $this->tcpdf->Output($pdfFileName, 'D'); // 'D' for download

    //     exit;
    // }

    public function getCustomerDetailsById($customerId)
    {
        // Fetch customer details based on the ID
        $this->db->where('id', $customerId);
        return $this->db->get('customer_details')->row_array();
    }


    ##Delete Details
    public function deletedetails($id)
    {

        if ($this->db->delete('customer_details', array('id' => $id)) && $this->db->delete('loan', array('customer_id' => $id)) && $this->db->delete('term', array('customer_id' => $id))) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', "Not deleted! Try after some times");
            redirect('Customer/CustomerDetails');
        }
    }

    ## Loan Details View

    public function loanDetails()
    {
        $postData = $this->input->post();
        // Get data
        $data = $this->Customer_model->loanDetails($postData);

        echo json_encode($data);
    }

    public function addLoanDetails()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/addloandetails');
        $this->load->view('admin/footer');
    }

    public function saveloan()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('loanamount', 'Loan Amount', 'required|numeric');
        $this->form_validation->set_rules('loan_cycle', 'Loan Cycle', 'required');
        $this->form_validation->set_rules('date', 'Loan Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, handle errors or redirect as needed
            $this->load->view('your_form_view'); // Load the form view with validation errors
        } else {
            // Handle file uploads
            $config['upload_path'] = './uploads/'; // Specify your upload folder
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $config['max_size'] = 2050; // 2MB max file size
            $this->upload->initialize($config);

            $uploaded_files = array(
                'witnesssignature1', 'witnesssignature2',
                'applicantsignature', 'coapplicantsignature', 'loanofficersignature'
            );

            $uploaded_data = array();

            foreach ($uploaded_files as $field) {
                if ($this->upload->do_upload($field)) {
                    $file_data = $this->upload->data();
                    $file_name = time() . '_' . $file_data['file_name'];
                    rename($file_data['full_path'], $config['upload_path'] . $file_name);
                    $uploaded_data[$field] = $file_name;
                } else {
                    $uploaded_data[$field] = '';
                }
            }

            // Process other form data
            $id = $this->input->post('id');
            $loanamount = $this->input->post('loanamount');
            $loan_cycle = $this->input->post('loan_cycle');
            $loan_status = $this->input->post('loan_status');
            $loan_period = $this->input->post('loan_period');
            $date = $this->input->post('date');

            // Create an array with form data
            $loanDetails = array(
                'customer_id' => $id,
                'loan_amount' => $loanamount,
                'loan_cycle' => $loan_cycle,
                'loan_status' => $loan_status,
                'loan_period' => $loan_period,
                'created_on' => $date,
                'witness_signature_1' => $uploaded_data['witnesssignature1'],
                'witness_signature_2' => $uploaded_data['witnesssignature2'],
                'applicant_signature' => $uploaded_data['applicantsignature'],
                'co_applicant_signature' => $uploaded_data['coapplicantsignature'],
                'loanofficer_signature' => $uploaded_data['loanofficersignature'],
            );

            // Insert data into the database
            if ($this->db->insert('loan', $loanDetails)) {
                $this->session->set_flashdata('success', 'Loan details added successfully.');
                redirect('Customer/customerloandetails'); // Redirect to the appropriate method
            } else {
                // Handle database insertion failure
                $this->session->set_flashdata('error', 'Failed to add loan details.');
                redirect('Customer/customerloandetails'); // Redirect to the appropriate method
            }
        }
    }

    ##Edit Loan
    public function editloandetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['loanInfo'] = $this->Customer_model->getloandetails($id);
        $this->load->view('admin/editloandetails', $data);
        $this->load->view('admin/footer');
    }

    public function editsaveloan()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');

        $id = $this->input->post('id');

        // Handle image uploads
        $config['upload_path'] = './uploads/'; // Specify your upload folder
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2050; // 2MB max file size
        $this->upload->initialize($config);

        $uploaded_images = array();
        $image_fields = array('witnesssignature1', 'witnesssignature2', 'applicantsignature', 'coapplicantsignature', 'loanofficersignature');

        foreach ($image_fields as $field) {
            if ($this->upload->do_upload($field)) {
                // Handle successful upload
                $uploaded_data = $this->upload->data();
                $file_name = time() . '_' . $uploaded_data['file_name'];
                rename($uploaded_data['full_path'], $config['upload_path'] . $file_name);
                $uploaded_images[$field] = $file_name;
            } else {
                // If no new image is uploaded, retain the existing value from the database
                $uploaded_images[$field] = $this->input->post($field . '_existing');
            }
        }

        $loanamount = $this->input->post('loanamount');
        $date = $this->input->post('date');
        $loan_cycle = $this->input->post('loan_cycle');
        $loan_status = $this->input->post('loan_status');
        $loan_period = $this->input->post('loan_period');


        $EditedLoanDetails = array(
            'loan_amount' => $loanamount,
            'created_on' => $date,
            'loan_cycle' => $loan_cycle,
            'loan_status' => $loan_status,
            'loan_period' => $loan_period,

            'witness_signature_1' => $uploaded_images['witnesssignature1'],
            'witness_signature_2' => $uploaded_images['witnesssignature2'],
            'applicant_signature' => $uploaded_images['applicantsignature'],
            'co_applicant_signature' => $uploaded_images['coapplicantsignature'],
            'loanofficer_signature' => $uploaded_images['loanofficersignature'],

        );

        $result = $this->Customer_model->editLoanDetails($EditedLoanDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Loan details updated successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', 'Loan details updation failed');
            redirect('Customer/CustomerDetails');
        }
    }

    ##Delete Loan
    public function deleteloandetails($id)
    {

        if ($this->db->delete('loan', array('id' => $id)) && $this->db->delete('term', array('loan_id' => $id))) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', "Not deleted! Try after some times");
            redirect('Customer/CustomerDetails');
        }
    }

    ##Term 
    public function termdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['customerloaninfo'] = $this->Customer_model->getcustomerloaninfo($id);
        // $data['balanceloan'] = $this->Customer_model->balanceloan($id);
        $data['termInfo'] = $this->Customer_model->getterminfo($id);
        $this->load->view('admin/termdetails', $data);
        $this->load->view('admin/footer');
    }

    ##Save Term
    public function saveterm()
    {
        $this->load->helper('form');
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('term', 'Term', 'required');
        $this->form_validation->set_rules('amount', 'Amount ', 'required');
        $this->form_validation->set_rules('collectionDate', 'Collection Date ', 'required');


        if ($this->form_validation->run() == FALSE) {
            redirect('Customer/CustomerDetails');
        } else {

            $loan_id = $this->input->post('loan_id');
            $customer_id = $this->input->post('customer_id');
            $collectionDate = $this->input->post('collectionDate');
            $amount = $this->input->post('amount');
            $term = $this->input->post('term');
            $status = $this->input->post('status');

            $TermDetails = array(
                'loan_id' => $loan_id,
                'customer_id' => $customer_id,
                'collectionDate' => $collectionDate,
                'amount' => $amount,
                'term' => $term,
                'status' => $status,

            );

            if ($this->db->insert('term', $TermDetails)) {
                $this->session->set_flashdata('success', 'Term added successfully.');
                redirect('Customer/CustomerDetails');
            } else {
                redirect('Customer/CustomerDetails');
            }
        }
    }

    public function edittermdetails($id)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['termInfo'] = $this->Customer_model->gettermdetails($id);
        $this->load->view('admin/edittermdetails', $data);
        $this->load->view('admin/footer');
    }

    public function editsaveterm()
    {
        $id = $this->input->post('id');
        $term = $this->input->post('term');
        $amount = $this->input->post('amount');
        $collectionDate = $this->input->post('collectionDate');
        $status = $this->input->post('status');


        $EditedTermDetails = array(
            'term' => $term,
            'amount' => $amount,
            'status' => $status,
            'collectionDate' => $collectionDate,


        );

        $result = $this->Customer_model->editTermDetails($EditedTermDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Term details updated successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', 'Term details updation failed');
            redirect('Customer/CustomerDetails');
        }
    }

    ##Delete Term
    public function deletetermdetails($id)
    {

        if ($this->db->delete('term', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('Customer/CustomerDetails');
        } else {
            $this->session->set_flashdata('error', "Not deleted! Try after some times");
            redirect('Customer/CustomerDetails');
        }
    }



    ##User Details
    // public function userdetails()
    // {

    //         $id = $_GET['id'];
    //         $this->load->view('admin/header');
    //         $data['userdetails'] = $this->Customer_model->getuserdetails($id);
    //         $this->load->view('admin/userdetails', $data);
    //         $this->load->view('admin/footer');

    // }

    public function userdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }
        $data['userdetails'] = $this->Customer_model->getuserdetails($id);
        $this->load->view('admin/userdetails', $data);
        $this->load->view('admin/footer');
    }

    # This command pdf works good ,commended for css and A4 paper size etc,Dont delete it
    // public function downloadCustomer($id = NULL)
    // {
        
    //     if ($id == null) {
    //         redirect('Customer/CustomerDetails');
    //     }
    //     $data['userdetails'] = $this->Customer_model->getuserdetails($id);
    //    $html= $this->load->view('admin/pdf_template', $data,true);
    //    $dompdf = new Dompdf();
    //    $dompdf ->loadHtml($html);
    //    $dompdf -> render();
    //    $dompdf -> stream();
        
    // }

    public function downloadCustomer($id = NULL)
    {
        if ($id == null) {
            redirect('Customer/CustomerDetails');
        }

        $data['userdetails'] = $this->Customer_model->getuserdetails($id);

        // Load Dompdf library
        $dompdf = new Dompdf();

        // Set base path for Dompdf
        $dompdf->setBasePath(base_url());

        // Load HTML content into Dompdf
        $html = $this->load->view('admin/pdf_template', $data, true);
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Enable CSS
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to the browser
        $dompdf->stream('customer_details.pdf');
    }




    ##Download PDF
    public function downloadPdf()
    {
        // Load the dompdf library
        $this->load->library('dompdf_lib');
        $data['userdetails'] = $this->Customer_model->getuserdetails($id);

        // Load the view file into a variable
        $html = $this->load->view('admin/userdetails', $data, true);

        // Load the PDF object
        $this->dompdf_lib->load();

        // Set paper size (A4)
        $this->dompdf_lib->set_paper('A4', 'portrait');

        // Load HTML content into the PDF
        $this->dompdf_lib->load_html($html);

        // Render PDF (first parameter is used to save the file, false means download)
        $this->dompdf_lib->render();
        $this->dompdf_lib->stream("customer_details.pdf", array('Attachment' => false));
    }



    ## Savings Account
    public function addSavingsCustomerDetails()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/addsavingcustomerdetails');
        $this->load->view('admin/footer');
    }

    ##Saving Details
    public function savesavings()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        // $this->form_validation->set_rules('branch_code', 'Branch Code ', 'required');
        // $this->form_validation->set_rules('branch', 'Branch ', 'required');
        // $this->form_validation->set_rules('client_id', 'Client Id ', 'required');
        // $this->form_validation->set_rules('centre_name', 'Centre Name ', 'required');
        // $this->form_validation->set_rules('phone', 'Phone Number ', 'required');
        // $this->form_validation->set_rules('loan_amount', 'Loan Amount ', 'required');
        // $this->form_validation->set_rules('address', 'Address ', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Customer/CustomerDetails');
        } else {

            // Handle image uploads
            $config['upload_path'] = './uploads/'; // Specify your upload folder
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2050; // 2MB max file size
            $this->upload->initialize($config);

            $uploaded_images = array();
            $image_fields = array('applicant_photo');

            foreach ($image_fields as $field) {
                if ($this->upload->do_upload($field)) {
                    $uploaded_data = $this->upload->data();
                    $file_name = time() . '_' . $uploaded_data['file_name']; // Append timestamp to the original file name
                    rename($uploaded_data['full_path'], $config['upload_path'] . $file_name); // Rename the uploaded file
                    $uploaded_images[$field] = $file_name; // Store the renamed file names in an array
                } else {
                    // Handle upload errors here, if any
                    $uploaded_images[$field] = ''; // Set the field value to empty string if upload fails
                }
            }

            $name = $this->input->post('name');
            $date = $this->input->post('date');
            $branch_code = $this->input->post('branch_code');
            $branch = $this->input->post('branch');
            // $namegroup = $this->input->post('namegroup');
            // $client_id = $this->input->post('client_id');
            // $centre_name = $this->input->post('centre_name');
            // $marital_status = $this->input->post('marital_status');
            $phone = $this->input->post('phone');
            // $additional_phone = $this->input->post('additional_phone');
            // $religion = $this->input->post('religion');
            // $loan_amount = $this->input->post('loan_amount');
            // $loan_cycle = $this->input->post('loan_cycle');
            $DOB = $this->input->post('DOB');
            $gender = $this->input->post('gender');
            // $AppRelation = $this->input->post('AppRelation');
            $address = $this->input->post('address');
            // $co_name = $this->input->post('co_name');
            // $Co_Applicant_DOB = $this->input->post('Co_Applicant_DOB');
            // $Co_Applicant_gender = $this->input->post('Co_Applicant_gender');
            // $Co_Applicant_AppRelation = $this->input->post('Co_Applicant_AppRelation');
            // $co_address = $this->input->post('co_address');
            // $father_name = $this->input->post('father_name');
            // $Father_DOB = $this->input->post('Father_DOB');
            // $Father_AppRelation = $this->input->post('Father_AppRelation');
            // $father_address = $this->input->post('father_address');
            // $applicant_photo = $this->input->post('applicant_photo');
            // $aadhar_photo = $this->input->post('aadhar_photo');
            // $ration_photo = $this->input->post('ration_photo');
            // $co_applicant_photo = $this->input->post('co_applicant_photo');
            // $co_aadhar_photo = $this->input->post('co_aadhar_photo');
            // $co_ration_photo = $this->input->post('co_ration_photo');
            // $occupation = $this->input->post('occupation');
            // $numberLoan = $this->input->post('numberLoan');
            // $outstanding = $this->input->post('outstanding');
            // $Paid = $this->input->post('Paid');

            $CustomerDetails = array(
                'name' => $name,
                'created_date' => $date,
                'branch_code' => $branch_code,
                'branch' => $branch,
                // 'namegroup' => $namegroup,
                // 'client_id' => $client_id,
                // 'centre_name' => $centre_name,
                // 'marital_status' => $marital_status,
                'phone_number' => $phone,
                // 'additional_phone_number' => $additional_phone,
                // 'religion' => $religion,
                // 'loan_amount' => $loan_amount,
                // 'loan_cycle' => $loan_cycle,
                'dob' => $DOB,
                'gender' => $gender,
                // 'app_relation' => $AppRelation,
                'address' => $address,
                // 'co_applicant_name' => $co_name,
                // 'co_applicant_dob' => $Co_Applicant_DOB,
                // 'co_applicant_gender' => $Co_Applicant_gender,
                // 'co_applicant_app_relation' => $Co_Applicant_AppRelation,
                // 'co_applicant_address' => $co_address,
                // 'father_name' => $father_name,
                // 'father_dob' => $Father_DOB,
                // 'father_app_relation' => $Father_AppRelation,
                // 'father_address' => $father_address,
                'applicant_photo' => $uploaded_images['applicant_photo'],
                // 'aadhar_photo' => $uploaded_images['aadhar_photo'],
                // 'ration_photo' => $uploaded_images['ration_photo'],
                // 'co_applicant_photo' => $uploaded_images['co_applicant_photo'],
                // 'co_applicant_aadhar' => $uploaded_images['co_aadhar_photo'],
                // 'co_applicant_ration' => $uploaded_images['co_ration_photo'],
                // 'occupation' => $occupation,
                // 'numberLoan' => $numberLoan,
                // 'outstanding' => $outstanding,
                // 'Paid' => $Paid,
            );

            if ($this->db->insert('saving_customer_details', $CustomerDetails)) {
                $this->session->set_flashdata('success', 'Customer added successfully.');
                redirect('Customer/SavingsDetails');
            } else {
                redirect('Customer/SavingsDetails');
            }
        }
    }

    ## Savings Account Details view
    public function SavingsDetails()
    {
        $this->load->view('admin/header');
        // $this->load->view('admin/customerdetails');
        // $data['customer_details'] = $this->Customer_model->getCustomerDetails(); // Replace 'your_model' with the actual model name and method to retrieve customer details from the database

        // $this->load->view('admin/customerdetails', $data);
        $this->load->view('admin/savingsdetails');

        $this->load->view('admin/footer');
    }

    ##View Account Details
    public function ajaxFetchSavingsDetails()
    {
        $postData = $this->input->post();
        // Get data
        $data = $this->Customer_model->getsavingscustomers($postData);

        echo json_encode($data);
    }

    ##Edit Savings account
    public function editsavingsdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['userInfo'] = $this->Customer_model->getSavingsUserInfo($id);
        $this->load->view('admin/editsavingsdetails', $data);
        $this->load->view('admin/footer');
    }

    public function editsavings()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');

        $id = $this->input->post('id');

        // Handle image uploads
        $config['upload_path'] = './uploads/'; // Specify your upload folder
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2050; // 2MB max file size
        $this->upload->initialize($config);

        $uploaded_images = array();
        $image_fields = array('applicant_photo');

        foreach ($image_fields as $field) {
            if ($this->upload->do_upload($field)) {
                // Handle successful upload
                $uploaded_data = $this->upload->data();
                $file_name = time() . '_' . $uploaded_data['file_name'];
                rename($uploaded_data['full_path'], $config['upload_path'] . $file_name);
                $uploaded_images[$field] = $file_name;
            } else {
                // If no new image is uploaded, retain the existing value from the database
                $uploaded_images[$field] = $this->input->post($field . '_existing');
            }
        }

        $name = $this->input->post('name');
        $date = $this->input->post('date');
        $branch_code = $this->input->post('branch_code');
        $branch = $this->input->post('branch');
        // $namegroup = $this->input->post('namegroup');
        // $client_id = $this->input->post('client_id');
        // $centre_name = $this->input->post('centre_name');
        // $marital_status = $this->input->post('marital_status');
        $phone = $this->input->post('phone');
        // $additional_phone = $this->input->post('additional_phone');
        // $religion = $this->input->post('religion');
        // $loan_amount = $this->input->post('loan_amount');
        // $loan_cycle = $this->input->post('loan_cycle');
        $DOB = $this->input->post('DOB');
        $gender = $this->input->post('gender');
        // $AppRelation = $this->input->post('AppRelation');
        $address = $this->input->post('address');
        // $co_name = $this->input->post('co_name');
        // $Co_Applicant_DOB = $this->input->post('Co_Applicant_DOB');
        // $Co_Applicant_gender = $this->input->post('Co_Applicant_gender');
        // $Co_Applicant_AppRelation = $this->input->post('Co_Applicant_AppRelation');
        // $co_address = $this->input->post('co_address');
        // $father_name = $this->input->post('father_name');
        // $Father_DOB = $this->input->post('Father_DOB');
        // $Father_AppRelation = $this->input->post('Father_AppRelation');
        // $father_address = $this->input->post('father_address');
        // $applicant_photo = $this->input->post('applicant_photo');
        // $aadhar_photo = $this->input->post('aadhar_photo');
        // $ration_photo = $this->input->post('ration_photo');
        // $co_applicant_photo = $this->input->post('co_applicant_photo');
        // $co_aadhar_photo = $this->input->post('co_aadhar_photo');
        // $co_ration_photo = $this->input->post('co_ration_photo');
        // $occupation = $this->input->post('occupation');
        // $numberLoan = $this->input->post('numberLoan');
        // $outstanding = $this->input->post('outstanding');
        // $Paid = $this->input->post('Paid');

        $EditedSavingsDetails = array(
            'name' => $name,
            'created_date' => $date,
            'branch_code' => $branch_code,
            'branch' => $branch,
            // 'namegroup' => $namegroup,
            // 'client_id' => $client_id,
            // 'centre_name' => $centre_name,
            // 'marital_status' => $marital_status,
            'phone_number' => $phone,
            // 'additional_phone_number' => $additional_phone,
            // 'religion' => $religion,
            // 'loan_amount' => $loan_amount,
            // 'loan_cycle' => $loan_cycle,
            'dob' => $DOB,
            'gender' => $gender,
            // 'app_relation' => $AppRelation,
            'address' => $address,
            // 'co_applicant_name' => $co_name,
            // 'co_applicant_dob' => $Co_Applicant_DOB,
            // 'co_applicant_gender' => $Co_Applicant_gender,
            // 'co_applicant_app_relation' => $Co_Applicant_AppRelation,
            // 'co_applicant_address' => $co_address,
            // 'father_name' => $father_name,
            // 'father_dob' => $Father_DOB,
            // 'father_app_relation' => $Father_AppRelation,
            // 'father_address' => $father_address,
            'applicant_photo' => $uploaded_images['applicant_photo'],
            // 'aadhar_photo' => $uploaded_images['aadhar_photo'],
            // 'ration_photo' => $uploaded_images['ration_photo'],
            // 'co_applicant_photo' => $uploaded_images['co_applicant_photo'],
            // 'co_applicant_aadhar' => $uploaded_images['co_aadhar_photo'],
            // 'co_applicant_ration' => $uploaded_images['co_ration_photo'],
            // 'occupation' => $occupation,
            // 'numberLoan' => $numberLoan,
            // 'outstanding' => $outstanding,
            // 'Paid' => $Paid,
        );

        $result = $this->Customer_model->editSavingsDetails($EditedSavingsDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Savings details updated successfully');
            redirect('Customer/SavingsDetails');
        } else {
            $this->session->set_flashdata('error', 'Savings details updation failed');
            redirect('Customer/SavingsDetails');
        }
    }


    public function customersavingsdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['customerinfo'] = $this->Customer_model->getsavingscustomerinfo($id);
        $data['account'] = $this->Customer_model->getaccount($id);
        $this->load->view('admin/savingsamountdetails', $data);
        $this->load->view('admin/footer');
    }

     ##Delete Details
     public function deletesavingsdetails($id)
     {
 
         if ($this->db->delete('saving_customer_details', array('id' => $id)) && $this->db->delete('account', array('savingId' => $id)) && $this->db->delete('termaccount', array('savingid' => $id))) {
             $this->session->set_flashdata('success', 'Deleted successfully');
             redirect('Customer/SavingsDetails');
         } else {
             $this->session->set_flashdata('error', "Not deleted! Try after some times");
             redirect('Customer/SavingsDetails');
         }
     }

    public function saveaccount()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('date', ' Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, handle errors or redirect as needed
            $this->load->view('your_form_view'); // Load the form view with validation errors
        } else {


            // Process other form data
            $id = $this->input->post('id');
            $loan_status = $this->input->post('loan_status');
            $date = $this->input->post('date');

            // Create an array with form data
            $loanDetails = array(
                'savingId' => $id,
                'status' => $loan_status,
                'created_on' => $date,

            );

            // Insert data into the database
            if ($this->db->insert('account', $loanDetails)) {
                $this->session->set_flashdata('success', 'Account added successfully.');
                redirect('Customer/customersavingsdetails'); // Redirect to the appropriate method
            } else {
                // Handle database insertion failure
                $this->session->set_flashdata('error', 'Failed to add Account.');
                redirect('Customer/customersavingsdetails'); // Redirect to the appropriate method
            }
        }
    }

    ##Edit account
    public function editsavingsaccountdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['accountInfo'] = $this->Customer_model->getsavingaccountdetails($id);
        $this->load->view('admin/editsavingsaccountdetails', $data);
        $this->load->view('admin/footer');
    }

    public function editsavingaccount()
    {
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('Form_validation');

        $id = $this->input->post('id');
        $status = $this->input->post('status');
    
        $EditedAccountDetails = array(
            
            'status' => $status,
        );

        $result = $this->Customer_model->editAccountDetails($EditedAccountDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Account details updated successfully');
            redirect('Customer/SavingsDetails');
        } else {
            $this->session->set_flashdata('error', 'Account details updation failed');
            redirect('Customer/SavingsDetails');
        }
    }

    public function deletesavingsaccountdetails($id)
    {

        if ($this->db->delete('account', array('id' => $id)) && $this->db->delete('termaccount', array('accountid' => $id))) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('Customer/SavingsDetails');
        } else {
            $this->session->set_flashdata('error', "Not deleted! Try after some times");
            redirect('Customer/SavingsDetails');
        }
    }
    ##Term 
    public function savingstermdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['customerloaninfo'] = $this->Customer_model->getcustomeraccountinfo($id);
        // $data['balanceloan'] = $this->Customer_model->balanceloan($id);
        $data['termInfo'] = $this->Customer_model->getaccountterminfo($id);
        $this->load->view('admin/savingstermdetails', $data);
        $this->load->view('admin/footer');
    }

    public function savingsterm()
    {
        $this->load->helper('form');
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('term', 'Term', 'required');
        $this->form_validation->set_rules('amount', 'Amount ', 'required');
        $this->form_validation->set_rules('collectionDate', 'Collection Date ', 'required');


        if ($this->form_validation->run() == FALSE) {
            redirect('Customer/SavingsDetails');
        } else {

            $account_id = $this->input->post('account_id');
            $savings_id = $this->input->post('savings_id');
            $collectionDate = $this->input->post('collectionDate');
            $amount = $this->input->post('amount');
            $term = $this->input->post('term');
            // $status = $this->input->post('status');

            $TermDetails = array(
                'accountid' => $account_id,
                'savingid' => $savings_id,
                'collectionDate' => $collectionDate,
                'amount' => $amount,
                'term' => $term,
                // 'status' => $status,

            );

            if ($this->db->insert('termaccount', $TermDetails)) {
                $this->session->set_flashdata('success', 'Term added successfully.');
                redirect('Customer/SavingsDetails');
            } else {
                redirect('Customer/SavingsDetails');
            }
        }
    }

    public function editsavingstermdetails($id)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['termInfo'] = $this->Customer_model->getsavingstermdetails($id);
        $this->load->view('admin/editsavingstermdetails', $data);
        $this->load->view('admin/footer');
    }

    public function editsavingsterm()
    {
        $id = $this->input->post('id');
        $term = $this->input->post('term');
        $amount = $this->input->post('amount');
        $collectionDate = $this->input->post('collectionDate');
        // $status = $this->input->post('status');


        $EditedTermDetails = array(
            'term' => $term,
            'amount' => $amount,
            // 'status' => $status,
            'collectionDate' => $collectionDate,


        );

        $result = $this->Customer_model->editSavingsTermDetails($EditedTermDetails, $id);
        if ($result == true) {
            $this->session->set_flashdata('success', 'Term details updated successfully');
            redirect('Customer/SavingsDetails');
        } else {
            $this->session->set_flashdata('error', 'Term details updation failed');
            redirect('Customer/SavingsDetails');
        }
    }

    ##Delete Term
    public function deletesavingstermdetails($id)
    {

        if ($this->db->delete('termaccount', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('Customer/SavingsDetails');
        } else {
            $this->session->set_flashdata('error', "Not deleted! Try after some times");
            redirect('Customer/SavingsDetails');
        }
    }

    ##User saving full details
    public function usersavingsdetails($id = NULL)
    {
        $this->load->view('admin/header');
        if ($id == null) {
            redirect('Customer/SavingsDetails');
        }
        $data['userdetails'] = $this->Customer_model->getsavingsuserdetails($id);
        $this->load->view('admin/usersavingsdetails', $data);
        $this->load->view('admin/footer');
    }

    public function upload_image()
    {
        $config['upload_path'] = './uploads/'; // Specify the upload directory
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Allowed image file types
        $config['max_size'] = 2048; // Maximum file size in kilobytes (2MB)
        $config['file_name'] = time() . '_' . $_FILES['image']['name']; // Set file name to current timestamp + original file name
        $config['file_name'] = time() . '_' . $_FILES['demo']['name']; // Set file name to current timestamp + original file name
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image') && !$this->upload->do_upload('demo')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle the upload error, if any
        } else {
            $data = $this->upload->data();
            $image_path = 'uploads/' . $data['file_name']; // Get the uploaded image path
            $demo = 'uploads/' . $data['file_name']; // Get the uploaded image path

            // Insert the image path into the "demo" table in the database
            $this->Customer_model->insert_image($image_path, $demo);

            // Redirect or show a success message
            redirect('customer/addCustomerDetails');
        }
    }


    public function view_image()
    {
        // Retrieve the image path and demo from the database
        $image_data = $this->Customer_model->get_image_data(); // Implement this method in your model to retrieve image path and demo from the database

        $data['applicant_photo'] = $image_data['applicant_photo'];
        $data['aadhar_photo'] = $image_data['aadhar_photo'];

        $this->load->view('admin/view_image', $data);
    }
}
