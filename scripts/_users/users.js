
const formTitle = document.getElementById("FormTitle");
const formBtn = document.getElementById("submitBtn");
const addActivityBtn = document.getElementById("addActivityBtn");
const form = document.getElementById("EditAddForm");
const setActivityForm = document.getElementById('setActivityForm');
const breadcrumbCurrent = document.getElementById('breadcrumb-current');
const activityPage = document.getElementById('activityPage');
const announcementsPage = document.getElementById('announcementsPage');
function handleBreadCrumbs(current){
    breadcrumbCurrent.innerText = current;
}

function pageHandler(){
  const urlParams = new URLSearchParams(window.location.search);
  const pageParam = urlParams.get("page");
  if(pageParam){
    handleBreadCrumbs(pageParam);
    switchPage(pageParam)
  }else{
    handleBreadCrumbs("Dashboard");
    switchPage("home")
  }


}

function switchPage(page){
  announcementsPage.classList.add('hidden');
  activityPage.classList.add('hidden');
  if(page == "announcements"){
    announcementsPage.classList.remove('hidden')
  }else{
    activityPage.classList.remove('hidden');
  }
}


pageHandler();





// add activty Handler
addActivityBtn.onclick = () => {
  toggleModal("EditAddForm");
  form.setAttribute("action", "add_activity.php");
  formBtn.setAttribute("name", "addActivity");
  formTitle.innerText = "Add Activity";
  formBtn.innerText = "Add Activity";
};

// edit activity handler
function handleEdit(e, data) {
  formTitle.innerText = "Edit Activity";
  form.setAttribute("action", "edit_activity.php");
  formBtn.setAttribute("name", "updateActivity");
  formBtn.innerText = "Apply Edit";
  toggleModal("EditAddForm");
  form.querySelectorAll("input").forEach((input) => {
    const inputType = input.getAttribute("data-info");
    input.value = data[inputType];
    console.log(input.value);
  });
}

// setaActivities handler

function setActivity(data) {
    const activityStatusDisplay = document.getElementById('activityStatus');
    setActivityForm.querySelector('[name=id]').value = data['id'];
    toggleModal("setActivityForm");
    formTitle.innerText = "Set Activity";
    activityStatusDisplay.innerHTML = capitalizeFirstLetter(data['remarks']);
    setActivityForm.querySelector('#remarks').value = data['remarks']


}   





// misc functions 

document.getElementById("closeModal").addEventListener("click", () => {
  toggleModal("");
  form.reset();
});



function toggleModal(formType) {
  const modalEl = document.querySelector(".modal");
  modalEl.classList.toggle("hidden");

  const formsEl = modalEl.querySelectorAll("form");

  formsEl.forEach((form) => {
    form.classList.add("hidden");
    const formElType = form.getAttribute("id");
    if(formElType == formType){
        form.classList.remove("hidden");
    }
  });
}


function capitalizeFirstLetter(inputString) {
    return inputString.charAt(0).toUpperCase() + inputString.slice(1);
}


