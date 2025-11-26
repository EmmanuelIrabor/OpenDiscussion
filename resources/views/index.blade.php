@php use Carbon\Carbon; @endphp

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
      href="assets/images/logo.svg"
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
    <x-navbar />

    <div>
        <h1 class="header text-center">TOP STORIES</h1>
    </div>


    <!--Headlines-->

   <div class="container">
    <div class="headlines d-flex justify-content-center">
        <div class="d-flex flex-row align-items-center px-3 py-3">
            <!-- <div>
                <h4 class="fw-bold mb-0">NEWS&nbsp;|</h4>
            </div> -->
            <div>
                <marquee behavior="" direction="left">
                    <a href="">From South London to Super Eagles: What The Innit Boys Teach Us About Identity •</a>
                    <a href="">Love in Every Word: Nollywood’s Distrust of Critical Thoughts and Rising Anti-Intellectualism •</a>
                    <a href="">Ola Aina: Mastering The Game, Owning the Spotlight •</a>
                    <a href="">The Uzama Brothers Are Wearing Their City on Their Sleeves •</a>
                </marquee>
            </div>
        </div>
    </div>
</div>

<div class="container articles mt-5">

@foreach ($posts as $post)

    @if ($post['layout'] === 'large')
    <!-- Large Article -->
    <a class="article-link" href="{{ route('post.show', $post['id']) }}">
      <div class="article-big d-flex flex-column ">

  <div class="order-2 order-md-1 d-flex flex-column flex-md-row ">

    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
  <h1 class="header-4">{{ strtoupper($post['title']) }}</h1>
</div>
<div class="col-12 col-sm-6" >

  <div class="col-12 d-flex flex-column h-100">

    <div class="h-100">
    <p>{{ $post['subtitle'] }}</p>
  </div>

     <div class=" d-flex flex-column flex-lg-row mb-4 gap-3 gap-sm-4 " >

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center">
      <span class="text-green">Text</span> <span>{{ $post['author'] }}</span>
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center" >
      <span class="text-green">Date</span> <span>{{ \Carbon\Carbon::parse($post['timestamp'])->format('F j, Y') }}</span>
    </div>

    <div class="d-flex flex-row gap-2 aligin-items-center justify-items-center" >
      <!-- <a href="" class="tag-link p-0 m-0">
        <div class="tag-category">
        <span>Entertainment</span>
      </div>
      </a> -->
       <span class="tag-category">{{ $post['category'] }}</span>
    </div>

    

    

  </div>
  </div>
  </div>




 

</div>

  <div class="large-img-container d-flex justify-content-center mt-5 order-1 order-md-2">
  <img class="img-fluid" src="{{ asset($post['image_path']) }}" alt="">
</div>
</div>
    </a>


    <div class="mt-6">

    
    @else
    <!-- Small Article -->
    <div class="container-fluid d-flex flex-column">
       <a class="article-link" href="{{ route('post.show', $post['id']) }}">
      <div class="small-article d-flex flex-column flex-sm-row gap-5 mt-5 aligin-items-center">

    <div class="small-article_img col-12 col-sm-3">
      <img class="img-fluid" src="{{ asset($post['image_path']) }}" alt="">
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
</a>


      <hr class="hr-light"/>
    </div>
    @endif
    

@endforeach

</div>
</div>


<div class="container mt-5">
  <a class="text-green mx-2" href=""><div class="d-flex align-items-center gap-1"><p class="mb-0 fs-5">ALL ARTICLES</p><i class="ph ph-arrow-circle-right fs-5"></i></div></a>
</div>

<div class="container mt-5">
  <hr class="green-hr"/>
</div>

<!--media section-->

<div class="container ">
  <h2 class="header mt-5">MEDIA</h2>

  <div class="container mt-5 medias d-flex flex-column gap-5">

    <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7  ">

      <div class="col-12 col-lg-5">
        <img class="img-fluid" src="assets/images/pexels-obregonia-d-toretto-325418-918281.jpg" alt="">
      </div>
      <div class="col-12 col-lg-5">

        <h3 class="fw-bold">VIDEOS</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

    </div>

    <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7 ">

      
      <div class="col-12 col-lg-5 order-2 order-md-1">

        <h3 class="fw-bold">MUSIC & AUDIO</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

      <div class="col-12 col-lg-5 order-1 order-md-2">
        <img class="img-fluid" src="assets/images/pexels-pixabay-248510.jpg" alt="">
      </div>


    

    </div>

      <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7  ">

      <div class="col-12 col-lg-5">
        <img class="img-fluid" src="assets/images/pexels-markusspiske-4201333.jpg" alt="">
      </div>
      <div class="col-12 col-lg-5">

        <h3 class="fw-bold">SHORT FILMS</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

    </div>

    <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7 ">

      
      <div class="col-12 col-lg-5 order-2 order-md-1">

        <h3 class="fw-bold">E-BOOKS</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

      <div class="col-12 col-lg-5 order-1 order-md-2">
        <img class="img-fluid" src="assets/images/pexels-pixabay-48020.jpg" alt="">
      </div>


    

    </div>

    <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7  ">

      <div class="col-12 col-lg-5">
        <img class="img-fluid" src="assets/images/pexels-pixabay-161154.jpg" alt="">
      </div>
      <div class="col-12 col-lg-5">

        <h3 class="fw-bold">ART & PHOTOGRAPHY</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

    </div>

    <div class="d-flex flex-column flex-lg-row gap-5 aligin-items-center justify-items-center justify-content-center mt-7 ">

      
      <div class="col-12 col-lg-5 order-2 order-md-1">

        <h3 class="fw-bold">POLLS & SURVEYS</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam sint in consequatur debitis voluptas dolor amet aliquam qui, voluptatem omnis, rem quae sunt, quasi quia mollitia consequuntur officia inventore quaerat.</p>

        <a class="more-info-link" href="">More</a>

      
      </div>

      <div class="col-12 col-lg-5 order-1 order-md-2">
        <img class="img-fluid" src="assets/images/pexels-tara-winstead-8850706.jpg" alt="">
      </div>


    

    </div>
  </div>
</div>

 <div class="container mt-6 d-flex flex-column aligin-items-center justify-items-center justify-items-center ">

  <div class="container d-flex col-6 flex-column aligin-items-center justify-items-center justify-items-center">
    <img class="img-fluid" src="assets/images/odi banner.png" alt="">
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
    <img class="img-fluid nav-logo" src="assets/images/logo.svg" alt="">
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

