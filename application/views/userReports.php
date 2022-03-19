<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Reports - Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Report</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-inline" action="#" id="report_cus_form">
                            <div class="form-group">
                                <label for="user_id">Customer List</label>

                                <div class="col-9 col-lg-10">
                                    <select class="form-control" id="user_id" style="width: 100%;">
                                        <option value="" selected="selected">Choose</option>
                                        <?php
                                        foreach ($userList as $row) {
                                        ?>
                                        <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left: 10px;">
                                <label for="fromdate">Status</label>
                                <select class="form-control" id="status" required>
                                    <option value="2">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="button" class="btn btn-info" onclick="fetchReport()">Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        Report Table
                    </div>
                    <div class="panel-body" id="printableArea">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody id="postsList">
                                    <tr>
                                        <td style="text-align:center;" colspan="5">Search Report</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->

            </div>
        </div>
        <!-- /. ROW  -->



    </div>
    <footer>
        <p>All right reserved.</p>
    </footer>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="<?= base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="<?= base_url(); ?>assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="<?= base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>


<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/js/custom-scripts.js"></script>
<script>
function fetchReport() {
    var user_id = $('#user_id').val();
    var status = $('#status').val();
    if (user_id == "") {
        toastpopup("Select User");
        return false;
    }
    $.ajax({
        url: "<?= base_url('Home/fetchReport')  ?>",
        method: "POST",
        data: {
            user_id: user_id,
            status: status
        },
        success: function(d) {

            console.log(d);
            $('#postsList').html(d);
        }
    });
}
</script>

</body>

</html>