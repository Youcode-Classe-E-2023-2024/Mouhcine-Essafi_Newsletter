<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
        body.font-nunito {
            font-family: Nunito Sans, san-serif;
        }
    </style>
    <body class="antialiased font-nunito bg-orange-100 flex items-center justify-center h-screen">

        <!-- card container -->
        <div class="container px-4 sm:px-8 mx-auto max-w-lg">
        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!-- card wrapper -->
            <div class="wrapper bg-white rounded-sm shadow-lg">

                <div class="card px-8 py-4">
                    <div class="card-image mt-10 mb-6">
                        <svg class="w-10 h-10 text-orange-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="512" height="512.002" viewBox="0 0 512 512.002">
                            <g transform="translate(0 0.002)">
                                <path d="M64,257.6,227.9,376a47.72,47.72,0,0,0,56.2,0L448,257.6V96a32,32,0,0,0-32-32H96A32,32,0,0,0,64,96ZM160,160a16,16,0,0,1,16-16H336a16,16,0,0,1,16,16v16a16,16,0,0,1-16,16H176a16,16,0,0,1-16-16Zm0,80a16,16,0,0,1,16-16H336a16,16,0,0,1,16,16v16a16,16,0,0,1-16,16H176a16,16,0,0,1-16-16Z" opacity="0.4" />
                                <path d="M352,160a16,16,0,0,0-16-16H176a16,16,0,0,0-16,16v16a16,16,0,0,0,16,16H336a16,16,0,0,0,16-16Zm-16,64H176a16,16,0,0,0-16,16v16a16,16,0,0,0,16,16H336a16,16,0,0,0,16-16V240A16,16,0,0,0,336,224ZM329.4,41.4C312.6,29.2,279.2-.3,256,0c-23.2-.3-56.6,29.2-73.4,41.4L152,64H360ZM64,129c-23.9,17.7-42.7,31.6-45.6,34A48,48,0,0,0,0,200.7v10.7l64,46.2Zm429.6,34c-2.9-2.3-21.7-16.3-45.6-33.9V257.6l64-46.2V200.7A48,48,0,0,0,493.6,163ZM256,417.1a79.989,79.989,0,0,1-46.888-15.192L0,250.9V464a48,48,0,0,0,48,48H464a48,48,0,0,0,48-48V250.9l-209.1,151A80,80,0,0,1,256,417.1Z" />
                            </g>
                        </svg>
                    </div>

                    <div class="card-text">
                        <h1 class="text-xl md:text-2xl font-bold leading-tight text-gray-900">Get the latest components right into your inbox!</h1>
                        <p class="text-base md:text-lg text-gray-700 mt-3 ">Join 1k+ happy subscribers!</p>
                    </div>

                    <form action="{{ route('subscribe') }}" method="POST" class="card-mail flex items-center my-10">
                        @csrf
                        <input name="email" type="email" class="border-l border-t border-b border-gray-200 rounded-l-md w-full text-base md:text-lg px-3 py-2" placeholder="Enter Your Email">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 hover:border-orange-600 text-white font-bold capitalize px-3 py-2 text-base md:text-lg rounded-r-md border-t border-r border-b border-orange-500">subscribe</button>
                    </form>
                </div>
            </div>

            <footer>
                <div class="footer-body mt-6 text-xs text-orange-800">
                    <span class="">Design by</span><a href="#" class="font-semibold underline"> Me</a>

                </div>
            </footer>
        </div>
    </body>

</html>