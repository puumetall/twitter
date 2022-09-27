<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>

<section class="section">
        <div class="columns">
            <div class="column is-one-fifth">
                @include('partials.sidebar')
            </div>
            <div class="column">
                <div class="container">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
</section>
</body>
</html>
