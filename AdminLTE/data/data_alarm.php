
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="../conf/alarmAction.php" method="post">
                    <input type="hidden" name="mode" value="create">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">경보 설정</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputName">설정 범위</label>
                                        <div class="row">
                                            <input type="text" class="form-control float-left col-5" name="min">
                                            <div class="float-left">&nbsp; ~ &nbsp;</div>
                                            <input type="text" class="form-control float-left col-5" name="max">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">현장 번호(address)</label>
                                        <input type="text" class="form-control float-right" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">장치 타입(board_type)</label>
                                        <input type="text" class="form-control float-right" name="board_type">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Board_number(board_number)</label>
                                        <input type="text" class="form-control float-right" name="board_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">데이터 명(data)</label>
                                        <input type="text" class="form-control float-right" name="data_channel">
                                    </div>
                                    <input type="hidden" name="target_user" value="<?php echo $_SESSION['user_id'];?>">

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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">경보 내역</h3>
                    </div>
                    <div class="card-body">
                        <div style="overflow-y:scroll">
                            <table class="table table-bordered table-striped" style="white-space: nowrap">
                                <colgroup>
                                    <col width="5%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="5%">
                                    <col width="5%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>순번</th>
                                    <th>적정범위</th>
                                    <th>ADDRESS</th>
                                    <th>Board_type</th>
                                    <th>Board_number</th>
                                    <th>채널</th>
                                    <th>target_user</th>
                                    <th>삭제</th>
                                </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM issue_data order by idx desc");
                                while($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['idx']; ?></td>
                                        <td><?php echo $row['min']; ?> ~ <?php echo $row['max']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['board_type']; ?></td>
                                        <td><?php echo $row['board_number']; ?></td>
                                        <td><?php echo $row['data_channel']; ?></td>
                                        <td><?php echo $row['target_user']; ?></td>
                                        <td>
                                            <a  href="../../conf/alarmAction.php?mode=delete&idx=<?php echo $row['idx']; ?>"><button type="button" class="btn btn-sm btn-primary" style="user-select: auto;" data-idx="<?php echo $row['idx'];?>" >삭제</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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