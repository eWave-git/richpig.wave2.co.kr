
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form action="../conf/alarmAction.php" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">경보 설정</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>적정범위</th>
                                    <th>ADDRESS</th>
                                    <th>Board_type</th>
                                    <th>Board_number</th>
                                    <th>채널</th>
                                </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control float-left col-5" name="min">
                                            <div class="float-left">&nbsp; ~ &nbsp;</div>
                                            <input type="text" class="form-control float-left col-5" name="max">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control float-right"  name="address">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control float-right"  name="board_type">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control float-right"  name="board_number">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control float-right"  name="data_channel">
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <button type="submit" class="btn btn-default" >
                            저장
                        </button>
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->




<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {

    });
</script>