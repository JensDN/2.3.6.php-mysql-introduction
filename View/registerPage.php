<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Jens MySQL Project</title>
    <meta name="description" content="My go @MySQL, proper MVC and staying sane.">
    <link rel="stylesheet" href="View/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="View/assets/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="View/assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="View/assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="?page=homepage">Jens MySQL Project</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="?page=homepage">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="?page=profile">About you</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="?page=login">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="?page=register">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                    <p>Welcome to my database, below add all your spicy details</p>
                </div>
                <form method="post" action="?page=register">
                    <fieldset>
                        <legend>Login Details</legend>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input class="form-control item" type="text" id="name" name="becode.student.username" required="">
                            <label for="password">Password</label>
                            <input class="form-control item" type="password" name="becode.student.password" id="password" required="">
                            <label for="email">Email</label>
                            <input name="becode.student.email" class="form-control item" type="email" id="email" required="">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Profile Details</legend>
                        <div class="form-group">
                            <label for="firstName">First name</label>
                                <input class="form-control item" type="text" id="firstName" name="becode.student.first_name" required="">
                            <label for="lastName">Last Name</label>
                            <input class="form-control item" type="text" id="lastName" name="becode.student.last_name" required=""></div>
                        <div class="form-group">
                            <label>Linked&nbsp;</label>
                                <input class="form-control" name="becode.student.linkedin" type="url" required="" placeholder="http://www.linkedin.com/user?">
                            <label>Github</label>
                                <input class="form-control" name="becode.student.github" type="url" placeholder="http://www.github.com/user?">
                            <label>Language</label>
                                <select class="form-control" name="becode.student.language">
                                    <optgroup label="Language">
                                        <option value="nl" selected="">Dutch</option>
                                        <option value="aq">Eskimo   </option>
                                        <option value="de">German   </option>
                                        <option value="hk">Cantonese</option>
                                    </optgroup>
                                </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="becode.student.gender" type="radio" id="maleCheck" value="m" checked>
                            <label class="form-check-label" for="maleCheck">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="becode.student.gender" type="radio" id="femaleCheck" value="f" >
                            <label class="form-check-label" for="femaleCheck">Female</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2020 By Jens</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="View/assets/js/smoothproducts.min.js"></script>
    <script src="View/assets/js/theme.js"></script>
</body>View/

</html>