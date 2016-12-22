<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Anaheim);

            *{
                margin: 0;
                padding: 0;
                outline: none;
                border: none;
                box-sizing: border-box;
            }
            *:before,
            *:after{
                box-sizing: border-box;
            }
            html,
            body{
                min-height: 100%;
            }
            body{
                background-image: radial-gradient(mintcream 0%, lightgray 100%);
            }
            h1{
                display: table;
                margin: 5% auto 0;
                text-transform: uppercase;
                font-family: 'Anaheim', sans-serif;
                font-size: 4em;
                font-weight: 400;
                text-shadow: 0 1px white, 0 2px black;
            }
            .container{
                margin: 4% auto;
                width: 210px;
                height: 140px;
                position: relative;
                perspective: 1000px;
            }
            #carousel{
                width: 100%;
                height: 100%;
                position: absolute;
                transform-style: preserve-3d;
                animation: rotation 20s infinite linear;
            }
            #carousel:hover{
                animation-play-state: paused;
            }
            #carousel figure{
                display: block;
                position: absolute;
                width: 90%;
                height: 50%px;
                left: 10px;
                top: 10px;
                background: black;
                overflow: hidden;
                border: solid 5px black;
            }
            #carousel figure:nth-child(1){transform: rotateY(0deg) translateZ(288px);}
            #carousel figure:nth-child(2) { transform: rotateY(40deg) translateZ(288px);}
            #carousel figure:nth-child(3) { transform: rotateY(80deg) translateZ(288px);}
            #carousel figure:nth-child(4) { transform: rotateY(120deg) translateZ(288px);}
            #carousel figure:nth-child(5) { transform: rotateY(160deg) translateZ(288px);}
            #carousel figure:nth-child(6) { transform: rotateY(200deg) translateZ(288px);}
            #carousel figure:nth-child(7) { transform: rotateY(240deg) translateZ(288px);}
            #carousel figure:nth-child(8) { transform: rotateY(280deg) translateZ(288px);}
            #carousel figure:nth-child(9) { transform: rotateY(320deg) translateZ(288px);}

            img{
                -webkit-filter: grayscale(1);
                cursor: pointer;
                transition: all .5s ease;
            }
            img:hover{
                -webkit-filter: grayscale(0);
                transform: scale(1.2,1.2);
            }

            @keyframes rotation{
                from{
                    transform: rotateY(0deg);
                }
                to{
                    transform: rotateY(360deg);
                }
            }
        </style>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    IMGY
                </div>


                <div class="container">
                    <div id="carousel">
                        <figure><img src="https://mycamerajournal.files.wordpress.com/2014/02/photographer-5.jpg" alt="" width="100%" height="50%" ></figure>
                        <figure><img src="https://images3.alphacoders.com/853/thumb-1920-85305.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://static.boredpanda.com/blog/wp-content/uploads/2015/05/owl-photography-sasi-smit-fb.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://loyalla.com/blog/wp-content/uploads/2015/04/photography1thewowstyle.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://www.martinpelzer.com/wp-content/uploads/2014/05/Photography-Business.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://www.sekonic.com/portals/0/articles/zuckerman_wildlife_photography_image04.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://hdwallpapershdpics.com/wp-content/uploads/2016/06/Amazing-Photography-Wallpaper.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://www.newhdwallpapers.in/wp-content/uploads/2014/01/Shore-Chains-City-Evening-HD-Photography.jpg" alt="" width="100%" height="50%"></figure>
                        <figure><img src="http://hdwidescreenwallpapers.com/wp-content/uploads/2013/11/amazing-photography-hd-wallpapers.jpg" alt="" width="100%" height="50%"></figure>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
