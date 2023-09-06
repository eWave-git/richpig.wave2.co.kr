<?php
    $user_info = get_davice($_SESSION['user_id']);

?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="../conf/alarmSetupAction.php" method="post">

                    <input type="hidden" name="member_id" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" class="form-control float-right" name="address" value="<?php echo $user_info['address'];?>">
                    <input type="hidden" class="form-control float-right" name="board_type" value="<?php echo $user_info['board_type'];?>">
                    <input type="hidden" class="form-control float-right" name="board_number" value="<?php echo $user_info['board_number'];?>">
                    <input type="hidden" class="form-control float-right" name="data_channel" value="<?php echo $user_info['data_type'];?>">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">알람 설정</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">
                                    <?php
                                        $query = "select * from `system_data` where member_id = '{$_SESSION['user_id']}'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        $row['push_use_YN'] = $row['push_use_YN'] ?? 'N';
                                        $mode = $row['member_id'] ? 'update':'create';
                                    ?>
                                    <input type="hidden" name="system_data_mode" value="<?=$mode?>">
                                    <div class="form-group">
                                        <label for="inputSubject">push 사용유무</label>
                                        <div class="row col-10">
                                            <select class="form-control float-right" name="push_use_YN">
                                                <option value="Y" <?php echo ($row['push_use_YN'] == 'Y') ? "selected" : '';?> >사용</option>
                                                <option value="N" <?php echo ($row['push_use_YN'] == 'N') ? "selected" : '';?> >미사용</option>
                                            </select>

                                        </div>
                                    </div>
                                    <input type="hidden" name="target_user" value="<?php echo $_SESSION['user_id'];?>">
                                    <div class="form-group">
                                        <label for="inputName">설정 범위</label>
                                        <div class="row col-12">
                                            <input type="text" class="form-control float-left col-5" name="min">
                                            <div class="float-left">&nbsp; ~ &nbsp;</div>
                                            <input type="text" class="form-control float-left col-5" name="max">
                                        </div>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">알람 설정 내역</h3>
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
                                $query = mysqli_query($conn, "SELECT * FROM issue_data where member_id = '{$_SESSION['user_id']}' order by idx desc");
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