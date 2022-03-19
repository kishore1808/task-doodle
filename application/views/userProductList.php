
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Product List  - <?= $this->session->userdata('login_name') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Product List
</li>
        </ol>

    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                <tbody>
                                    <?php
                                    if(!empty($productList)){
                                        $i = 1;
                                        foreach($productList as $val){
                                            ?>
                                          <tr class="odd gradeX">
                                            <td><?= $i++; ?></td>
                                            <td><?= $val['product_name']; ?></td>
                                            <td><?= $val['code']; ?></td>
                                            <td><img src="<?= base_url($val['image']); ?>" width="50" height="50"></td>
                                            <td><?= $val['price']; ?></td>
                                            <td class="center"><label class="label label-<?= $val['status']==1?'success':'danger'; ?>" > <?= $val['status']==1?'active':'inactive'; ?> </label></td>
                                          
                                            <!-- <button class="btn btn-danger btnDelete"  ><i class="fa fa-trash"></i> </button></td> -->
                                        </tr>   
                                            
                                            <?php
                                        }
                                    }
                                    
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->


        <!-- /. ROW  -->

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


<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/js/custom-scripts.js"></script>

</body>

</html>