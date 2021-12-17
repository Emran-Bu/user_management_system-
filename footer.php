    
    <!-- Jquery link -->
    <script src="assets/js/jqueryPlugin/jquery-3.5.1.min.js"></script>

    <!-- bootstrap js links -->
    <script type="text/javascript" src="assets/js/bootstrap-5/bootstrap.bundle.min.js"></script>

    <!-- data tables js link -->
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

    <!-- custom script  -->
    <script type="text/javascript">
      // tooltip js
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });

      // data tables js
      $(document).ready( function () {
        $('table').DataTable();
      });
    </script>
    
</body>
</html>