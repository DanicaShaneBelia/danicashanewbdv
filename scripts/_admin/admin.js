
const idToDeleteInput = document.getElementById('idToDelete');



function handleUpdate(e, data){
    showUpdateModal();
    const parentElement = e.parentNode.parentNode;
    
    updateModalForm.querySelectorAll('[name]').forEach(input =>{
        const inputType = input.getAttribute("name");
        input.value = data[inputType];
    })
}   


function handleDelete(id){
    showDeleteModal();
    idToDeleteInput.value = id;
    
}



