   
   
   // JavaScript function to show the update modal
    function showUpdateModal() {
        showModal('updateModal');
    }
    
    // JavaScript function to show the delete modal
    function showDeleteModal() {
        showModal('deleteModal');
        // Additional logic if needed
    }

    // JavaScript function to update the record in the database
    function updateRecord() {
        // Perform the necessary update logic here
        // You can use AJAX to send a request to the server and update the record in the database
        // After the update is successful, you can hide the modal and perform any additional actions
        
        hideModal();
    }

    // JavaScript function to delete the record from the database
    function deleteRecord() {
        // Perform the necessary delete logic here
        // You can use AJAX to send a request to the server and delete the record from the database
        // After the deletion is successful, you can hide the modal and perform any additional actions
        
        hideModal();
    }

    // JavaScript function to hide the modal
    function hideModal() {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            modals[i].style.display = 'none';
        }

    }

    // JavaScript function to show the modal
    function showModal(modalId) {
        hideModal();
        var modal = document.getElementById(modalId);
        modal.style.display = 'block';
    }