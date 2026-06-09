<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<<<<<<< HEAD
        <link href="css/style.css" rel="stylesheet">

       
    </head>
    <body>
        <br>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <table class="table table-bordered">
                  
                        <thead>
                            @foreach ($assessment->assessmentServices as $assessment)
                            @php
                            $quantity = $assessment->qty;
                            $year     = $assessment->yr;
                            @endphp
                                <th style=" color: #fff; text-align: left;"><small> &nbsp;Code</small></th>
                                <th>Quantity</th>
                                <th>Fee</th>
                        </thead>
                        @endforeach
                    </table>
                </div>
            </div>
=======
        <link href="{{ asset('css/trix.css') }}" rel="stylesheet"> 
 
    </head>
    <body>
        <div class="form-group">
            <input id="x" value="" type="hidden" name="body">
            <trix-editor input="x" placeholder="Body"></trix-editor>
>>>>>>> aa26a19d7ef1a56ab71c4f006c90a1e9c1c7ec68
        </div>
        <script src="{{ asset('js/trix.js') }}"></script>
    </body>
</html>
