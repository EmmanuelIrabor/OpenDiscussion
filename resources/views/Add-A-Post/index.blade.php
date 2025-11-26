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
    
   

        <div class="container pt-5 pb-5">

            <a class="text-decoration-none" href=""><i class="ph ph-arrow-circle-left text-green fs-6 p-0 "></i></a>

         <div class="p-0"><img class="img-fluid nav-logo" src="../assets/images/logo.svg" alt=""></div>

        </div>

        

        <div class="container mb-5">
            <div class="d-flex align-items-center gap-1">
                  <i class="ph-fill ph-plus-circle text-green fs-1"></i>
                  <h4 class="text-white mb-0 fw-bold">Add A Post</h4>
                </div>
             <p class="mt-4">Add a post on any topic or interests</p>
             <hr class="green-hr"/>

             <div class="container d-flex justify-content-center mt-5" >

                <div class="col-8 d-flex flex-column justify-content-center align-items-center pb-5" >

  <form class="d-flex flex-column justify-content-center align-items-center" action="{{ route('add.post') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="post_img_preview" id="PostImgPreview"></div>

  <p class="mt-5">Post Image</p>
  <label for="postImage" class="more-info-link__dark px-4 py-2">Select</label>
  <input class="file-input" type="file" name="post_image" id="postImage" accept="image/png, image/jpeg" required>

  <input class="add-post-input px-1 py-2 mt-5" type="text" name="title" placeholder="Title" required>
  <input class="add-post-input px-1 py-2 mt-5" type="text" name="subtitle" placeholder="Subtitle" required>

     <div class="d-flex flex-row gap-2 mt-5 post-add-ons">

    <div class="blank-btn fs-3 cursor-pointer" title="Add an image"><i class="ph-fill ph-image text-green"></i></div>

    <div class="blank-btn fs-3 cursor-pointer" title="Add a Video"><i class="ph-fill ph-video text-green"></i></div>


    
     <div class="blank-btn fs-3 cursor-pointer" title="Add an Embed"><i class="ph-fill ph-brackets-angle text-green"></i></div>


  </div>
<div id="post-body-editor" class="add-post-input px-1 py-5 mt-5" contenteditable="true" placeholder="Body" required></div>
<input type="hidden" name="body" id="body-input" />


  <p class="mt-5">Category</p>
  <select class="text-green add-post-select py-2 mt-5" name="category" required>
    <option value="Entertainment">Entertainment</option>
    <option value="Finance">Finance / Investment</option>
    <option value="Health">Health</option>
    <option value="Tourism">Tourism</option>
    <option value="Tech">Tech</option>
    <option value="History">History</option>
    <option value="Food">Food & Fitness</option>
    <option value="Social">Social</option>
    <option value="Others">Others</option>
  </select>

  <p class="text-80 mt-5 disclaimer-p">
    Note that by creating this post it is open to public scrutiny and opinions , we do not take responsibility for any comments made or conversations thereof
  </p>

  <button type="submit" class="add-post-btn mt-2 py-2">ADD POST</button>
</form>


                 

                   

                </div>
             </div>
        </div>
            

        

         

       

        
         
                

        

       

    


   






  </body>
</html>

<!--Javascript-->
<script src="{{ asset('assets/js/post-add-ons.js') }}"></script>
<script src="{{ asset('assets/js/post-img-preview.js') }}"></script>

<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>