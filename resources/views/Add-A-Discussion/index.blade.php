<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Open Discussion</title>
  </head>
  <!-- Favicon -->
    <link
      rel="icon"
      type="image/svg"
      sizes="50x50"
      href="../assets/images/logo.svg"
    />
  </head>
  <!-- bootsrap cdn-->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous"
  />

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"
  ></script>

  <!--css-->
 <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!--phosphor icons-->

  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"
  />
  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"
  />

  <body>
    
   

        <div class="container pt-5 pb-5">

            <a class="text-decoration-none" href=""><i class="ph ph-arrow-circle-left text-green fs-6 p-0 "></i></a>

         <div class="p-0"><img class="img-fluid nav-logo" src="../assets/images/logo.svg" alt=""></div>

        </div>

        

        <div class="container mb-5">
            <div class="d-flex align-items-center gap-1">
                  <i class="ph-fill ph-plus-circle text-green fs-1"></i>
                  <h4 class="text-white mb-0 fw-bold">OPEN A DISCUSSION</h4>
                </div>
             <p class="mt-4">Ask questions or make enquiries on your burning topics and passions</p>
             <hr class="green-hr"/>

             <div class="container d-flex justify-content-center mt-5" >

                <div class="col-8 d-flex flex-column justify-content-center align-items-center pb-5"  >

                  

                    <h5 class="fw-bold">Title</h5>
                    <input class="add-discussion-input px-5 py-2 text-center mt-1" type="text" name="" id="">

                    <h5 class="fw-bold mt-5">Statement</h5>
                    <textarea class="add-discussion-input text-center px-5 py-5 mt-1" name="" id=""></textarea>

                    <h5 class="fw-bold mt-5">Category</h5>
                     <select class="text-white add-discussion-select py-2" name="" id="">
                      <option class="" value="Entertainment">Entertainment</option>
                      <option class="" value="Finance">Finance / Investment </option>
                      <option class="" value="Health">Health </option>
                      <option class="" value="Tourism">Tourism</option>
                       <option class="" value="Tech">Tech</option>
                        <option class="" value="History">History</option>
                        <option class="" value="Food">Food & Fitness</option>
                        <option class="" value="Social">Social</option>
                         <option class="" value="Other">Other</option>
                     </select>

                     <p class="text-center text-80 mt-5 disclaimer-p">Note that by creating this discussion it is open to public scrutiny and opinions , we do not take responsibility for any comments made or conversations thereof</p>

                     <button class="create-discussion-btn mt-2">
                       Create Discussion
                     </button>

                 

                   

                </div>
             </div>
        </div>
            

        

         

       

        
         
                

        

       

    


   






  </body>
</html>

<!--Javascript-->
<script src="{{ asset('assets/js/index.js') }}"></script>

<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>