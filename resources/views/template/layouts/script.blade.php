
    <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/sbadmin2/js/sb-admin-2.min.js"></script>
    <script src="/sbadmin2/vendor/chart.js/Chart.min.js"></script>
    <script src="/sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="/sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script src="/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/sbadmin2/js/demo/datatables-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#checkedAll").change(function(){
                if(this.checked){
                $(".checkSingle").each(function(){
                    this.checked=true;
                })
                }else{
                $(".checkSingle").each(function(){
                    this.checked=false;
             })
            }
        });

        $(".checkSingle").click(function () {
            if ($(this).is(":checked")){
            var isAllChecked = 0;
            $(".checkSingle").each(function(){
                if(!this.checked)
                isAllChecked = 1;
            })
            if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
            } else {
            $("#checkedAll").prop("checked", false);
            }
        });
        });
    </script>
