// -------------------------------------navbar starts----------------------------------------
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}
let subMenu = document.getElementById('subMenu');

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
}

// Pour input dans la recherche 
const myInput = document.getElementById("myInput");
const text_search = document.getElementById("text_search");
const myInputValue = myInput.value;
//let icon_search = document.getElementById("icon_search");

const search_project = document.getElementById("search_project");
search_project.addEventListener("click", function(){
    myInputValue.value = " ";
    myInput.focus();
    text_search.remove();
    // text_search.classList.add("hidden");
    //icon_search.classList.toggle("ri-arrow-right-line");
});

myInput.addEventListener('blur', function() {
    myInputValue.value = " ";
    // text_search.classList.remove("hidden");
});

// -------------------------------------navbar ends---------------------------------------------


// -------------------------------------Settings Profile/Description Project Starts ---------------------------------------------
var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");
function opentab(tabname){
    for(tablink of tablinks){
        tablink.classList.remove("active-link");
    }
    for(tabcontent of tabcontents){
        tabcontent.classList.remove("active-tab");
    }
    event.currentTarget.classList.add("active-link");
    document.getElementById(tabname).classList.add("active-tab")
}
// -------------------------------------Settings Profile/Description Project  Ends------------------------------------------------


// ---------------------------------------------------------Launch Project Starts---------------------------------------------------------
// Code javascript Pour les informations personnelles

$(document).ready(function () {
  $("#fileInputImage_1").on("change", function (event) {
    var fileInput = $("#fileInputImage_1");
    var file = fileInput[0].files[0];
    var fileType = file.type.toLowerCase();
    var messageElement = $("#messageError_1");

    if (!fileType.startsWith("image/")) {
      messageElement.text("Veuillez sélectionner uniquement un fichier image.");
      //alert("Veuillez sélectionner uniquement des fichiers d'image.");
      $(this).val("");
      //event.preventDefault();
    }else {
      messageElement.text("");
    }
  });
});

$(document).ready(function () {
  $("#fileInputImage_2").on("change", function (event) {
    var fileInput = $("#fileInputImage_2");
    var file = fileInput[0].files[0];
    var fileType = file.type.toLowerCase();
    var messageElement = $("#messageError_2");

    if (!fileType.startsWith("image/")) {
      messageElement.text("Veuillez sélectionner uniquement un fichier image.");
      //alert("Veuillez sélectionner uniquement des fichiers d'image.");
      $(this).val("");
      //event.preventDefault();
    }else {
      messageElement.text("");
    }
  });
});

$(document).ready(function () {
  $("#fileInputImage_3").on("change", function (event) {
    var fileInput = $("#fileInputImage_3");
    var file = fileInput[0].files[0];
    var fileType = file.type.toLowerCase();
    var messageElement = $("#messageError_3");

    if (!fileType.startsWith("image/")) {
      messageElement.text("Veuillez sélectionner uniquement un fichier image.");
      //alert("Veuillez sélectionner uniquement des fichiers d'image.");
      $(this).val("");
      //event.preventDefault();
    } else {
      messageElement.text("");
    }
  });
});

// Code javascript Pour les informations du projet
// Preview image in upload
$(document).ready(function () {
  $("#fileInputImage_4").on("change", function (event) {
      var imagediv = document.getElementById("preview");
      imagediv.innerHTML = "";
      var fileInput = $("#fileInputImage_4");
      var file = fileInput[0].files[0];
      var fileType = file.type.toLowerCase();
      var messageElement = $("#messageError_4");

      if (!fileType.startsWith("image/")) {
          messageElement.text("Veuillez sélectionner uniquement un fichier image.");
          //alert("Veuillez sélectionner uniquement des fichiers d'image.");
          $(this).val("");
          //event.preventDefault();
      }
      else{
          messageElement.text("");
          var image = URL.createObjectURL(file);
          //var imagediv = document.getElementById("preview");
          var newimg = document.createElement("img");
          imagediv.innerHTML = "";
          newimg.src = image;
          newimg.width = "200";
          newimg.height = "100";
          newimg.style.backgroundSize = "cover";
          newimg.style.backgroundPosition = "center";
          imagediv.appendChild(newimg);
    }
  });
});

$(document).ready(function () {
  $("#fileInputFile_1").on("change", function (event) {
    var fileInput = $("#fileInputFile_1");
    var file = fileInput[0].files[0];
    var fileType = file.type.toLowerCase();
    var messageElement = $("#messageError_5");

    if (fileType !== "application/pdf") {
      messageElement.text("Veuillez sélectionner uniquement un fichier Pdf.");
      //alert("Veuillez sélectionner uniquement des fichiers Pdf.");
      $(this).val("");
      //event.preventDefault();
    } else {
      messageElement.text("");
    }
  });
});

//DatePicker
$(function () {
  $("#datepicker").datepicker();
});

// ---------------------------------------------------------Launch Project Ends---------------------------------------------------------
