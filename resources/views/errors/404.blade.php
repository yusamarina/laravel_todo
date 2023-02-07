<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" type="text/css">
    <style>
    html,
    body {
        background-color: rgb(255, 255, 255);
        color: #636b6f;
        /* font-family: 'Nunito', sans-serif; */
        font-family: 'Montserrat', sans-serif;
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

    .content {
        text-align: center;
    }

    .top-title {
      font-size: 72px;
      padding: 5px;
    }

    .title {
        font-size: 36px;
        padding: 5px;
    }

    .footer {
      padding-top: 50px;
    }
    </style>
</head>

<body>
  <div class="">
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="top-title">404</div>
        <div class="title">
          Sorry, the page you are looking for could not be found.
        </div>
        <p>お探しのページは見つかりませんでした。</p>
        <div class="flex-center">
          <img src="{{ asset('img/404.png') }}" alt="">
        </div>
        <div class="flex-center">
          @if (Route::has('login'))
            <div class="px-6 py-2 sm:block">
              @auth
                <a href="{{ url('/task') }}" class="text-base text-gray-700 dark:text-gray-500 underline">ToDo App</a>
              @else
                <a href="{{ route('login') }}" class="text-base text-gray-700 dark:text-gray-500 underline">Log in</a>
                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-base text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
              @endauth
            </div>
          @endif
        </div>
        <div class="footer">
          <div class="py-12 text-center text-indigo-900">
            Illustration by <a href="https://icons8.com/illustrations/author/A7iGlOUD5Neq">dekob2</a> from <a href="https://icons8.com/illustrations">Ouch!</a>
            <p>Copyright © 2022 ToDo App</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
