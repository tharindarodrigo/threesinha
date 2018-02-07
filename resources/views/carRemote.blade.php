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
    <link rel="stylesheet"
          href="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css') !!}">

</head>

<body style="background:#fff;">


<div class="container-fluid" align="center">
    <div class="row" align="center">
        <div class="col-sm-12" align="center">
            <h3 align="center" style="color: #EEE;">IoT Remote Car</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <button class="btn btn-block btn-primary" id="forward"><i class="fa fa-arrow-up"></i></button>
            {{--<input id="ex4" type="text" data-slider-min="-1" data-slider-max="1" data-slider-step="1"--}}
                   {{--data-slider-value="0" data-slider-orientation="vertical"/>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <button class="btn btn-block btn-danger" id="stop">Stop</button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-block btn-default" id="light">LIGHTS</button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-block btn-primary" id="left"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-block btn-primary" id="right"><i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <button class="btn btn-block btn-primary" id="backward"><i class="fa fa-arrow-down"></i></button>
            {{--<input id="ex4" type="text" data-slider-min="-1" data-slider-max="1" data-slider-step="1"--}}
            {{--data-slider-value="0" data-slider-orientation="vertical"/>--}}
        </div>
    </div>

</div>

<script type="text/javascript" src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/popper.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js') !!}"></script>
{{--<script type="text/javascript" src="{!! asset('js/mdb.min.js') !!}"></script>--}}

<script type="text/javascript">

    $(document).ready(function () {
//        $("#ex4").slider({
//            reversed: true
//        });
//        $("#ex6").slider();


//        $("#ex4").on("slide", function (event) {
//            if (event.value > 0) {
//                command('forward');
//            }
//            if (event.value < 0) {
//                command('backward');
//            } else {
//                command('stop');
//            }
//        });

//        $("#ex6").on("slide", function (event) {
//            if (event.value > 0) {
//                command('left');
//            }
//            if (event.value < 0) {
//                command('right');
//            } else {
//                command('stop');
//            }
//        });


        $('.btn').click(function () {
            command($(this).attr('id'));
        })
    });




    function command(command) {
        $.ajax({
            url: 'http://' + window.location.host + '/car/' + command,
            action: 'GET',
            success: function (data) {
                console.log(data.toString());

            },

            error: function () {
                console.log('error')
            }
        })
    }


</script>
</body>

</html>
