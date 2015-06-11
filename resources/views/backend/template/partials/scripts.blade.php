<script src="{{ asset('backend/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('backend/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src='{{ asset('backend/plugins/fastclick/fastclick.min.js') }}'></script>
<script src="{{ asset('backend/dist/js/app.min.js') }}" type="text/javascript"></script>
<script>
    $('#flash-overlay-modal').modal();
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
</script>
<script type="text/javascript" src="{{ asset('backend/tinymce/js/tinymce/tinymce.min.js') }}"></script>

