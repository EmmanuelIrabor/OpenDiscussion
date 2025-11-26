
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
   <x-navbar />

     <div>
        <h1 class="header text-center">LATEST ENTRIES</h1>
        @if(isset($category))
     <h2 class="mt-2 text-center fw-bold text-green">{{ $category }}</h2>
     @endif

    </div>

    <div class="container d-flex flex-column flex-sm-row aligin-items-center justify-items-center justify-content-center ">
      <div class="col-sm-6" >
        <div class=" mt-5">

   <a class="text-white mx-2" href=""><div class="d-flex align-items-center gap-1"><p class="mb-0 fs-5">CATEGORIES</p><i class="ph ph-arrow-circle-right fs-5"></i></div></a>
</div>
      </div>
      <div class="col-sm-6 d-flex flex-column flex-sm-row justify-content-end mt-3 mt-sm-0 p-0"  >

         <div class="d-flex flex-column justify-content-sm-end p-0"  >
        <div>
          <span class="tag-category mx-sm-1">Music</span>
        <span class="tag-category mx-sm-1">Art</span>
         <span class="tag-category mx-sm-1">Movies</span>
        </div>
         </div>

      </div>

    </div>

    <div class="container mt-5 d-flex justify-content-between align-items-center py-4">

      <!-- <input type="text" name="" id="" placeholder="Search...." class="search_input">
       <a class="text-decoration-none" href="../Add-A-Post/index.html"> <i class="ph-fill ph-plus-circle text-green fs-2"></i></a> -->
       <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center">
  <input type="text" name="query" id="search_input" placeholder="Search...." class="search_input" value="{{ old('query', $searchQuery ?? '') }}">
  <button type="submit" class="btn"><i class="ph ph-magnifying-glass text-green"></i></button>
</form>

<a class="text-decoration-none" href="../Add-A-Post/index.html"> 
  <i class="ph-fill ph-plus-circle text-green fs-2"></i>
</a>

    </div>

    

<div class="container posts-container d-flex flex-row flex-wrap mt-5">

  @if (count($posts) === 0)
  <p class="mt-4  text-green">No posts found for "{{ $searchQuery ??  '' }}"</p>
@endif

  @foreach($posts as $post)
    <a href="{{ route('post.show', ['id' => $post['id']]) }}" class="a-inherit post col-12 col-sm-6 col-lg-4 d-flex flex-column p-5">
      <div class="">
        <div class="d-flex flex-column flex-sm-row flex-wrap gap-4">
          <div>
            <p>{{ \Carbon\Carbon::parse($post['timestamp'])->format('F d, Y') }}</p>
          </div>
          <div>
            <span class="tag-category">{{ $post['category'] }}</span>
          </div>
        </div>

        <div class="d-flex mt-5">
          <div>
            <img class="img-fluid" src="{{ asset($post['image_path']) }}" alt="{{ $post['title'] }}">
          </div>
        </div>

        <div class="mt-5">
          <h3 class="fw-bold">{{ $post['title'] }}</h3>
          <p>{{ $post['subtitle'] }}</p>
        </div>

        <div class="d-flex flex-row gap-3">
          <p class="text-green fs-7">Author</p>
          <span class="fs-7">{{ $post['author'] }}</span>
        </div>
      </div>
    </a>
  @endforeach
</div>




  


 <div class="container mt-6 d-flex flex-column aligin-items-center justify-items-center justify-items-center ">

  <div class="container d-flex col-6 flex-column aligin-items-center justify-items-center justify-items-center">
    <img class="img-fluid" src="{{ asset('assets/images/odi banner.png') }}" alt="">
  </div>


  <div class="container d-flex col-12 col-sm-8 flex-column aligin-items-center justify-items-center justify-items-center mt-3">
    <p class="fs-small text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae modi incidunt repudiandae nisi, veritatis blanditiis explicabo laborum ratione.</p>

    <div class="container d-flex col-4 col-md-2 flex-column aligin-items-center justify-items-center justify-items-center mt-3 ">
     <a class="more-info-link__dark" href="">Learn More</a>
  </div>
  </div>

  
  
  
</div>
    
    


 






<footer class="mt-6">
  <div class="container">
    <img class="img-fluid nav-logo" src="{{ asset('assets/images/logo.svg') }}" alt="">
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
<script src="{{ asset('assets/js/index.js') }}"></script>

<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>