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

     <div>
        <h1 class="header text-center">CATEGORIES</h1>
    </div>

    

    <!-- <div class="container mt-5">

      <input type="text" name="" id="" placeholder="Search...." class="search_input">
    </div> -->

    

    <div class="container mt-5">

        <h5 class="fw-bold text-green text-center">ALL CATEGORIES</h5>
        <hr class="green-hr"/>
    </div>

    <div class="container mt-5 d-flex flex-column flex-md-row flex-wrap">
      
     
        
        <a href="{{ route('posts.byCategory', ['category' => 'Entertainment']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Entertainment</h5>

            <ul class="p-0 mt-3">

                <li><p>Fashion</p></li>
                <li><p>Music</p></li>
                <li><p>Movie</p></li>
                <li><p>TVs</p></li>
                <li><p>Lifestyle</p></li>
                <li><p>Celebrity News</p></li>
                <li><p>Theater</p></li>
                <li><p>Gaming</p></li>
                <li><p>Art</p></li>
                <li><p>Dance</p></li>



            </ul>

          </a>
     

         <a  href="{{ route('posts.byCategory', ['category' => 'Finance']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Finance / Investment</h5>

            <ul class="p-0 mt-3">

                <li><p>Crypto</p></li>
                <li><p>Economy</p></li>
                <li><p>Money Market</p></li>
                <li><p>Stocks</p></li>
                <li><p>Real Estate</p></li>
                <li><p>Mutual Funds</p></li>
                <li><p>Financial Planning</p></li>
                <li><p>Retirement Planning</p></li>
                <li><p>Taxation</p></li>
                <li><p>Investment Strategies</p></li>




            </ul>

          </a> 

          <a  href="{{ route('posts.byCategory', ['category' => 'Health']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Health</h5>

            <ul class="p-0 mt-3">

                    <li><p>Tips</p></li>
                    <li><p>Nutrition</p></li>
                    <li><p>Mental Health</p></li>
                    <li><p>Fitness</p></li>
                    <li><p>Disease Prevention</p></li>
                    <li><p>Wellness Trends</p></li>
                    <li><p>Medical Research</p></li>
                    <li><p>Holistic Health</p></li>
                    <li><p>Healthcare Systems</p></li>
                    <li><p>Alternative Medicine</p></li>
                    <li><p>Self-Care Strategies</p></li>
                    <li><p>Wellness Tech</p></li>
                    <li><p>Weight Loss Tips</p></li>
                    <li><p>Yoga and Meditation</p></li>
                    <li><p>etc.</p></li>





            </ul>

          </a>

          <a  href="{{ route('posts.byCategory', ['category' => 'Tourism']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Tourism</h5>

            <ul class="p-0 mt-3">

                    <li><p>Destinations</p></li>
                    <li><p>Travel Guides</p></li>
                    <li><p>Cultural Experiences</p></li>
                    <li><p>Adventure Travel</p></li>
                    <li><p>Eco-Tourism</p></li>
                    <li><p>Travel Safety</p></li>
                    <li><p>Budget Travel</p></li>
                    <li><p>Luxury Travel</p></li>
                    <li><p>Travel Gear</p></li>
                    <li><p>Hospitality Trends</p></li>






            </ul>

          </a>

          <a  href="{{ route('posts.byCategory', ['category' => 'Tech']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Tech</h5>

            <ul class="p-0 mt-3">

            <li><p>Gadgets</p></li>
            <li><p>Software</p></li>
            <li><p>Internet</p></li>
            <li><p>AI</p></li>
            <li><p>Robotics</p></li>
            <li><p>Cybersecurity</p></li>
            <li><p>Mobile Technology</p></li>
            <li><p>Tech Industry News</p></li>
            <li><p>Innovations</p></li>
            <li><p>Social Media</p></li>
            <li><p>Data Science</p></li>






            </ul>

          </a>

           <a  href="{{ route('posts.byCategory', ['category' => 'History']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">History</h5>

            <ul class="p-0 mt-3">

               <li><p>Ancient Civilizations</p></li>
               <li><p>World Wars</p></li>
                <li><p>Historical Figures</p></li>
                <li><p>Archaeological Discoveries</p></li>
                <li><p>Cultural Heritage</p></li>
                <li><p>Historiography</p></li>
                <li><p>Social History</p></li>
                <li><p>Political History</p></li>
                <li><p>Technological Advancements</p></li>
                <li><p>Historical Controversies</p></li>







            </ul>

          </a>

           <a  href="{{ route('posts.byCategory', ['category' => 'Food']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Food & Fitness</h5>

            <ul class="p-0 mt-3">

                 <li><p>Recipes</p></li>
                <li><p>Nutrition Advice</p></li>
                <li><p>Workout Routines</p></li>
                <li><p>Diet Trends</p></li>
                <li><p>Food Culture</p></li>
                <li><p>Healthy Eating</p></li>
                <li><p>Weight Management</p></li>
                <li><p>Sports Nutrition</p></li>
                <li><p>Culinary Techniques</p></li>
                <li><p>Fitness Gadgets</p></li>








            </ul>

          </a>

           <a  href="{{ route('posts.byCategory', ['category' => 'Social']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Social Ills</h5>

            <ul class="p-0 mt-3">

                   <li><p>Poverty</p></li>
                    <li><p>Inequality</p></li>
                    <li><p>Racism</p></li>
                    <li><p>Crime</p></li>
                    <li><p>Drug Abuse</p></li>
                    <li><p>Domestic Violence</p></li>
                    <li><p>Unemployment</p></li>
                    <li><p>Corruption</p></li>
                    <li><p>Homelessness</p></li>
                    <li><p>Discrimination</p></li>
                    <li><p>Environmental Degradation</p></li>
                    <li><p>Bullying</p></li>
                    <li><p>Mental Health Stigma</p></li>
                    <li><p>Healthcare Access Issues</p></li>
                    <li><p>Human Trafficking</p></li>
                    <li><p>Child Abuse</p></li>
                    <li><p>Social Exclusion</p></li>
                    <li><p>Elder Abuse</p></li>
            </ul>

          </a>

           <a  href="{{ route('posts.byCategory', ['category' => 'Others']) }}" class="tag-category-div col-12 col-sm-6 col-lg-4 p-5 a-inherit">

            <h5 class="text-green fw-bold">Others</h5>

            <ul class="p-0 mt-3">

                   <li><p>Lorem</p></li>
                    <li><p>lorem</p></li>
                    <li><p>lorem</p></li>
                    <li><p>lorem</p></li>
                    <li><p>lorem</p></li>
                    
            </ul>

          </a>
        
          
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