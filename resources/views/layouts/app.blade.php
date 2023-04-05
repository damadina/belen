<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />

        <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />



       <style>
            .icon-button {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50px;
                height: 50px;
                color: #333333;
                background: #dddddd;
                border: none;
                outline: none;
                border-radius: 50%;
            }
            .icon-button-badge {
                /* position: absolute;
                top:-10px;
                right: -10px; */
                width: 25px;
                height: 25px;
                background: red;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
            }
            .icon-button:hover {
                cursor: pointer;

            }
            .icon-button:active {
                background: #cccccc;
            }
            .disabled {
            opacity: 0.6;
            cursor: not-allowed;
            }
            [x-cloak] {
             display: none !important;
            }

        </style>




        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/css/common.css','resources/js/app.js']) --}}
        @vite(['resources/css/app.css', 'resources/css/common.css','node_modules/@fortawesome/fontawesome-free/css/all.min.css','resources/js/app.js'])




        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

        <script src="https://cdn.tailwindcss.com/3.2.4"></script>
        <script>
          tailwind.config = {
            darkMode: "class",
            theme: {
              fontFamily: {
                sans: ["Roboto", "sans-serif"],
                body: ["Roboto", "sans-serif"],
                mono: ["ui-monospace", "monospace"],
              },
            },
            corePlugins: {
              preflight: false,
            },
          };
        </script>

{{-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script> --}}
        @stack('js')
    </body>
</html>
