<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        @include('backend.template.partials.styles')

        @yield('style')

    </head>

    <body class="skin-blue">

        <div class="wrapper">

            @include('backend.template.header.header')
            @include('backend.template.aside.aside')
            @include('backend.template.content.content')
            @include('backend.template.footer')

        </div>

        @include('backend.template.partials.scripts')

        @yield('scripts')

  </body>
</html>