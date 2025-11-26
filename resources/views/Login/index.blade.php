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

@foreach ($errors->all() as $error)
  <x-alert-modal 
    priority="alert alert-primary" 
    :message="$error" 
  />
@endforeach


@if (session('error'))
  <x-alert-modal 
    priority="alert alert-danger" 
    :message="session('error')" 
  />
@endif
    
    <div class="container email-login-container mt-5 mb-5">

         <a class="text-decoration-none" href=""><i class="ph ph-arrow-circle-left text-green fs-4 p-0 "></i></a>

         <div class="p-0"><img class="img-fluid nav-logo" src="../assets/images/logo.svg" alt=""></div>


        

         <div class="d-flex align-items-center gap-1">
                  <h1 class="header-3 text-green mb-0">LOGIN</h1><i class="ph ph-arrow-up-right header-3 text-green"></i>
                </div>

         <div class="auth-img-container_one mt-5">

         </div>

         <div class="container p-5 mt-5" >

          <div class="d-flex justify-content-center mb-5">
             <div class="col-12 col-md-6 col-lg-4 d-flex flex-column gap-5">
               <a class="text-decoration-none text-white" href="{{ route('google.auth') }}">
              <div class="social-media-auth d-flex justify-content-center py-3">
                    <div class="d-flex align-items-center gap-1">
                   <img src="../assets/images/google.png" alt="" width="20" height="20">
                <p class="mb-0 fs-6 fw-bold">GOOGLE LOGIN</p>
</div>
                </div>

</a>
             </div>

             


</div>

         
           <h5 class="text-center fw-bold mt-5 text-gray mb-4">OR</h5>
           


         

            <div class="auth-form-container d-flex justify-content-center" >

               <div class="col-12 col-md-6 col-lg-4 d-flex flex-column gap-5">

                 <form  class="d-flex flex-column gap-4" method="POST" action="{{ route('login.custom') }}">
  @csrf

  <input class="auth-form-input" type="text" name="email" placeholder="Email or Username" required>
  <input class="auth-form-input" type="password" name="password" placeholder="Password" required>

  <button type="submit" class="auth-btn py-2">LOGIN</button>
</form>



                

               </div>

            </div>

         </div>

         <div class="d-flex justify-content-center no-wrap">
                    <a href="../Email-Register/index.html" class="text-gray fs-6 text-decoration-none">Don't have an account? <span class="text-green">Register</span></a>
                </div>

                <div class="d-flex justify-content-center mt-4">
                     
                     <a class="text-center  text-green" href="">Forgot Password?</a>
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