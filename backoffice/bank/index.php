<?php 

    require(dirname(__FILE__).'/../check.php');

?>

<!doctype html>

<html lang="en" dir="ltr">



<head>

    <?php 

    require(dirname(__FILE__).'/../template/head.php');

?>



    <!-- Custom scroll bar css-->

    <link href="/office69/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />



    <!-- Horizontal-menu css -->

    <link href="/office69/assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">

    <link href="/office69/assets/plugins/horizontal-menu/dark-horizontalmenu.css" rel="stylesheet">





    <!-- Sidebar Accordions css -->

    <link href="/office69/assets/plugins/accordion1/css/dark-easy-responsive-tabs.css" rel="stylesheet">



    <!-- Data table css -->

    <link href="/office69/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <link href="/office69/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />









<body class="app sidebar-mini rtl">







    <div class="page">

        <div class="page-main">

            <?php 

            require(dirname(__FILE__).'/../template/menuside.php');

            ?>



            <!-- app-content-->

            <div class="container content-area">

                <div class="side-app">



                    <!-- page-header -->

                    <div class="page-header">

                        <ol class="breadcrumb">

                            <!-- breadcrumb -->

                            <li class="breadcrumb-item">Home</li>

                            <li class="breadcrumb-item active" aria-current="page">Bank</li>

                        </ol><!-- End breadcrumb -->

                    </div>

                    <!-- End page-header -->

                    <!-- row -->

                    <div class="row">

                        <div class="col-md-12 col-lg-12">

                            <div class="card">

                                <div class="card-header border-0">

                                    <h3 class="card-title">รายการ ธนาคาร</h3>

                                </div>

                                <div class="table-responsive">

                                    <table class="table card-table table-vcenter text-nowrap">

                                        <thead>

                                            <tr>

                                                <th>ID</th>

                                                <th>FOR</th>

                                                <th>Name</th>

                                                <th>Number</th>

                                                <th></th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php

                                            require(dirname(__FILE__).'/../class/database.php');

                                            $mysqli = new DB();

                                            $data = $mysqli->query("SELECT * FROM `slot_bank`")->fetchAll();

													foreach($data as $result){

														echo '<tr>';

														echo '<td>'.$result['bank_id'].'</td>';

														echo '<td>'.$result['bank_for'].'</td>';

														echo '<td>'.$result['bank_fullname'].'</td>';

                                                        echo '<td>'.$result['bank_number'].'</td>';
                                                        if(strpos($result['bank_for'],'BAY') !== false){
                                                        echo '<td>
                                                            <a class="btn btn-sm btn-gray" href="list_bay?id=1">
                                                                <i class="fa fa-list"></i> รายการเดินบัญชี
                                                            </a></td>';
                                                        }else{
                                                            echo '<td>
                                                            <a class="btn btn-sm btn-gray" href="list?id='.$result['bank_id'].'">
                                                                <i class="fa fa-list"></i> รายการเดินบัญชี

                                                            </a></td>';
                                                        }

                                                        $status = $result['bank_show']==0?'':'checked';

                                                        echo '<td>แสดงหน้าเว็บ <label class="custom-switch">

                                                        <input type="checkbox" '.$status.' onchange="set_show_bank(this,'.$result['bank_id'].')" class="custom-switch-input">

                                                        <span class="custom-switch-indicator"></span>

                                                        </label></td>';

                                                        $status_run = $result['bank_run']==0?'':'checked';

                                                        echo '<td>ดึงยอดธนาคาร <label class="custom-switch">

                                                        <input type="checkbox" '.$status_run.' onchange="set_run_scb(this,'.$result['bank_id'].')" class="custom-switch-input">

                                                        <span class="custom-switch-indicator"></span>

                                                        </label></td>';
														echo '</tr>';

													}

												?>

                                        </tbody>

                                    </table>

                                </div>

                                <!-- table-responsive -->

                            </div>

                        </div><!-- col end -->

                    </div>

                   



                </div>

                <!--End side app-->

            </div>

            <!-- End app-content-->

            <?php 

        	require(dirname(__FILE__).'/../template/footer.php');

    	?>



        </div>

    </div>

    <!-- End Page -->



    <!-- Back to top -->

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



    <?php 

        	require(dirname(__FILE__).'/../template/js.php');

    	?>



    <!-- Horizontal-menu js -->

    <script src="/office69/assets/plugins/horizontal-menu/horizontalmenu.js"></script>



    <!-- Sidebar Accordions js -->

    <script src="/office69/assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>



    <!-- Custom scroll bar js-->

    <script src="/office69/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>



    <!-- Custom js-->

    <script src="/office69/assets/js-dark/custom.js"></script>



    <!-- Data tables js-->

    <script src="/office69/assets/plugins/datatable/jquery.dataTables.min.js"></script>

    <script src="/office69/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

    <script src="/office69/assets/plugins/datatable/datatable.js"></script>

    <script src="/office69/assets/plugins/datatable/dataTables.responsive.min.js"></script>


    <script>

        var set_show_bank = (check, id) => {

            $.post('api/state.php', {

                state: check.checked,

                id: id

            });

        }

        var set_show_kbank = (check, id) => {

            $.post('api/state_kbank.php', {

                state: check.checked,

                id: id

            });

        }

        var set_run_kbank = (check, id) => {

            $.post('api/run_kbank.php', {

                state: check.checked,

                id: id

            });

        }

        var set_run_scb = (check, id) => {

        $.post('api/run_scb.php', {

            state: check.checked,

            id: id

            });

        }

    </script>




</body>



</html>