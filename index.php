<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>
<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

  <title>Jinal</title>

  <link href="style.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

</head>

<body>
  <section class="coloured-section" id="title">
    <!-- Header Section-->
    <div class="area">
      <ul class="circles">
        <li>HTML</li>
        <li>C#</li>
        <li>C</li>
        <li>Java</li>
        <li></li>
        <li>Javascript</li>
        <li>NodeJs</li>
        <li>CSS</li>
        <li></li>
        <li>C++</li>
      </ul>

      <!-- <div class="page-container"> -->
      <!-- <div class="container">
            <h2 class="navbar-icon">J</h2>
            <nav class="navbar">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-links" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-links" href="#About">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-links" href="#p">Project</a>
                </li>
                <li class="nav-item">
                  <a class="nav-links" href="#experience">Experience</a>
                </li>
                <li class="nav-item">
                  <a class="nav-links" href="#contact">Contact</a>
                </li>
              </ul>
            </nav>
          </div> -->

      <br>
      <div class="title" id=home>
        <h3>Hi, my name is</h3>
        <h1><span>Jinal Patel.</span>
          <span class="sub">I develop and design<span>&#128396;</span> websites.</span>
        </h1>
      </div>
  </section>
  <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top">
    <div class="container-fluid">
      <div class="container">
        <h2 class="navbar-icon">J</h2>
        <nav class="navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="navbar-brand" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#About">About</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#p">Project</a>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="#contact">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </nav>
  </div>
  </div>

  <div class="flued-container">
    <!-- Main-Section -->
    <?php
    $Introquery = 'SELECT *
               FROM content
               WHERE type = "Introduction"
               LIMIT 1';
    $result = mysqli_query($connect, $Introquery);
    $Introquery = mysqli_fetch_assoc($result);
    ?>
    <div class="Main-section">
      <div class="page-container">
        <div id="About">About Me </div>
        <div class="description">
          <div class="content">
            <?php echo $Introquery['content']; ?>
            <div class="qualify">
              <h2>Qualifications</h2>
              <?php
              $query = 'SELECT *
                        FROM qualifications';
              $result = mysqli_query($connect, $query);
              while ($record = mysqli_fetch_assoc($result)) : ?>
                <h3><?php echo $record['credential'];
                    echo $record['yearCompleted'];
                    ?></h3>
                <h4>
                  <?php echo $record['details'];
                  ?>
                </h4>
              <?php endwhile;
              ?>
            </div>
          </div>
          <div class="image">
            <img src="image/Jinal.jpeg" alt="">
          </div>
        </div>
        <section id="skills">
          <div id="credential">
            <?php
            $skillsQuery = 'SELECT *
                FROM skills
                ORDER BY sequence';
            $skill = mysqli_query($connect, $skillsQuery);
            ?>
            <h2 class="heading">
              Skills
            </h2>
            <div class="list">
              <?php while ($record = mysqli_fetch_assoc($skill)) : ?>
                <ul>
                  <li class="s-items">
                    <h3><?php echo $record['type']; ?></h3>
                    <?php echo $record['details']; ?>
                  </li>
                </ul>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
        </section>
        <section class="experience">
          <h2>Experience</h2>
          <?php

          $expquery = 'SELECT *
                    FROM experience';
          $experience = mysqli_query($connect, $expquery);
          while ($record = mysqli_fetch_assoc($experience)) :
          ?>
            <div class="expcontent">
              <h3><?php echo $record['companyName'];
                        echo $record['position'];   
                  ?>
              </h3>
              <p><?php echo $record['duration'];
                  ?>
              </p>
              <div class="role"><strong>Roles:</strong></div>
              <?php echo $record['responsibilities'];
              ?>
            <?php endwhile;
            ?>
            </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Projects -->
  <section class="white-section" id="p">
    <div class="page-container">
      <div class="project">
        <h2>Noteworthy Projects</h2>
      </div>
      <?php
      $projectquery = 'SELECT *
        FROM projects
        ORDER BY sequence';
      $result = mysqli_query($connect, $projectquery);
      while ($record = mysqli_fetch_assoc($result)) {
        $img = base64_decode(explode(',', $record['photo'])[1]);
      ?>
        <div class="both-items">
          <div class="item item1">
            <div class="pic">
            <h2>
              <?php echo $record['title']; ?>
            </h2>
            <a href="<?php echo $record['liveUrl']; ?>">
              <div class="thumbnail">
                <?php
                echo '<img src="data:image/png;base64,' . base64_encode($img) . '"width="350" height="300">';
                ?>
              </div>
            </a>
            <a href="<?php echo $record['gitUrl']; ?>" class="git">
              <img src="image/github.png" alt="" style="width:24px ; height:24px;">
            </a>
            </div>
            <div class="caption">
              <?php echo $record['description']; ?>
            </div><span class="tech"><b><?php echo $record['technologies']; ?></b></span><br>
          </div>
        </div>
      <?php } ?>
    </div>
    </div>
  </section>

  <!-- Footer -->

  <footer class="footer-section" id="contact">
    <div class="page-container">
    <div class="container-fluid px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-sm-6 d-none d-sm-block bg-image"></div>
            <div class="col-sm-6 p-4">
              <div class="text-center">
                <div class="h3 fw-light">Contact Form</div>
                <p class="mb-4 text-muted">You can messege me at anytime!</p>
              </div>
              <form id="contactForm" data-sb-form-api-token="a3fe8c8b-a7a9-40f9-8bcf-22d227337452">
                <!-- Name Input -->

                <div class="form-floating mb-3">
                  <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                  <label for="name">Name</label>
                  <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                </div>

                <!-- Email Input -->
                <div class="form-floating mb-3">
                  <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                  <label for="emailAddress">Email Address</label>
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                  <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                </div>

                <!-- Message Input -->
                <div class="form-floating mb-3">
                  <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                  <label for="message">Message</label>
                  <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                </div>

                <!-- Submit error message -->
                <div class="d-none" id="submitErrorMessage">
                  <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>

                <!-- Submit button -->
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                </div>
              </form>
              <!-- End of contact form -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <div class="footer">
        <h3>Get In Touch</h3>
        <p>I am looking for job opportunities and you can just ping me. Whether you have a question or just
          want to say hi, I'll try my best to get back to you!</p>
        <a href="https://www.linkedin.com/in/jinal-patel-8617341a6/"><img src="image/linkedin(1).png" alt="" id="logo"></a>
        <a href="https://www.instagram.com/arcane_girl29/"><img src="image/instagram.png" alt="" id="logo1"></a>
        <a href="https://www.facebook.com/profile.php?id=100073068587253"><img src="image/facebook.png" alt="" id="logo2"></a>
        <a href="https://github.com/jinal291999"><img src="image/github.png" alt="" id="logo3"></a>
        <h4 class="copyright">© 2022 Jinal Patel</h4>
      </div>
    </div>
  </footer>

  </div>

</body>

</html>