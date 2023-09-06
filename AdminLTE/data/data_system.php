
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                $query = "select * from `system_data` where member_id = '{$_SESSION['user_id']}'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
                $row['push_use_YN'] = $row['push_use_YN'] ?? 'N';
                $mode = $row['member_id'] ? 'update':'create';
                ?>
                <form action="../conf/systemAction.php" method="post">
                    <input type="hidden" name="mode" value="<?=$mode?>">
                    <input type="hidden" name="member_id" value="<?=$_SESSION['user_id']?>">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">시스템 설정</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputSubject">push 사용유무</label>
                                        <select class="form-control float-right" name="push_use_YN">
                                            <option value="Y" <?php echo ($row['push_use_YN'] == 'Y') ? "selected" : '';?> >사용</option>
                                            <option value="N" <?php echo ($row['push_use_YN'] == 'N') ? "selected" : '';?> >미사용</option>
                                        </select>
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