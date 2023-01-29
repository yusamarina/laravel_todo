<html>
<head>
  <title>@yield('title')</title>
  <style>
    body { font-size: 20pt; text-align: center; color: #999; margin: 5px; }
    h1 { font-size: 50pt; text-align: center; color: #322f3d; margin: 30px 0px 30px 0px; letter-spacing :5pt; }
    h2 { font-size: 70pt; text-align: center; color: #322f3d; margin: -20px 0px -30px 0px; letter-spacing :5pt; }
    h3 { font-size: 15pt; text-align: center; color: #322f3d9b; margin: -20px 0px 30px 0px; letter-spacing :5pt; }
    hr { margin: 25px 10px; border-top: 1px dashed #322f3d; }
    th { background-color: #322f3d; text-align: center; color: #fff; padding: 5px 10px; }
    td { border: solid 3px #322f3d9b; color: #322f3d; padding: 5px 10px; }
    table { margin-left: auto; margin-right: auto; font-size: 15pt; }
    .menutitle { font-size: 30pt; font-weight: bold; margin: 30px; }
    .content { margin: 10px;}
    .footer { text-align: center; font-size: 15pt; margin: 60px 10px; border-bottom: solid 1px #322f3d; color: #322f3d; }
  </style>
</head>
<body>
  <h1 class="menutitle">ToDo</h1>
  <h2>@yield('title')</h2>
    @section('menubar')
  <h3>@show</h3>
  <hr size= '1'>
  <div class="content">
    @yield('content')
  </div>
  <div class="footer">
    @yield('footer')
  </div>
</body>
</html>
