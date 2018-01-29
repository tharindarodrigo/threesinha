<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <link rel="stylesheet"
          href="{!! asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') !!}">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    {{--<link href="{!! asset('css/mdb.min.css') !!}" rel="stylesheet">--}}
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <style type="text/css">
        @keyframes glowing {
            0% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: white;
            }
            50% {
                background-color: #FF0000;
                box-shadow: 0 0 40px #FF0000;
                color: white;
            }
            100% {
                background-color: #B20000;
                box-shadow: 0 0 3px #B20000;
                color: white;
            }
        }

        .glow {
            -webkit-animation: glowing 1500ms infinite;
            -moz-animation: glowing 1500ms infinite;
            -o-animation: glowing 1500ms infinite;
            animation: glowing 1500ms infinite;
        }
    </style>
</head>

<body>

<div class="container">
    <br>
    <div class="row">
        <div class="offset-sm-4 col-sm-4">
            <h3 align="center">Dialog Universal Remote</h3>
        </div>
    </div>
    <div class="row">
        <div class="offset-sm-4 col-sm-4">
            <h3 align="center">Samsung - TV</h3>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-4">
            <a type="button" class="btn btn-floating btn-lg btn-danger" id="power"><i class="fa fa-power-off"></i></a>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <button class="btn btn-elegant btn-block" id="source"><small>source</small></button>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel1">1</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel2">2</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel3">3</button>
        </div>

    </div>
    <br>
    <div class="row">

        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel4">4</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel5">5</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel6">6</button>
        </div>

    </div>
    <br>
    <div class="row">

        <div class="col-4 align-enter">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel7">7</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel8">8</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel9">9</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" >-</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channel0">0</button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" ><small>PRE-CH</small></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="volumeup"><small>VOL +</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="mute"><i class="fa fa-volume-off"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channelup">CH <i class="fa fa-angle-up"></i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="volumedown"><small>VOL -</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>CH List</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light" id="channeldown">CH <i class="fa fa-angle-down"></i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>Menu</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>Smart HUB</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>GUIDE</small></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>Tools</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-arrow-up"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>info</small></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-sign-in"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>Return</small></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-arrow-down"></i></button>
        </div>
        <div class="col-4">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-exit"></i><small>Exit</small></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <button class="btn btn-block btn-danger">A</button>
        </div>
        <div class="col-3">
            <button class="btn btn-block btn-success">B</button>
        </div>
        <div class="col-3">
            <button class="btn btn-block btn-warning">C</button>
        </div>
        <div class="col-3">
            <button class="btn btn-block btn-primary">D</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>E-Manual</small></button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small class="xs">SPORTS</small></button>
        </div>
    {{--</div>--}}
    {{--<br>--}}
    {{--<div class="row">--}}
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><small>cc</small></button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-stop"></i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-backward"></i></button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-play"></i></button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-pause"></i></button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-elegant btn-rounded btn-block waves-effect waves-light"><i class="fa fa-fast-forward"></i></button>
        </div>
    </div>
    <br>
</div>

<script type="text/javascript" src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/popper.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/mdb.min.js') !!}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn').click(function () {
            var command = $(this).attr('id');
            //alert(command);
            controlTV(command);
        })
    });

    function controlTV(command) {
        $.ajax({
            url: 'http://' + window.location.host + '/tv/' + command,
            action: 'GET',
            success: function (data) {
                alert(data.toString());

            },

            error: function () {
                console.log('error')
            }
        })
    }
</script>
</body>

</html>
