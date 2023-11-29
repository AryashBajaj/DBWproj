<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0f5c8d7587.js" crossorigin="anonymous"></script>
<style>
    *,
    *::after,
    *::before {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body{
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    .homepage{
        height: 100vh;
        width: 100vw;
        background-image: url(pexels-nandhu-kumar-450441.jpg);
        background-size: cover;
        overflow-x: hidden;
    }
    .navbar input[type="checkbox"],
    .navbar .hamburger-lines {
    display: none;
    }
    .navbar {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content:space-between;
        padding: 19px 70px 0px 70px;
    }
    .menu-items {
        order: 2;
        display: flex;
    }

    .menu-items li {
        list-style: none;
        margin-left: 1.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }

    .menu-items a {
        text-decoration: none;
        color: #ffffff;
        font-weight: 500;
        transition: color 0.3s ease-in-out;
    }
    .menu-items a:hover {
        color: #117964;
        transition: color 0.3s ease-in-out;
    }
    .moving-text h1{
        display: inline-block;
    }
    .moving-text{
        font-family: 'Quattrocento Sans', sans-serif;
        font-size: 40px;
    }
    .typewrite{
        text-decoration: none;
        color: rgb(255, 157, 0);
    }
    .abouttext{
        height: 50vh;
        margin: 150px 100px;
        color: rgb(255, 251, 212);
        /* background-color: #117964; */
    }
    .up-text{
        font-family: 'Karla', sans-serif;
        font-size: 30px;
    }
</style>
</head>
<body>
    <div class="homepage">
        <div class="navbar">
                <div>
                    <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <ul class="menu-items">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#food">Category</a></li>
                    <li><a href="#food-menu">Menu</a></li>
                    <li><a href="#testimonials">Testimonial</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                </div>
                <div>
                    <a style="margin-left: 50%;" href="user.php">
                        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    </a>
                    <br>
                    <div style="text-align:center; font-family: 'Karla', Sans-serif; font-size: 25px; color: white"> <p> Hi, <?php echo $_SESSION["name"]?> </p></div>
                </div>
        </div>

        <div class="abouttext">

            <div class="up-text">
                <h4>
                    Craft your India voyage,<br>
                    memories await you!
                </h4>
            </div>
            <div class="moving-text">
                <h1>Visit </h1>
                <h1 class="typing">
                    <a href="" class="typewrite" data-period="2000" data-type='[ " Kashmir.", " Udaipur.", " Varanasi.", " Coorg." ]'>
                    <span class="wrap"></span>
                    </a>
                </h1>
            </div>
              
        </div>
    </div>

    <script>
        var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
    </script>
</body>
</html>