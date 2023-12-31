<!DOCTYPE html>
<html>
    <head>
        <title>FeeltheFeeling</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body>
      <div>   
         <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: bisque;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#tab1"><img src="logo4.1.png"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#tab1">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#tab2">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#tab3">About</a>
                  </li>
                </ul>
                <form class="d-flex">
                    <?php
                    session_start();
                    require('db_connection.php');

                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT username FROM users WHERE id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 1) {
                            $row = $result->fetch_assoc();
                            echo 'Welcome, ' . htmlspecialchars($row['username']) . '!';
                        } else {
                            echo 'Welcome, User!';
                        }

                        $stmt->close();
                    }
                    ?>
                </div>
                </form>
              </div>
            </div>
          </nav> 
        </div>
        <div class="parallax1 h1 container-fluid" id="tab1" style="padding-top: 70px;">
          <h1 class="animate__animated  animate__slideInLeft" style="padding-top: 200px;text-align: center;font-family: 'Times New Roman', Times, serif;font-size: 80;color:#f5a70a;">Welcome to Feel the Feeling</h1></div>
        <div class="parallax2" id="tab2">
           <div class="container">
                <div class="row"> 
                    <div class=" col-lg-3 py-lg-1 px-lg-4 mr-lg-1 mt-5 mb-5 mx-auto ">
                        <div class="card text-black " style="background-color: #ffeecc;" >
                            <img src="img3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Things people with anxiety want you to know</h5>
                                <p class="card-text">In this empathetic blog, gain valuable insights into the experiences of individuals with anxiety. Learn what they wish you knew to foster understanding, support, and compassion in your interactions.</p>
                                <a href="vivek_blog.html" class="btn btn-primary" style="background-color: #f5a70a;">Read more</a>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 py-lg-1 px-lg-4 mr-lg-1 mt-5 mb-5 mx-auto">
                        <div class="card text-black" style="background-color: #ffeecc;">
                            <img src="card2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">The impact of technology on society</h5>
                                <p class="card-text">Explore the profound influence of technology on our lives, from positive transformations to challenges, in this insightful blog. Discover how technology shapes our world.</p>
                                <a href="aditi_blog.html" class="btn btn-primary" style="background-color: #f5a70a;">Read more</a>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 py-lg-1 px-lg-4 mr-lg-1 mt-5 mb-5 mx-auto">
                        <div class="card text-black" style="background-color: #ffeecc;">
                            <img src="img1.1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Embrace the Unknown: The Thrill of Adventure</h5>
                                <p class="card-text">Adventure calls to the free spirits, the thrill-seekers, and the wanderers among us. It's a beckoning to step outside the comfort zone, to explore the uncharted territories of both the world and the self...</p>
                                <a href="tony_blog.html" class="btn btn-primary" style="background-color: #f5a70a;">Go somewhere</a>
                             </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
        <hr style='border: 6px solid ; color: #f5a70a;' >
        <div class="container-fluid" id="tab3" style="padding: 0%;margin: 0%;">
          <div class="foot-panel4">
            <div class="logo">
            </div>
            <div class="copyright">
              © 2023, FeeltheFeeling.com
          </div>
          </div>
          
        </div>
           
           
<script>
  $(document).ready(function () {
      $('.navbar-toggler').click(function () {
          $('.navbar-collapse').toggleClass('show');
      });
  });
</script>
        </body>
</html>
