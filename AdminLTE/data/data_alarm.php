
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
                            <div class="card-body row">
                                <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputName">적정범위</label>
                                            <div class="row">
                                            <input type="text" class="form-control float-left col-5" name="min">
                                            <div class="float-left">&nbsp; ~ &nbsp;</div>
                                            <input type="text" class="form-control float-left col-5" name="max">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">ADDRESS</label>
                                            <input type="text" class="form-control float-right"  name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">Board_type</label>
                                            <input type="text" class="form-control float-right"  name="board_type">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputMessage">Board_number</label>
                                            <input type="text" class="form-control float-right"  name="board_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSubject">채널</label>
                                            <input type="text" class="form-control float-right"  name="data_channel">
                                        </div>
                                    </div>
                                </div>
                            </div>

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