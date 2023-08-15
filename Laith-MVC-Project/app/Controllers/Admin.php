<?php
SessionHelper::start();



class Admin extends BaseController
{

    private readonly mixed $AdminModel;
    private $delay = 5; // Define the delay property with a default value of 5 seconds


    public function __construct()
    {


        $this->AdminModel = $this->model('AdminModel');
    }

    private function redirect($page)
    {
        header("Location: " . URLROOT . "/" . $page);
        exit;
    }


    public function index()
    {

        // Fetch all dashboards from dashboard model.
        $dashboards = $this->AdminModel->GetDashboard();

        // Assign the result data from model to local variable.

        $data = ['dashboards' => $dashboards];


        $this->view('Admin/index', $data);
    }





    public function details(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Fetch selected user details by ID from the AdminModel
            $userDetailsData = $this->AdminModel->getDashboardById($id);

            // Add flash message for details view
            FlashHelper::set('info', 'Showing details for user ' . $id);

            $this->view('Admin/details', $userDetailsData);
        }
    }


    
      public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Get the selected Sollicitatie row from the database by Id.
            $modifiedUserId = $this->AdminModel->getDashboardById($id);

            // Map the selected Sollicitatie row to an object.
            $data = $modifiedUserId; // Assuming $modifiedUserId already contains the required data

            // Send the modified Sollicitatie object to the update view.
            $this->view('Admin/update', $data);
        } else {
            $_POST = filter_input_array(INPUT_POST);

            // Get the input values of the modified Sollicitatie fields from the update view.
            $data = $_POST;

            // Validate all the input fields of the update method.
            $isViewValid = true; // Placeholder for validation logic

            // Check whether the update view is valid.
            if ($isViewValid && $this->AdminModel->UpdateUserDetails($data)) {
                // Set a success flash message
                FlashHelper::set('success', 'User details updated successfully.');

                // Redirect to the index view.
                $this->redirect('Admin/index');
            } else {
                // Set an error flash message
                FlashHelper::set('error', 'Failed to update user details.');

                // Redirect back to the update view.
                $this->redirect('Admin/update/' . $id);
            }
        }
    }

}