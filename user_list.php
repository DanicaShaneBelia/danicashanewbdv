

<?php include_once './usersHandler.php' ?>


<style>
    #main {
        width: 85.5%;
        height: 100%;
        background-color: #f0f0f0;
        /* Background color */
        padding: 100px;
        /* Padding around the content inside #main */
        color: #333;
    }

    table {
        box-sizing: border-box;
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        font-size: 0.8rem;

    }

    table .action{
        display: flex;
        gap: 1rem;
    }

    table .action{

    }

    table th,
    table td {
        padding: 0.5rem 1rem;
        text-align: left;

    }

    table th {
        background-color: #3876BF;
        color: #fff;


    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #91C8E4;
    }

    table td {
        border-bottom: 1px solid #ddd;

    }

    table td:last-child {
        border-bottom: none;
    }

    table td a {
        text-decoration: none;
        margin-right: 10px;
        color: #007bff;
        font-weight: bold;
    }

    table td a:hover {
        text-decoration: underline;
        color: #AED2FF;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;

    }

    .modal-content {
        background-color: #7993B2;
        padding: 20px;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 400px;
        border-radius: 20px;
        color: black;
        border: 2px solid #012970;
        
    }

    .modal-header {
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .modal-title {
        font-size: 20px;
        margin: 0;
    }

   
    

    .modal-label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .modal-input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 3px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .modal-buttons {
        text-align: right;
    }

    .modal-buttons button {
        margin-left: 10px;
        padding: 8px 15px;
        border: none;
        border-radius: 3px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .modal-buttons button:hover {
        background-color: #0056b3;
    }



</style>

<!-- HTML Table to display user registrations -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <!-- <div id="chart" style="height: 500px; width: 100%;">

</div> -->



    <body>



        <!-- Your table content -->
        <table>
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Age</th>
        <th>Address</th>
        <th>Role</th>
        <th>Status</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>
    <tbody>
    <?php getUsersTable()?>
    </tbody>

</table>
        
</main>

<!-- HTML Table to display user registrations -->
<!-- HTML Table to display user registrations -->
<!-- ... Your existing HTML code ... -->

<!-- Modal for update confirmation -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Update Confirmation</h2>
        </div>
        <form class="modal-body" id="updateModalForm" method="POST" action="update-user.php">
            <input type="hidden" name="id">
            <label class="modal-label" for="updateFirstName">First Name:</label>
            <input class="modal-input" type="text" name="firstName" id="updateFirstName">

            <label class="modal-label" for="updateLastName">Last Name:</label>
            <input class="modal-input" type="text" name="lastName" id="updateLastName">

            <label class="modal-label" for="updateEmail">Email:</label>
            <input class="modal-input" type="email" name="email" id="updateEmail">

            <label class="modal-label" for="updatePassword">Password:</label>
            <input class="modal-input" type="text" name="password" id="updatePassword">

            <label class="modal-label" for="updateAge">Age:</label>
            <input class="modal-input" type="number" name="age" id="updateAge">

            <label class="modal-label" for="updateAddress">Address:</label>
            <input class="modal-input" type="text" name="address" id="updateAddress">
            
            <label class="modal-label" for="updateRole">Role</label>
            <select name="Role" id="updateRole" style="width: 100%; padding: 1rem 1.75rem; border-radius: 1rem;">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <label class="modal-label" for="updateStatus">Status</label>
            <select name="Status" id="updateStatus" style="width: 100%; padding: 1rem 1.75rem; border-radius: 1rem;">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>


            <label class="modal-label" for="updateGender">Status</label>
            <select name="gender" id="updateGender" style="width: 100%; padding: 1rem 1.75rem; border-radius: 1rem;">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>


            <div class="modal-buttons">
                <hr>
                <button type="submit" name="updateUser">Update</button>
                <button onclick="hideModal()" class="btn btn-secondary" type="button">Cancel</button>
            </div>
        </form>
    </div>
</div>
        </form>

    </div>
</div>

<!-- Modal for delete confirmation -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h2>Delete Confirmation</h2>
        <p>Are you sure you want to delete this record?</p>
        <form action="delete-user.php" method="POST" id="deleteModalForm">
            <input type="hidden" name="idToDelete" id="idToDelete">
            <button type="submit" name="deleteUser">Delete</button>
            <button onclick="hideModal()" class="btn btn-secondary" type="button">Cancel</button>
        </form>

    </div>
</div>


<script src="./scripts/_admin/modal.js"></script>
<script src="./scripts/_admin/admin.js"></script>