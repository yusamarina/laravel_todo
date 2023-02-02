<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
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

    .title {
        font-size: 36px;
        padding: 20px;
    }
    </style>
</head>

<body>
  <div class="">
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title">404</div>
        <div class="title">
          Sorry, the page you are looking for could not be found.
        </div>
          <p>お探しのページは見つかりませんでした。</p>
          <div class="flex-center">
            @if (Route::has('login'))
              <div class="px-6 py-4 sm:block">
                @auth
                  <a href="{{ url('/task') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ToDo List</a>
                @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                  @endif
                @endauth
              </div>
            @endif
          </div>
      </div>
    </div>
  </div>
</body>
</html>
