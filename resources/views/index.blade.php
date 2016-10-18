<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <title>The Dict</title>
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
                mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title"><b>The Dict</b></span>
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active" style="font-size:16px">
                    <b>English</b>
                    <i class="material-icons" style="font-size:14px">arrow_forward</i>
                    <b>Thai</b>
                </a>
                <a href="#fixed-tab-2" class="mdl-layout__tab">
                    <b>Thai</b>
                    <i class="material-icons" style="font-size:14px">arrow_forward</i>
                    <b>English</b>
                </a>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">The Dict</span>
        </div>
        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                <div class="page-content">
                    <h1>EN -> TH</h1>
                    {!! Form::open(['url' => '/api/translate/en-th']) !!}
                        {!! Form::text('word') !!}
                        {!! Form::submit('Search!') !!}
                    {!! Form::close() !!}

                    @if(isset($results))
                        @if(sizeof($results) == 0)
                            <p>Not Found</p>
                        @endif
                        @foreach($results as $result)
                            Word : {{ $result -> sentry }}<br>
                            Meaning : {{ $result -> tentry }}
                            <hr>
                        @endforeach
                    @endif
                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                <div class="page-content">
                    <h1>TH -> EN</h1>
                    {!! Form::open(['url' => '/api/translate/th-en']) !!}
                        {!! Form::text('word') !!}
                        {!! Form::submit('Search!') !!}
                    {!! Form::close() !!}

                    @if(isset($results))
                        @if(sizeof($results) == 0)
                            <p>Not Found</p>
                        @endif
                        @foreach($results as $result)
                            Word : {{ $result -> sentry }}<br>
                            Meaning : {{ $result -> tentry }}
                            <hr>
                        @endforeach
                    @endif
                </div>
            </section>
        </main>
    </div>
</body>
</html>