<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="{{asset('admin/css/styleDocument.css')}}">
</head>
<body>
    <div class="slideshow-container">

        <div class="mySlides fade">
         <div class="numbertext">
         1/3
         </div>
            <img src="{{asset('porteur/personal_file/cni/cni-recto/cni-recto1685883528.jpg')}}" alt="" style="width:100%">
            <div class="text">caption text</div>
        </div>


        <div class="mySlides fade">
         <div class="numbertext">
         2/3
         </div>
            <img src="{{asset('porteur/personal_file/cni/cni-verso/cni-verso1685883528.jpg')}}" alt="" style="width:100%">
            <div class="text">caption text</div>
        </div>


        <div class="mySlides fade">
         <div class="numbertext">
         3/3
         </div>
            <img src="{{asset('porteur/personal_file/attestation/attestation1685883528.jpg')}}" alt="" style="width:100%">
            <div class="text">caption text</div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a> 
        <a class="next" onclick="plusSlides(1)">&#10095;</a> 
    </div>
    <div style="text-align:center">
   <span class="dot" onclick="currentSlides(1)"></span>
   <span class="dot" onclick="currentSlides(2)"></span>
   <span class="dot" onclick="currentSlides(3)"></span>
    </div>
    <script src="{{asset('admin/js/scriptDocument.js')}}"></script>
</body>
</html>