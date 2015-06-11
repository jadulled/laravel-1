 <div class="user-panel">
<div class="pull-left image">
  <img src="{{ asset( Auth::user()->present()->photo ) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
</div>
<div class="pull-left info">
  <p>{!! Auth::User()->name !!}</p>

  <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
</div>
</div>