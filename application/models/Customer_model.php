<?php
class Customer_model extends CI_Model
{
    public function insert_image($image_path, $demo)
    {
        $data = array(
            'image_path' => $image_path,
            'demo' => $demo
        );
        $this->db->insert('demo', $data); // Insert data into "demo" table
    }

    public function get_image_data()
    {
        $query = $this->db->get('customer_details'); // Get data from "demo" table

        if ($query->num_rows() > 0) {
            $row = $query->row_array(); // Return result as associative array
            return $row;
        }

        return array(); // Return an empty array if no data is found
    }

    public function getCustomerDetails()
    {
        $this->db->order_by('id', 'desc');
        // Replace 'customer_details' with your actual table name
        $query = $this->db->get('customer_details');

        // Check if there are any results
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Return customer details as an array
        } else {
            return array(); // Return an empty array if no data is found
        }
    }

    public function getTotalRecords()
    {
        return $this->db->count_all('customer_details');
    }

    public function getFilteredRecords($postData)
    {
        $this->db->start_cache();

        // Apply search term
        if (!empty($postData['search']['value'])) {
            $this->db->like('name', $postData['search']['value']);
        }

        // Apply sorting
        // if (!empty($postData['order'])) {
        //     $this->db->order_by($postData['columns'][$postData['order'][0]['column']]['data'], $postData['order'][0]['dir']);
        // }

        $this->db->stop_cache();

        $this->db->limit($postData['length'], $postData['start']);
        $query = $this->db->get('customer_details');

        return $query->result_array();
    }

    ##customer
    public function getcustomers($postData = null)
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        // $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (name like '%" . $searchValue . "%' or 
            phone_number like '%" . $searchValue . "%'   ) ";
        }


        ## Total number of records without filtering
        $this->db->select('count(*) as allcount ');

        $this->db->from('customer_details');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('customer_details')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->order_by('id', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('customer_details')->result();
        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                // 'id' => $record->id,
                "name" => '<a href="userdetails/' . $id = $record->id . '">' . $record->name . '</a>',
                // 'name' => $record->name,
                'dob' => $record->dob,
                'gender' => $record->gender,
                'namegroup' => $record->namegroup,
                'client_id' => $record->client_id,
                'phone_number' => $record->phone_number,
                'father_name' => $record->father_name,
                'address' => $record->address,
                'applicant_photo' => base_url('uploads/' . $record->applicant_photo),
                'aadhar_photo' => base_url('uploads/' . $record->aadhar_photo),
                'download' => '<a href="' . base_url('Customer/downloadCustomer/' . $record->id) . '" class="btn btn-info btn-sm">Download</a>', // Download button
                "loan" => '<a href="customerloandetails/' . $id = $record->id . '" class="btn  btn-primary"> <i class="fas fa-money-check" aria-hidden="true"></i>Loan</a>',
                "actions" => '<a href="editdetails/' . $id = $record->id . '" class="btn btn-sm btn-success"> <i class="fas fa-edit" aria-hidden="true"></i>Edit</a> <a href="deletedetails/' . $id = $record->id . '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fas fa-trash"></i>Delete</button></a>',
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return $response;
    }
    public function getCustomerDetailsById($customerId)
    {
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('id', $customerId);
        $query = $this->db->get();

        // Check if a record exists with the given ID
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    ##Edit Customer Details
    function getUserInfo($id)
    {
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getImagePaths($id)
    {
        // Fetch existing image paths from the database based on the $id
        $this->db->select('applicant_photo, aadhar_photo, ration_photo, co_applicant_photo, co_aadhar_photo, co_ration_photo');
        $this->db->from('customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array(
                'applicant_photo' => '',
                'aadhar_photo' => '',
                'ration_photo' => '',
                'co_applicant_photo' => '',
                'co_aadhar_photo' => '',
                'co_ration_photo' => ''
            );
        }
    }


    function editCustomerDetails($EditedCustomerDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('customer_details', $EditedCustomerDetails);
        return TRUE;
    }

    public function getcustomerinfo($id)
    {
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getloaninfo($id)
    {
        $this->db->where('customer_id', $id);
        return $this->db->get('loan')->result();
    }

    ##Loan View
    public function loanDetails($postData = null)
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        // $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (name like '%" . $searchValue . "%' or 
            phone_number like '%" . $searchValue . "%'   ) ";
        }


        ## Total number of records without filtering
        $this->db->select('count(*) as allcount ');

        $this->db->from('loan');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('loan')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->order_by('id', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('loan')->result();
        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                'id' => $record->id,
                'loan_amount' => $record->loan_amount,
                'loan_cycle' => $record->loan_cycle,
                'created_on' => $record->created_on,
                'withness_signature_1' => base_url('uploads/' . $record->witness_signature_1),
                'withness_signature_2' => base_url('uploads/' . $record->witness_signature_2),
                'applicant_signature' => base_url('uploads/' . $record->applicant_signature),
                'co_applicant_signature' => base_url('uploads/' . $record->co_applicant_signature),
                'loanofficer_signature' => base_url('uploads/' . $record->loanofficer_signature),
                // "loan" => '<a href="customerloandetails/' . $id = $record->id . '" class="btn  btn-primary"> <i class="fas fa-money-check" aria-hidden="true"></i>Loan</a>',
                // "actions" => '<a href="editloandetails/' . $record->id . '" class="btn btn-sm btn-success"> <i class="fas fa-edit" aria-hidden="true"></i>Edit</a> <a href="Customer/deletedetails/' . $record->id . '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fas fa-trash"></i>Delete</button></a>',
                'actions' => '<a href="' . base_url("Customer/termdetails/{$record->id}") . '" class="btn btn-sm btn-primary"><i class="fas fa-plus" aria-hidden="true"></i>Term</a> <a href="' . base_url("Customer/editloandetails/{$record->id}") . '" class="btn btn-sm btn-success"><i class="fas fa-edit" aria-hidden="true"></i>Edit</a> <a href="' . base_url("Customer/deleteloandetails/{$record->id}") . '" class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fas fa-trash"></i>Delete</a>'
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return $response;
    }

    ##Edit Loan Details
    function getloandetails($id)
    {
        $this->db->select('*');
        $this->db->from('loan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function editLoanDetails($EditedLoanDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('loan', $EditedLoanDetails);
        return TRUE;
    }

    ##Term info
    // function getcustomerloaninfo($id)
    // {
    //     $this->db->select('loan.*, customer_details.name,customer_details.phone_number');
    //     $this->db->from('loan');
    //     $this->db->join('customer_details', 'loan.customer_id = customer_details.id');
    //     $this->db->where('loan.id', $id);
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    public function getterminfo($id)
    {
        $this->db->where('loan_id', $id);
        return $this->db->get('term')->result();
    }
    // function getcustomerloaninfo($id)
    // {
    //     $this->db->select('loan.*, customer_details.name, customer_details.phone_number, COUNT(term.id) as term_count');
    //     $this->db->from('loan');
    //     $this->db->join('customer_details', 'loan.customer_id = customer_details.id');
    //     $this->db->join('term', 'loan.id = term.loan_id', 'left'); // Join with term table
    //     $this->db->where('loan.id', $id);
    //     $this->db->group_by('loan.id'); // Group by loan.id to get accurate term_count
    //     $query = $this->db->get();

    //     $result = $query->row();

    //     // Calculate remaining loan period
    //     if ($result) {
    //         $loanPeriod = intval($result->loan_period);
    //         $termCount = intval($result->term_count);

    //         // Calculate remaining loan period by subtracting term count from loan period
    //         $result->remaining_loan_period = max(0, $loanPeriod - $termCount);
    //     }

    //     return $result;
    // }

    function getcustomerloaninfo($id)
    {
        $this->db->select('loan.*, customer_details.name, customer_details.phone_number, COUNT(term.id) as term_count, SUM(term.amount) as total_term_amount');
        $this->db->from('loan');
        $this->db->join('customer_details', 'loan.customer_id = customer_details.id');
        $this->db->join('term', 'loan.id = term.loan_id', 'left'); // Join with term table
        $this->db->where('loan.id', $id);
        $this->db->group_by('loan.id'); // Group by loan.id to get accurate term_count
        $query = $this->db->get();

        $result = $query->row();

        // Calculate remaining loan period
        if ($result) {
            $loanPeriod = intval($result->loan_period);
            $termCount = intval($result->term_count);

            // Calculate remaining loan period by subtracting term count from loan period
            $result->remaining_loan_period = max(0, $loanPeriod - $termCount);
        }

        return $result;
    }


    ##Edit Term Details
    function gettermdetails($id)
    {
        $this->db->select('*');
        $this->db->from('term');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function editTermDetails($EditedTermDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('term', $EditedTermDetails);
        return TRUE;
    }

    ##User Details
    public function getuserdetails($id)
    {
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }



    ##Savings account view
    public function getsavingscustomers($postData = null)
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        // $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (name like '%" . $searchValue . "%' or 
            phone_number like '%" . $searchValue . "%'   ) ";
        }


        ## Total number of records without filtering
        $this->db->select('count(*) as allcount ');

        $this->db->from('saving_customer_details');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('saving_customer_details')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');

        if ($searchQuery != '')
            $this->db->where($searchQuery);
        // $this->db->order_by($columnName, $columnSortOrder);
        $this->db->order_by('id', 'desc');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('saving_customer_details')->result();
        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                // 'id' => $record->id,
                "name" => '<a href="usersavingsdetails/' . $id = $record->id . '">' . $record->name . '</a>',
                // 'name' => $record->name,
                'dob' => $record->dob,
                'gender' => $record->gender,
                // 'namegroup' => $record->namegroup,
                // 'client_id' => $record->client_id,
                'phone_number' => $record->phone_number,
                // 'father_name' => $record->father_name,
                'address' => $record->address,
                'applicant_photo' => base_url('uploads/' . $record->applicant_photo),
                // 'aadhar_photo' => base_url('uploads/' . $record->aadhar_photo),
                // 'download' => '<a href="' . base_url('Customer/downloadCustomer/' . $record->id) . '" class="btn btn-info btn-sm">Download</a>', // Download button
                "savings" => '<a href="customersavingsdetails/' . $id = $record->id . '" class="btn  btn-primary"> <i class="fas fa-money-check" aria-hidden="true"></i> Savings</a>',
                "actions" => '<a href="editsavingsdetails/' . $id = $record->id . '" class="btn btn-sm btn-success"> <i class="fas fa-edit" aria-hidden="true"></i>Edit</a> <a href="deletesavingsdetails/' . $id = $record->id . '"><button class="btn btn-sm btn-danger" onClick="return doconfirm();"><i class="fas fa-trash"></i>Delete</button></a>',
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return $response;
    }

    ##Edit savigns account
    function getSavingsUserInfo($id)
    {
        $this->db->select('*');
        $this->db->from('saving_customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function editSavingsDetails($EditedSavingsDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('saving_customer_details', $EditedSavingsDetails);
        return TRUE;
    }


    public function getsavingscustomerinfo($id)
    {
        $this->db->select('*');
        $this->db->from('saving_customer_details');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getaccount($id)
    {
        $this->db->where('savingId', $id);
        return $this->db->get('account')->result();
    }

    // function getcustomeraccountinfo($id)
    // {
    //     $this->db->select('account.*, saving_customer_details.name,saving_customer_details.phone_number');
    //     $this->db->from('account');
    //     $this->db->join('saving_customer_details', 'account.savingId = saving_customer_details.id');
    //     $this->db->where('account.id', $id);
    //     $query = $this->db->get();
    //     return $query->row();
    // }
    function getcustomeraccountinfo($id)
    {
        $this->db->select('account.*, saving_customer_details.name, saving_customer_details.phone_number, SUM(termaccount.amount) as total_amount');
        $this->db->from('account');
        $this->db->join('saving_customer_details', 'account.savingId = saving_customer_details.id');
        $this->db->join('termaccount', 'account.id = termaccount.accountid', 'left');
        $this->db->where('account.id', $id);
        $this->db->group_by('account.id'); // Group by account.id to get the sum per account

        $query = $this->db->get();
        return $query->row();
    }

    public function getaccountterminfo($id)
    {
        $this->db->where('accountid', $id);
        return $this->db->get('termaccount')->result();
    }

    function getsavingaccountdetails($id)
    {
        $this->db->select('*');
        $this->db->from('account');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    function editAccountDetails($EditedAccountDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('account', $EditedAccountDetails);
        return TRUE;
    }

    ##Edit Term Details
    function getsavingstermdetails($id)
    {
        $this->db->select('*');
        $this->db->from('termaccount');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function editSavingsTermDetails($EditedTermDetails, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('termaccount', $EditedTermDetails);
        return TRUE;
    }

     ##User Details
     public function getsavingsuserdetails($id)
     {
         $this->db->select('*');
         $this->db->from('saving_customer_details');
         $this->db->where('id', $id);
         $query = $this->db->get();
         return $query->row();
     }
}
