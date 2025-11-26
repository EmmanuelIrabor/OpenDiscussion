
@php
    use Illuminate\Support\Facades\Auth;
@endphp

@php
  $user = Auth::user();
@endphp

@php
  $profileImage = $user->profile_image
      ? ($user->is_google_user 
            ? $user->profile_image 
            : asset('storage/' . $user->profile_image))
      : asset('assets/images/user.png');
@endphp

<!-- @dump($profileImage) -->





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


@if (session('success'))
  <x-alert-modal 
    priority="alert alert-success" 
    :message="session('success')" 
  />
@endif

   <x-navbar />


  

   
    
     <div class="container">
          
         <div class="d-flex align-items-center gap-1">
                  <h1 class="text-green mb-0">EDIT PROFILE</h1><i class="ph ph-pencil-line text-green fs-1"></i>
                </div>
     </div>
    <div class="container mt-5 user-profile-banner py-5">

         
    <!-- <div 
  class="user-profile-img-edit mt-5 top mx-3 d-flex justify-content-center align-items-center"
  style="background-image: url('{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/images/user.png') }}');"

> -->





<div 
  class="user-profile-img-edit mt-5 top mx-3 d-flex justify-content-center align-items-center"
  style="background-image: url('{{ $profileImage }}');"
  id="profilePreviewx"
>
            <!-- <i class="ph ph-camera text-green mt-3"></i> -->
          </div>     
    </div>

    <div class="container mt-5">
      <!-- <button class="blank-btn mx-4 fs-5"></button> -->

    <label for="profileImagex" class="mx-4 fs-5"><i class="ph ph-camera text-green mt-3 mx-2"></i></label>
    <input class="file-input" type="file" name="profile_imagex" id="profileImagex" accept="image/png, image/jpeg" >
    </div>
  
 

     <div class="container px-3">
           

      <div class="d-flex flex-column mt-5">
      <!-- <div class="col-3">
        <button class="more-info-link__dark">Change Profile pic</button> 
      </div> -->
    <p class="text-gray mt-5">Email</p>
    <input class="profile-info-input pe-none" type="text" name="email" value="{{ $user->email ?? '' }}">

    <p class="text-gray mt-5">Name</p>
    <input class="profile-info-input mt-4" type="text" name="name" value="{{ $user->name ?? '' }}">

    <p class="text-gray mt-5">Address</p>
    <input class="profile-info-input mt-4" type="text" name="address" value="">

    <p class="text-gray mt-5">Phone Number</p>
    <input class="profile-info-input mt-4" type="number" name="phone" value="">

    <button class="profile-change-btn mt-5">Update</button>
</div>
        </div>

<div class="container mt-6">
   <h2 class="header-4 mt-5">POSTS</h2>

  

 <div class="container-fluid d-flex flex-column mt-5">

  @if (!empty($posts) && is_array($posts))
    @foreach ($posts as $post)
      @if (is_array($post))
        <div class="small-article d-flex flex-column flex-sm-row gap-5 mt-5 align-items-center">

          <div class="small-article_img col-12 col-sm-3">
            <img class="img-fluid" src="{{ asset($post['image_path'] ?? 'default.jpg') }}" alt="Post Image">
          </div>

          <div class="small-article__info col-12 col-sm-8 d-flex flex-column">
      <h4 class="fw-bold mt-2">{{ $post['title'] }}</h4>
      <p class="mt-2">{{ $post['subtitle'] }}</p>

       <div class=" d-flex flex-row mb-4 gap-3 gap-sm-4 mt-4 " >

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center">
      <span class="text-green">Text</span> <span>{{ $post['author'] }}</span>
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center" >
      <span class="text-green">Date</span> <span>{{ \Carbon\Carbon::parse($post['timestamp'])->format('F j, Y') }}</span>
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center d-none d-md-flex" >
       <span class="tag-category">{{ $post['category'] }}</span>
    </div>
    
      
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center d-flex d-md-none" >
       <span class="tag-category">{{ $post['category'] }}</span>
    </div>

    


  </div>

          

        </div>
        <div class="d-flex flex-row gap-2 align-items-center mt-5 mt-md-2">
    <a href="{{ route('post.show', $post['id']) }}" class="text-green">View</a>
     <!-- <button class="blank-btn text-red fs-4"><i class="ph ph-trash"></i></button> -->
      <form class="p-0 m-0" action="{{ route('posts.delete', ['id' => $post['id']]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn text-danger" title="Delete Post">
        <i class="ph-fill ph-trash fs-5"></i>
    </button>
</form>
  </div>

        <hr class="hr-light"/>
      @endif
    @endforeach
  @else
    <p class="mt-5 text-green">You haven’t posted anything yet.</p>
  @endif

</div>





</div>




   

   
</div>












   
   


    


   

    
    


 






<footer class="mt-6">
  <div class="container">
    <img class="img-fluid nav-logo" src="../assets/images/logo.svg" alt="">
  </div>

  <div class="container d-flex flex-column flex-lg-row">

    <div class="col-9"><h3>JOIN THE <br> DISCUSSION</h3></div>
    <div class="col-12 col-lg-3 d-flex flex-column">
      <p class="fw-bold mt-5 mt-lg-0">Subscribe To Our News Letter</p>

      <div class="d-flex flex-row">
         <input  type="email" placeholder="Email Address">
         <button><i class="ph ph-paper-plane-right"></i></button>
      </div>
     

    </div>

   

  </div>
   <div class="container d-flex flex-row gap-4 mt-5">
       <a href="">Privacy policy</a>
       <a href="">Terms & Conditions</a>
    </div>

    <div class="container mt-5 d-flex flex-column align-items-center justify-items-center justify-content-center">
      <p class="cpr">CopyRight 2025 @ OpenDiscussion</p>
    </div>
</footer>
  </body>
</html>

<!--Javascript-->
<!-- <script src="{{ asset('assets/js/index.js') }}"></script> -->
 <script src="{{ asset('assets/js/user-profile-pic.js') }}"></script>

<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>


