<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" defer />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" defer />

    <title>Dashboard | Tailwind Starter Kit by Creative Tim</title>
</head>

<body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">

        <!-- sidebar -->
        @include('admin.layouts.sidebar1')
        <!-- end sidebar -->

        <div class="relative md:ml-64 bg-blueGray-50">

            <!-- Header -->
            @include('admin.layouts.header')
            <!-- end Header -->

            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

                @include('admin.layouts.footer2')
            </div>
        </div>
    </div>

    @yield('custom_script')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" charset="utf-8"></script> --}}
    {{-- <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        /* Sidebar - Side navigation menu on mobile/responsive mode */

        function toggleNavbar(collapseID) {
            // console.log("object");
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-end"
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>

</html>
