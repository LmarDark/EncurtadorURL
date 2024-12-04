<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Style -->
    @php
        if (date('m') == '4') {
            echo '<style>
                        /* Estilo para os ovos (emoji) */
                        .egg {
                            position: fixed;
                            top: -70px;
                            font-size: 50px; /* Tamanho do emoji */
                            animation: fall 5s infinite ease-in, rotate 5s infinite linear; /* Animação de queda e rotação */
                        }

                        /* Animação dos ovos caindo */
                        @keyframes fall {
                            0% {
                                top: -100px; /* Começa acima da tela */
                                opacity: 1;
                            }
                            100% {
                                top: 100vh; /* Termina fora da tela, na parte inferior */
                                opacity: 0;
                            }
                        }

                        /* Animação de rotação */
                        @keyframes rotate {
                            0% {
                                transform: rotate(0deg); /* Começa sem rotação */
                            }
                            100% {
                                transform: rotate(360deg); /* Gira 360 graus */
                            }
                        }

                        /* Para dar variação na animação de cada ovo */
                        .egg:nth-child(1) {
                            left: 10%;
                            animation-duration: 6s;
                            animation-delay: 0s;
                        }

                        .egg:nth-child(2) {
                            left: 30%;
                            animation-duration: 5s;
                            animation-delay: 1s;
                        }

                        .egg:nth-child(3) {
                            left: 50%;
                            animation-duration: 7s;
                            animation-delay: 2s;
                        }

                        .egg:nth-child(4) {
                            left: 70%;
                            animation-duration: 5.5s;
                            animation-delay: 3s;
                        }

                        .egg:nth-child(5) {
                            left: 90%;
                            animation-duration: 6.5s;
                            animation-delay: 4s;
                        }
                    </style>';
        }
    @endphp

    @php
        if (date('m') == '12') {
            echo '<style>
            .snowflake {
                position: fixed;
                top: -50px;
                user-select: none;
                font-size: 1.5rem;
                color: #95ffff;
                animation: snow 10s linear infinite;
                z-index: 50;
            }

            @keyframes snow {
                0% { transform: translateY(0) rotate(0deg); }
                100% { transform: translateY(100vh) rotate(360deg); }
            }

            .snowflake:nth-child(1) { left: 5%; animation-duration: 8s; }
            .snowflake:nth-child(2) { left: 20%; animation-duration: 10s; }
            .snowflake:nth-child(3) { left: 40%; animation-duration: 7s; }
            .snowflake:nth-child(4) { left: 60%; animation-duration: 9s; }
            .snowflake:nth-child(5) { left: 80%; animation-duration: 11s; }
                    </style>';
        }
    @endphp

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @php
        if (date('m') == '12') {
            echo '<div class="snowflakes">';
            echo '<div class="snowflake">❄</div>';
            echo '<div class="snowflake">❄</div>';
            echo '<div class="snowflake">❄</div>';
            echo '<div class="snowflake">❄</div>';
            echo '<div class="snowflake">❄</div>';
            echo '</div>';
        }
    @endphp
    @php
        if (date('m') == '4') {
            echo '<div class="egg">🥚</div>';
            echo '<div class="egg">🥚</div>';
            echo '<div class="egg">🐣</div>';
            echo '<div class="egg">🥚</div>';
            echo '<div class="egg">🐣</div>';
        }
    @endphp

    @inertia
</body>

</html>
