<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cashieristic</title>
    <link rel="icon" href="/image/Logo_Kopitiam.png" type="image/png" sizes="25x25">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <!-- Styles -->
        <link href="/css/dashboardstyle.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/invoice.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/d0eb1a3c02.js" crossorigin="anonymous"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script> 
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
            </style>

<style>
    body {
        font-family: 'Nunito', sans-serif;
    } table, td, tr, th{
        border: 1px solid black;
            }table.center {
                margin-left: auto;
                margin-right: auto;
            }
            .hovertable tr:hover{
                background: #e6e6ff;
            }
            
            </style>
        <style>
            .button {
                background-color: #FF9D43;
                border: none;
                color: white;
                padding: 10px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }
            
            </style>
        <style>
            body {margin:0;}
            
            .navbar {
                overflow: hidden;
                background-color: #4169E1;
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 999;
            }
            
            .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: right;
            padding: 10px 10px;
            text-decoration: none;
            font-size: 20px;
        }
        
        .navbar a:hover {
            background: #FF9D43;
            color: #ddd;
        }
        
        .btn-custom-color{
            background-color:#FF9D43;
            color: #ddd;
        }
            
        .form-custom{
            border: 2px:white;
            border-radius: 5px;
            background-color:#FF9D43;
            color: #ddd;
        }

        
        
        .main {
            padding: 5px;
            margin-top: 30px;
            height: 1500px; /* Used in this example to enable scrolling */
        }

            .logo-link{
                position: absolute;
            }
            .logo-img{
                border-radius: 20px;
                padding: 10px;
                width: 90px;
                height: 90px;
            }
            .li {
                display:inline-block;
                float: left;
            border-right: 1px solid #bbb;
        }
        .ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            }
            .li:last-child {
                border-right: none;
            }
            </style>

    </head>
    <body class="antialiased">
        <a id="top"></a>
        <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <div class="navbar navbar-expand-lg">
                <h4 style="color:#ffcc80;text-align:center;text-indent: 120px;"><i>Your local comfort</i> </h4>
                <a href="/user/menu" class="logo-link"> 
                    <img src="/image/Logo_Kopitiam.png" class="logo-img pull-left" alt="Cashieristic Logo" >
                </a>
                <div class="collapse navbar-collapse ml-2" id="navbarNav"></div>
                <a href="{{ route('item_Cart') }}" style = align="right"> Shopping Cart <i class="fas fa-shopping-cart"></i>
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
                </i></a>
                </i></a>
            </div>

            <div style="margin-top:70px; padding:0px 50px">
                @if (session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif
            
                @if ($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $message)
                        <li> {{ $message }} <br> </li> @endforeach
                    </ul>
                </div> 
                @endif

                <div class="container-fluid
        w3-sidebar w3-bar-block" id="sidebar-wrapper">
    @yield('content')
    </div>

    <div class="container" style="margin-left:25%">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="page-content-wrapper">
                @yield('content1')
            </main>
        </div>
    </div>
    </div>
    </div>
    </body>

</html>
