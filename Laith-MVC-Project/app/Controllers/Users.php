<?php 

// Start the session
SessionHelper::start();

class Users extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    private function redirect($page)
    {
        header("Location: " . URLROOT . "/" . $page);
        exit;
    }


    // Login
// Login
public function login()
{
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Process login
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        // Validate email and password
        if (empty($data['email']) || empty($data['password'])) {
            // Display error message
            FlashHelper::set('error', 'Please fill in all fields.');
            $this->view('users/login', $data);
            exit; // Add this line to stop further execution
        } else {
            // Attempt to login
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);

            if ($loggedInUser) {
                // Create session
                $this->createUserSession($loggedInUser);
                FlashHelper::set('success', 'You have successfully logged in.');
                $this->redirect('index');
            } else {
                // Display error message
                FlashHelper::set('error', 'Invalid email or password.');
                $this->view('users/login', $data);
                exit; // Add this line to stop further execution
            }
        }
    } else {
        // Display login form with flash messages
        $this->view('users/login');
    }
}



    // Register
    public function register()
    {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Process registration
            $data = [
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'callsign' => trim($_POST['callsign']),
                'mobile' => trim($_POST['mobile']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'role' => 'Member', // Set the default role
            ];

            // Validate form data
            if (empty($data['firstname']) || empty($data['lastname']) || empty($data['callsign']) || empty($data['mobile']) || empty($data['email']) || empty($data['password']) || empty($data['confirm_password'])) {
                // Display error message
                FlashHelper::set('error', 'Please fill in all fields.');
                $this->view('users/register', $data);
            } elseif ($this->userModel->findUserByEmail($data['email'])) {
                // Display error message
                FlashHelper::set('error', 'Email is already taken.');
                $this->view('users/register', $data);
            } elseif ($data['password'] != $data['confirm_password']) {
                // Display error message
                FlashHelper::set('error', 'Passwords do not match.');
                $this->view('users/register', $data);
            } else {
                // Register user
                $registered = $this->userModel->register($data);

                if ($registered) {
                    // Redirect to login page
                    $this->redirect('users/login');
                    FlashHelper::set('success', 'Registration successful. Please login.');
                } else {
                    // Display error message
                    FlashHelper::set('error', 'Registration failed. Please try again.');
                    $this->view('users/register', $data);
                }
            }
        } else {
            // Display registration form
            $this->view('users/register');
        }
    }

    // Create user session
    public function logout()
    {
        // Unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_firstname']);
        unset($_SESSION['user_lastname']);

        // Destroy the session
        session_destroy();

        // Flash message
        FlashHelper::set('success', 'You have successfully logged out.');

        // Redirect to the login page
        $this->redirect('index');
    }

    // Create user session
// Create user session
// Create user session
private function createUserSession($user)
{
    // Set session variables
    $_SESSION['user_id'] = $user->Id;
    $_SESSION['user_email'] = $user->UserName;
    $_SESSION['user_firstname'] = $user->FirstName;
    $_SESSION['user_lastname'] = $user->LastName;
    $_SESSION['user_role_id'] = $this->userModel->getRoleIdByUserId($user->Id);

    // Set flash message
    FlashHelper::set('success', 'You have been successfully logged in.');

    // Redirect based on role ID
    if ($_SESSION['user_role_id'] == 1) { // Assuming role ID 1 represents the admin role
        $this->redirect('index');
    } else {
        $this->redirect('member/profile');
    }
}





}
