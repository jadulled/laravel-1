
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>

    </section>
    <section class="content">

            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
            </div>

            @yield('content')
    </section>
</div>