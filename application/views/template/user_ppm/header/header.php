<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nex-Desk : Form PPM</title>

    <!-- Bootstrap -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?= base_url()?>asset_template/beauty/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
  
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?= base_url()?>asset_template/beauty/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?= base_url()?>asset_admin/dist/css/AdminLTE.min.css">


        <!-- jQuery 3 -->
        <script src="<?= base_url()?>asset_admin/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="<?= base_url()?>asset_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?= base_url()?>asset_admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url()?>asset_admin/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url()?>asset_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="<?= base_url()?>asset_admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url()?>asset_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="<?= base_url()?>asset_admin/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url()?>asset_admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url()?>asset_admin/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url()?>asset_admin/dist/js/demo.js"></script>
        <!-- Page script -->

        <script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.js"></script>
        <script src="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.full.min.js"></script>
        <link rel="stylesheet" href="<?= base_url()?>asset_admin/datepicker/jquery.datetimepicker.min.css">

        <link href="<?= base_url()?>asset_template/beauty/plugins/jquery-ricksaw-chart/css/rickshaw.css" rel="stylesheet">


        

        <!-- <script src="<?= base_url()?>asset_template/beauty/js/demo/dashboard-v2.js"></script> -->

        
        <script src="<?= base_url()?>asset_template/beauty/js/scripts.js"></script>

        <script src="<?= base_url()?>asset_template/beauty/plugins/screenfull/screenfull.js"></script>

    
  </head>
  <body>



  <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Date picker
        $('.datepicker').datepicker({
          autoclose: true,
          format: 'dd/mm/yyyy'
        })

        $('#datepicker').datepicker({
          autoclose: true,
          format: 'dd/mm/yyyy'
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })

        $(".time").datetimepicker({
          format: 'H:i:s',
          pickDate: false,
          datepicker: false,
        });

        $(".datetime").datetimepicker({
          format: 'Y-m-d H:i:s'

        });

        $(".datereport").datetimepicker({
          format: 'dd/mm/yyyy'

        });

      });
  </script>