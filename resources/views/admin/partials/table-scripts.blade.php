<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['csv', 'pdf']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>
<script type="text/javascript">
    $('#datatable').DataTable({
           "ordering": false
           });
  </script> 
