<header class="main-header">

    <a href="{{ route('admin.index') }}" class="logo"><b>{{-- LOGO --}}</b></a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            @include('backend.template.header.user')

        </ul>
      </div>

    </nav>
</header>