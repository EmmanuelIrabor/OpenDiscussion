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

   @if (session('error'))
  <x-alert-modal 
    priority="alert alert-danger" 
    :message="session('error')" 
  />
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <x-alert-modal 
      priority="alert alert-primary" 
      :message="$error" 
    />
  @endforeach
@endif

   <form action="{{ route('profile.image.upload') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="container-fluid d-flex justify-content-end mt-4">
    <button type="submit" class="text-green blank-btn">
      <div class="d-flex align-items-center gap-1">
        <p class="mb-0 fs-4 text-green">Next</p>
        <i class="ph ph-arrow-square-right fs-2 text-green"></i>
      </div>
    </button>
  </div>

  <div class="container d-flex flex-column justify-content-center align-items-center text-center h-full">
    <div class="select-profile-pic-box" id="profilePreview"></div>

    <h3 class="fw-bold mt-5">Select a profile Picture </h3>

    <label for="profileImage" class="more-info-link__dark px-4 py-2 mt-4">Select</label>
    <input class="file-input" type="file" name="profile_image" id="profileImage" accept="image/png, image/jpeg" >

    <a href="{{ route('home') }}" class="skip-btn px-4 py-2 mt-4">Skip</a>
  </div>
</form>


    




  </body>
</html>

<!--Javascript-->
<!-- <script src="{{ asset('assets/js/index.js') }}"></script> -->
<script src="{{ asset('assets/js/profile-pic.js') }}"></script>

<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>