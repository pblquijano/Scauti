<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Scauti :: Sistema de control de autoaprendizaje interno</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href={{ asset('css/materialize.css') }} rel="stylesheet" type="text/css" />
      <link href={{ asset('css/toastr.css') }} rel="stylesheet" type="text/css" />
     <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css" />

     
</head>
@section('css') @show
<body>
	<div class="">
            	@yield('content')
    </div>
    <script src="{{ asset('js/jquery-2.1.4.min.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('js/materialize.js')  }}" type="text/javascript"></script>
     <script src="{{ asset('js/toastr.min.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js')  }}" type="text/javascript"></script>
    @section('javascript') @show 
</body>
</html>