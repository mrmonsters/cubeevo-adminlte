<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- CKEditor -->
<script type="text/javascript" src="{{ asset('/plugins/ckeditor/ckeditor.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/plugins/ckeditor/config.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/ckeditor/lang/en.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/ckeditor/styles.js') }}"></script>
<!-- jQuery Data Table -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap Color Picker -->
<script type="text/javascript" src="{{ asset('/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- jQuery Lazy Load-->
<script type="text/javascript" src="{{ asset('/js/jquery.lazyload.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.scrollstop.js') }}"></script>
<!-- Addon Scripts -->
@yield('addon-script')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->