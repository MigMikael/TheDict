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
    <style>
        body {
            background: #fafafa;
        }
        .page-content {
            margin-top: 7%;
            margin-left: 5%;
            margin-right: 5%;
        }

        .word-card {
            height: 210px;
        }

        .word-card > .mdl-card__title {
            background: #3f51b5;
            color:  #ffffff;
        }

        .result-card {
            height: 210px;
        }

        .result-card > .mdl-card__title {
            background: #3f51b5;
            color:  #ffffff;
        }
    </style>


</head>
<body>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">TheDict</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">TheDict</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                {!! Form::open(['url' => '/api/translate/en-th']) !!}
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--5-col">
                        <div class="mdl-card word-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__title">
                                <b>English</b>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    {!! Form::text('word', null, ['class' => 'mdl-textfield__input']) !!}
                                    {!! Form::label('word', 'Word', ['class' => 'mdl-textfield__label']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--2-col">
                        <div class="mdl-cell mdl-cell--12-col" style="text-align: center">
                            {!! Form::submit('Search!', ['class' => 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent']) !!}
                        </div>
                    </div>

                    <div class="mdl-cell mdl-cell--5-col ">
                        <div class="mdl-card result-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__title">
                                <b>Thai</b>
                            </div>
                            <div class="mdl-card__supporting-text" style="font-size:20px">
                                @if(isset($results))
                                    @if(sizeof($results) == 0)
                                        <p>Not Found</p>
                                    @else
                                        Word : {{ $results[0] -> sentry }}<br>
                                        Meaning : {{ $results[0] -> tentry }}
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if(isset($results))
                            <ul class='mdl-list mdl-cell mdl-cell--12-col'>
                                @for($i = 1; $i < sizeof($results); $i++)
                                    <li class="mdl-list__item">
                                        <span class="mdl-list__item-primary-content">
                                            {{ $results[$i] -> sentry }}:   {{ $results[$i] -> tentry }}
                                        </span>
                                    </li>
                                @endfor
                            </ul>
                        @endif
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>

{{--Todo finish Th to En View--}}
    {{--<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
                mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title" href="{{ url('/') }}">
                    <b>The Dict</b>
                </span>
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active" style="font-size:16px">
                    <b>English</b>
                    <i class="material-icons" style="font-size:14px">arrow_forward</i>
                    <b>Thai</b>
                </a>
                <a href="#fixed-tab-2" class="mdl-layout__tab" style="font-size:16px">
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
    </div>--}}
</body>
</html>