
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Open Discussion</title>

     <meta name="Open Discussion" content="Open Discussion" />
    <meta
      name="description"
      content="Open Discussion - {{ $post['title'] }}."
    />
    <meta name="keywords" content="Open Discussion - {{ $post['title'] }}." />
    <meta
      name="image"
      content="{{ asset($post['image_path']) }}"
    />
    <meta name="robots" content="INDEX,FOLLOW" />

    <!-- Open Graph Meta Tags -->
    <meta
      property="og:title"
      content="Open Discussion - {{ $post['title'] }}."
    />
    <meta
      property="og:description "
      content="Open Discussion - {{ $post['subtitle'] }}."
    />
    <meta
      property="og:image"
      content="{{ asset($post['image_path']) }}"
    />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="Open Discussion - {{ $post['title'] }}."
    />
    <meta
      name="twitter:description"
      content="Open Discussion - {{ $post['subtitle'] }}."
    />
    <meta
      name="twitter:image"
      content="{{ asset($post['image_path']) }}"
    />
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
    <!--Navigation-->
    <div class="nav container d-flex flex-row align-items-center justify-items-center">
        <!--leftbar-->
        <div class="col-10  col-sm-2 mx-sm-0"  >
            <img class="img-fluid nav-logo " src="../assets/images/logo.svg" alt="">
        </div>
        <!--main content-->
        <div class="col-8 flex-grow-1 d-none d-sm-flex aligin-items-center justify-items-center justify-content-center mt-3 " >
            <ul class="d-flex flex-row gap-5 ">
                <li><a href="">Home</a></li>
                 <li><a href="">About</a></li>
                  <li><a href="">Posts</a></li>
                  <li class="drop"><a href="#">More <i class="ph ph-caret-down mt-1"></i></a>
                    <div class="drop-menu mt-1">
                  <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Discussions</a></li>
                  </ul>
                </div>
                  </li>
            </ul>
        </div>
        <!--rightbar-->
        <div class="col-2 flex-shrink-0 right-bar d-flex flex-row justify-content-end" >
           <a href="" class="d-none d-sm-block"><i class="ph-fill ph-user-circle-plus"></i></a>
           <button class="menu-btn d-block d-md-none"id="menu-btn"><i class="ph ph-list"></i></button>
        </div>
    </div>

    <div class="container mobile-menu" id="mobile-menu">
       <ul>
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Posts</a></li>
         <li><a href="#" class="mobile-drop" id="mobile-drop">More</a>
                    <div class="mobile-drop-menu mt-1" id="mobile-drop-menu">
                  <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Discussions</a></li>
                  </ul>
                </div>
                  </li>
        <li><a href=""><i class="ph-fill ph-user-circle-plus"></i></a></li>
       </ul>
     </div>
    <div class="container"><hr class="green-hr"/></div>
     
    <!--Navigation end-->

   
    
    <div class="container">
  <div class="d-flex justify-content-between align-items-center py-4">
    
    <!-- Go Back -->
    <a class="text-green d-flex align-items-center gap-1" href="#">
      <i class="ph ph-arrow-circle-left "></i>
      <p class="mb-0 ">Go Back</p>
    </a>

    <!-- POST -->
    <div>
      <p class="fw-bold mb-0">POST</p>
    </div>

  </div>
</div>

    <div class="container article-big d-flex flex-column mt-5 ">

  <div class="order-2 order-md-1 d-flex flex-column flex-md-row ">

    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
  <h1 class="header-4">{{ strtoupper($post['title']) }}</h1>
</div>
<div class="col-12 col-sm-6" >

  <div class="col-12 d-flex flex-column h-100">

    <div class="h-100">
    <p class="fw-bold">{{ $post['subtitle'] }}</p>
  </div>

     
  </div>
  </div>




 

</div>



  <div class="large-img-container mt-5 order-1 order-md-2">
    <div class=" d-flex flex-column flex-sm-row aligin-items-center justify-items-center ">
      <div class="col-6 d-flex flex-column flex-sm-row gap-3"  >
       <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center">
      <span class="text-green">Text</span> <span>{{ $post['author'] }}</span>
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center" >
      <span class="text-green">Date</span> <span>{{ \Carbon\Carbon::parse($post['timestamp'])->format('F j, Y') }}</span>
    </div>

      </div>
      <div class="col-6 d-flex flex-row justify-content-sm-end mt-3 mt-sm-0 p-0"   >

         <div class="d-flex flex-column justify-content-sm-end p-0"   >
        <div>
          <span class="tag-category">{{ $post['category'] }}</span>
        </div>
         </div>

      </div>

    </div>

    <div class="d-flex justify-content-center">

      <img class="img-fluid mt-5" src="{{ asset($post['image_path']) }}" alt="">

    </div>
  
</div>
</div>

<div class="container mt-5 p-sm-5">
    <p>
          {!! $post['body'] !!}
    </p>

    <div class="container d-flex flex-row aligin-items-center justify-content-center justify-items-center gap-4 mt-5">
       <button class="blank-btn"><i class="ph ph-share-network text-green fs-4"></i></button>
        

    </div>
    <hr class="green-hr mt-5"/>
</div>


<div class="container mt-5">
  <h3 class="header">MORE POSTS</h3>
</div>


<div class="container posts-container d-flex flex-row flex-wrap mt-5">


  @if (count($relatedPosts) === 0)
    <p class="mt-4 text-green">No related posts found.</p>
  @endif

  @foreach($relatedPosts as $post)
    <a href="{{ route('post.show', ['id' => $post['id']]) }}" class="a-inherit post col-12 col-sm-6 col-lg-4 d-flex flex-column p-5">
      <div>
        <div class="d-flex flex-column flex-sm-row flex-wrap gap-4">
          <div>
            <p>{{ \Carbon\Carbon::parse($post['timestamp'])->format('F d, Y') }}</p>
          </div>
          <div>
            <span class="tag-category">{{ $post['category'] }}</span>
          </div>
        </div>

        <div class="d-flex mt-5">
          <img class="img-fluid" src="{{ asset($post['image_path']) }}" alt="{{ $post['title'] }}">
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

    




<div class="container mt-5">
  <a class="text-green mx-2" href=""><div class="d-flex align-items-center gap-1"><p class="mb-0 fs-5">ALL ARTICLES</p><i class="ph ph-arrow-circle-right fs-5"></i></div></a>
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
<script src="{{ asset('assets/js/index.js') }}"></script>


<!--AOS-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

