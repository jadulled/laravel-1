              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset( Auth::user()->present()->photo ) }}" class="user-image" alt="{{ Auth::user()->name }}"/>
                  <span class="hidden-xs"> {{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">

                  <li class="user-header">
                    <img src="{{ asset( Auth::user()->present()->photo ) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                    <p>
                      {!! Auth::user()->present()->fullName !!}
                      <small>Administrador</small>
                    </p>
                  </li>


                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ route('admin.users.edit', Auth::User()->slug) }}" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ asset('/auth/logout/') }}" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
