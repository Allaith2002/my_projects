<?php 

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Login user
    public function login($email, $password)
    {
        $this->db->query('SELECT User.*, Person.FirstName, Person.LastName FROM User INNER JOIN Person ON User.PersonId = Person.Id WHERE User.UserName = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row) {
            $hashed_password = $row->Password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            }
        }

        return false;
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM User WHERE UserName = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    // Register user
    public function register($data)
    {
        // Insert into Person table
        $this->db->query('INSERT INTO Person (FirstName, LastName, CallSign, DateCreated, DateChanged) VALUES (:firstname, :lastname, :callsign, NOW(), NOW())');
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':callsign', $data['callsign']);
        $this->db->execute();

        $personId = $this->db->lastInsertId();

        // Insert into Contact table
        $this->db->query('INSERT INTO Contact (PersonId, Mobile, Email) VALUES (:personid, :mobile, :email)');
        $this->db->bind(':personid', $personId);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute();

        // Get RoleId for the default role 'Member'
        $roleId = $this->getRoleIdByName('Member');

        if ($roleId) {
            // Insert into User table
            $this->db->query('INSERT INTO User (PersonId, UserName, Password, IsActive, DateCreated, DateChanged) VALUES (:personid, :username, :password, 1, NOW(), NOW())');
            $this->db->bind(':personid', $personId);
            $this->db->bind(':username', $data['email']);
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->bind(':password', $hashedPassword);
            $this->db->execute();

            $userId = $this->db->lastInsertId();

            // Insert into UserPerRole table
            $this->db->query('INSERT INTO UserPerRole (UserId, RoleId) VALUES (:userid, :roleid)');
            $this->db->bind(':userid', $userId);
            $this->db->bind(':roleid', $roleId);
            $this->db->execute();

            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Get RoleId by name
    public function getRoleIdByUserId($userId)
    {
        $this->db->query('SELECT RoleId FROM UserPerRole WHERE UserId = :userid');
        $this->db->bind(':userid', $userId);
        $row = $this->db->single();

        if ($row) {
            return $row->RoleId;
        } else {
            return null;
        }
    }
    // Get user by ID
    public function getUserById($id)
    {
        $this->db->query('SELECT User.*, Person.FirstName, Person.LastName FROM User INNER JOIN Person ON User.PersonId = Person.Id WHERE User.Id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return null;
        }
    }

    public function getRoleIdByName($roleName)
{
    $this->db->query('SELECT id FROM role WHERE name = :name');
    $this->db->bind(':name', $roleName);
    $this->db->execute();
    $row = $this->db->single();
    return $row->id;
}


    public function lastInsertId()
{
    return $this->connection->lastInsertId();
}

}
