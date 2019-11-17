<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head_log')
</head>

<body class="page-header-fixed">


<div class="container-fluid">
    @yield('content')
</div>

<div class="scroll-to-top"
     style="display: none;">
    <i class="fa fa-arrow-up"></i>
</div>

@include('partials.javascripts')

</body>
</html>