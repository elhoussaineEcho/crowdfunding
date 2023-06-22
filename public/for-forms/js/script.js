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

    //   function getImagePreview(event) {
    //     const upload_file = document.getElementById("upload_file");
    //     const file = event.target.files[0];
    //     if (file && !file.type.startsWith("image/")) {
    //       alert("Veuillez sélectionner un fichier image.");
    //       //upload_file.value = "";
    //     } else {
    //       var image = URL.createObjectURL(file);
    //       var imagediv = document.getElementById("preview");
    //       var newimg = document.createElement("img");
    //       imagediv.innerHTML = "";
    //       newimg.src = image;
    //       newimg.width = "200";
    //       newimg.height = "100";
    //       newimg.style.backgroundSize = "cover";
    //       newimg.style.backgroundPosition = "center";
    //       imagediv.appendChild(newimg);
    //     }
    //   }


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

      // Fichier pdf dans description détaillés
    //   const fileInput = document.getElementById("pdfFile");

    //   fileInput.addEventListener("change", function (event) {
    //     const file = event.target.files[0];
    //     messageD.innerHTML = "";
    //     if (file && file.type !== "application/pdf") {
    //       var messageD = document.getElementById("messageD");
    //       alert("Veuillez sélectionner un fichier PDF.");
    //       //messageD.innerHTML = "Veuillez sélectionner un fichier PDF.";
    //       fileInput.value = "";
    //     }
    //   });

      //DatePicker
      $(function () {
        $("#datepicker").datepicker();
      });

