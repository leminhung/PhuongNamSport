<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>User Information</title>
  <link rel="stylesheet" href="https://getbootstrap.com/docs/5.1/dashboard.css">
  <link rel="stylesheet" href="https://getbootstrap.com/docs/5.1/dashboard.rtl.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .col-md-4 {
      width: 93.333333% !important;
    }

    .cus-info {
      width: 100%;
    }

    .form-group {
      margin-bottom: 12px;
    }

    body {
      margin-top: 40px;
      background-color: black;
    }

    .container {
      margin-left: -5%;
    }
  </style>

  <link href="/PhuongNamSport/Admin_view/dashboard.css" rel="stylesheet">
  <link href="/PhuongNamSport/Admin_view/styles_user_update.css" rel="stylesheet">
</head>

<body>
  <?php
  require_once "../database/config.php";
  session_start();
  ?>
  <?php
  if (isset($_GET['err_exist'])) {
    echo '<script type="text/javascript">alert("' . $_GET['err_exist'] . '");</script>';
  }
  ?>
  <div class="container-fluid">
    <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        ?>

        <div class="container">
          <form class="form-inline" method="POST" action="../Admin_view/user/process_user.php">
            <div class="main-body">
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4><?php echo $user['username'] ?></h4>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Full Name</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your fullname" value="<?php echo $user['username'] ?>" name="fullname">
                      </div>

                      <!-- Hidden field -->
                      <input type="hidden" name="user_idv" value="<?php echo $user['user_id'] ?>">

                      <div class="form-group">
                        <label for="inputAddress2">Email</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter your email" value="<?php echo $user['email'] ?>" name="email">
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Phone</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your phone" value="<?php echo $user['phone'] ?>" name="phone">
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Name</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter your name" value="<?php echo $user['name'] ?>" name="name">
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="category">Role</label>
                        <?php
                        $option2 = $user['role'] == 1 ? 0 : 1;
                        ?>
                        <div class="col-md-12">
                          <select name="role" class="form-control">
                            <option value="<?php echo $user['role'] ?>"><?php echo $user['role'] ?></option>
                            <option value="<?php echo $option2 ?>"><?php echo $option2 ?></option>
                          </select>
                        </div>
                      </div>
                      <a href="../trangchu.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Back</a>
                      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                      <a href="../Admin_view/user/process_user.php?id_userd=<?php echo $user['user_id'] ?>" class="btn btn-danger btn-md active" onclick="return confirm('Bạn chắc chắn muốn xóa tài khoản<?php echo $user['username'] ?> này?')" role="button" aria-pressed=" true">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>


  <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
  </script>
  <script src="../dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
</body>

</html>