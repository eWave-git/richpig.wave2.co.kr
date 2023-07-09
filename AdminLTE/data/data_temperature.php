
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="../conf/temperatureAction.php" method="post">
                    <input type="hidden" name="mode" value="create">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">온도 설정</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputEmail">장치번호</label>
                                        <input type="text" class="form-control float-right" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">타입</label>
                                        <input type="text" class="form-control float-right" name="board_type">
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="inputMessage">Board_number(board_number)</label>-->
<!--                                        <input type="text" class="form-control float-right" name="board_number">-->
<!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="inputSubject">설정온도</label>
                                        <input type="text" class="form-control float-right" name="temperature">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" >
                            저장
                        </button>
                    </div>
                </form>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->




<script src="plugins/jquery/jquery.min.js"></script>
<script>

    $(function () {

    });
</script>