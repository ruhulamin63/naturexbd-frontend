<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css">

</head>
<style>
.our-webcoderskull {

    margin: 20px;
}

.our-webcoderskull .cnt-block {
    float: left;
    width: 100%;
    max-width:150px;
    background: #fff;
    text-align: center;
    box-shadow: 0px 0px 20px rgba(253, 180, 80, 0.5);
    border-radius: 25px;
    margin: 5px;
    transition: 0.5s;
}

.our-webcoderskull .cnt-block:hover {

    background: #8DC63F;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

.our-webcoderskull .cnt-block figure {
    margin-top: 15px;
    width: 50%;
    height: 50%;
    border-radius: 50%;
    display: inline-block;
}

.our-webcoderskull .cnt-block img {
    width: 60px;
    height: 60px;
    margin: auto;
    border: solid 1px #9e9e9e3b;
    border-radius: 50%;
    background-color: #fff;
}

.our-webcoderskull .cnt-block h3 {
    font-size: 20px;
    font-weight: 700;
    padding: 6px 0;
    text-transform: uppercase;
    margin-top:0px;
    margin-bottom:15px;
    text-decoration: none;
    color: #333;
    transition: 0.5s;
}

.our-webcoderskull .cnt-block h3 a {
    text-decoration: none;
    color: #333;
    transition: 0.5s;
}

.cnt-block:hover h3 {
    color: #fff;
    text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
}

.cnt-block:hover .category_arrow {
    background-color: #fff;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
}

.cnt-block:hover .category_arrow a {

    color: #8DC63F !important;
    text-shadow: none !important;
}


.category_arrow {
    height: 40px;
    width: 40px;
    font-weight: 700;
    text-decoration: none;
    color: #fff;
    border-radius: 50%;
    margin: auto;
    margin-bottom: 15px;
    background-color: #8DC63F;
    transition: 0.5s;
}

.category_arrow a {
    color: #fff !important;
    font-size: 20px !important;
    font-weight: 700 !important;
    transition: 0.5s;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container1 {
    position: initial;
    margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100px;
}

.container1 .search {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 80px;
    height: 80px;
    background: #8DC63F;
    border-radius: 50%;
    transition: all 1s;
    z-index: 4;
    box-shadow: 0 0 25px 0 rgba(253, 180, 80, 0.8);
}

.container1 .search:hover {
    cursor: pointer;
}

.container1 .search::before {
    content: "";
    position: absolute;
    margin: auto;
    top: 22px;
    right: 0;
    bottom: 0;
    left: 22px;
    width: 12px;
    height: 2px;
    background: white;
    transform: rotate(45deg);
    transition: all 0.5s;
}

.container1 .search::after {
    content: "";
    position: absolute;
    margin: auto;
    top: -5px;
    right: 0;
    bottom: 0;
    left: -5px;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border: 2px solid white;
    transition: all 0.5s;
}

.container1 input {
    font-family: "Inconsolata", monospace;
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 50px;
    outline: none;
    border: none;
    background: #8DC63F;
    color: white;
    text-shadow: 0 0 10px #8DC63F;
    padding: 0 80px 0 20px;
    border-radius: 30px;
    box-shadow: 0 0 25px 0 #8DC63F, 0 20px 25px 0 rgb(0 0 0 / 20%);
    transition: all 1s;
    opacity: 0;
    z-index: 5;
    font-weight: bolder;
    letter-spacing: 0.1em;
}

.container1 input:hover {
    cursor: pointer;
}

.container1 input:focus {
    width: 70%;
    opacity: 1;
    cursor: text;
}

.container1 input:focus~.search {
    right: -70%;
    background: #151515;
    z-index: 6;
}

.container1 input:focus~.search::before {
    top: 0;
    left: 0;
    width: 25px;
}

.container1 input:focus~.search::after {
    top: 0;
    left: 0;
    width: 25px;
    height: 2px;
    border: none;
    background: white;
    border-radius: 0%;
    transform: rotate(-45deg);
}

.container1 input::placeholder {
    color: white;
    opacity: 0.5;
    font-weight: bolder;
}

/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
.row.content {
    height: 100%;
    background-color: #8DC63F;
    border: solid 1px #8DC63F;
    border-radius: 15px;
}

.nav-pills>li.active>a,
.nav-pills>li.active>a:focus,
.nav-pills>li.active>a:hover {
    color: #333;
    background-color: #ffffff;
}

/* Set gray background color and 100% height */
.sidenav {
    height: 100%;
}

/* Set black background color, white text and some padding */
footer {
    background-color: #555;
    color: white;
    padding: 15px;
}

/* On small screens, set height to 'auto' for sidenav and grid */
@media screen and (max-width: 767px) {
    .sidenav {
        height: auto;
        padding: 15px;
    }

    .row.content {
        height: auto;
    }
}
</style>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-2 sidenav">
                <h4>John's Blog</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="#section2" style="color:#333;">Kachi</a></li>
                    <li><a href="#section3" style="color:#333;">Tour</a></li>
                    <li><a href="#section3" style="color:#333;">Teka</a></li>
                </ul><br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-md-10" style="padding:20px;">
                <div class="col-md-12" style=" border:solid 1px #fff; border-radius:15px; background-color:#fff;">
                    <div class="row" style="margin-top:15px; margin-bottom:15px;">
                        <div class="col-md-11">
                            <div class="container1">
                                <input type="text" placeholder="Search...">
                                <div class="search"></div>
                            </div>
                        </div>

                        <div align="right" class="col-md-1" style="padding-right:50px; margin-top: inherit;">
                            <a style="color:#333;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>



                    <section style="margin: 0% 15%;" class="our-webcoderskull ">


                        <ul style="margin:0;padding:0;list-style:none;" class="row">
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                            <li class="col-md-2">
                                <div class="cnt-block equal-hight" style=";">
                                    <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive"
                                            alt=""></figure>
                                    <h3 class="">Coder</h3>

                                    <h3 class="category_arrow"><a href="http://www.webcoderskull.com/"><i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a></h3>
                                </div>
                            </li>
                        </ul>

                    </section>





                    <h4><small>RECENT POSTS</small></h4>
                    <hr>
                    <h2>I Love Food</h2>
                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                    <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5>
                    <br>
                    <p>Food is my passion.</p>
                    <br><br>

                    <h4><small>RECENT POSTS</small></h4>
                    <hr>
                    <h2>Officially Blogging</h2>
                    <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                    <h5><span class="label label-success">Lorem</span></h5><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua.</p>
                    <hr>

                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <br><br>

                    <p><span class="badge">2</span> Comments:</p><br>

                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                        </div>
                        <div class="col-sm-10">
                            <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
                            <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <br>
                        </div>
                        <div class="col-sm-2 text-center">
                            <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                        </div>
                        <div class="col-sm-10">
                            <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
                            <p>I am so happy for you man! Finally.</p>
                            <br>
                            <p><span class="badge">1</span> Comment:</p><br>
                            <div class="row">
                                <div class="col-sm-2 text-center">
                                    <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                                </div>
                                <div class="col-xs-10">
                                    <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
                                    <p>Me too! WOW!</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<footer class="container-fluid" style="border:solid 1px; border-radius: 0px 0px 15px 15px;">
                        <p>Footer Text</p>
                    </footer>-->
                </div>
            </div>
        </div>
    </div>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

</html>