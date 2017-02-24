<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once ("../../template/head.php");
    ?>
    <title>Friends' Circle</title>
    <link rel="stylesheet" href="../../css/table.css">
    <style>
        .bootstrap-table .table, .bootstrap-table .table > tbody > tr > th, .bootstrap-table .table > tfoot > tr > th, .bootstrap-table .table > thead > tr > td, .bootstrap-table .table > tbody > tr > td, .bootstrap-table .table > tfoot > tr > td {
            padding: 8px !important;
        }
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 12px 11px;
            vertical-align: middle;
        }
        .table thead tr > th, .table thead tr > td, .table tbody tr > th, .table tbody tr > td, .table tfoot tr > th, .table tfoot tr > td {
            border-top: 1px solid #CCC5B9;
        }
        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }
        .table th, .table td {
            vertical-align: middle;
            box-sizing: border-box;
        }
        td, th {
            display: table-cell;
            vertical-align: inherit;
        }
        .bootstrap-table .table {
            margin-bottom: 0 !important;
            border-bottom: 1px solid #cfcfca;
            border-collapse: collapse !important;
            border-radius: 1px;
        }

    </style>
</head>
<body>
<div class="wrapper">
    <?php
        require_once ("../../template/sidebar.php");
    ?>

    <div class="main-panel">
        <div class="header" style="position:relative; margin:7% 0% -4% 0.5%;">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <h3 class="title" style="margin-top: 1%;" align="center">
                                Ranking in Friends' Circle
                            </h3>
                            <label class="radio">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Today
                            </label>

                            <label class="radio">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                This Week
                            </label>
                            <label class="radio">
                                <input type="radio" data-toggle="radio" name="optionRadios" value=""/>
                                Total
                            </label>
                            <div class="content">
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                    <th data-field="rank" class="text-center">Rank</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-file="distance" data-sortable="true">Distance(km)</th>
                                    <th data-field="Time" data-sortable="true">Time(hour)</th>
                                    <th data-field="step" data-sortable="true">Step</th>
                                    <th data-field="Calorie" data-sortable="true">Calorie</th>
                                    <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>10</td>
                                        <td>2.5</td>
                                        <td>2205</td>
                                        <td>25</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>
</div>
<?php
    require_once ("../../template/foot.php");
?>
<!--Table plugins-->
<script src="../../js/bootstrap-table.js"></script>
<script src="../../js/table.js"></script>
<script src="../../WebContent/js/sidebar.js"></script>
</body>
</html>