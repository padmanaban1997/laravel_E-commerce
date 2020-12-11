<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 30 Oct 2017 06:57:21 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Metro Lab</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/bootstrap/css/bootstrap-fileupload.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
   <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
   <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
   <link href="{{ asset('css/style-default.css') }}" rel="stylesheet" id="style_color" />
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/uniform/css/uniform.default.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/data-tables/DT_bootstrap.css') }}" />
    
    
    
  

    <link href="{{ asset('assets/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/uniform/css/uniform.default.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/chosen-bootstrap/chosen/chosen.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/jquery-tags-input/jquery.tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clockface/css/clockface.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-datepicker/css/datepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-timepicker/compiled/timepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-colorpicker/css/colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('../../code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css') }}" />



 
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
@include('layouts.backend.header')

@include('layouts.backend.sidebar')


@yield('content')

@include('layouts.backend.footer')
   <!-- END HEADER -->
 
 
 <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
   <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
   <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
   <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap-fileupload.js') }}"></script>
   <script src="{{ asset('js/jquery.blockui.js') }}"></script>

   <script src="{{ asset('../../code.jquery.com/ui/1.10.3/jquery-ui.js') }}"></script>
   <script src="{{ asset('js/jQuery.dualListBox-1.3.js') }}" language="javascript" type="text/javascript"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="{{ asset('assets/uniform/jquery.uniform.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/data-tables/jquery.dataTables.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/data-tables/DT_bootstrap.js') }}"></script>
   <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

   <script type="text/javascript" src="{{ asset('assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/chosen-bootstrap/chosen/chosen.jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/uniform/jquery.uniform.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/clockface/js/clockface.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-daterangepicker/date.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
   <script src="{{ asset('assets/fancybox/source/jquery.fancybox.pack.js') }}"></script>
  



   <!--common script for all pages-->
   <script src="{{ asset('js/common-scripts.js') }}"></script>

   <!--script for this page only-->
   <script src="{{ asset('js/editable-table.js') }}"></script>

   <!-- END JAVASCRIPTS -->
   <script>
       jQuery(document).ready(function() {
           EditableTable.init();
       });
   </script>


<script src="{{ asset('js/form-validation-script.js') }}"></script>

  
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 30 Oct 2017 06:57:50 GMT -->
</html>