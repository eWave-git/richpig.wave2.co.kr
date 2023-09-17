<?php
$user_info = get_davice($_SESSION['user_id']);

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="../conf/temperatureAction.php" method="post">
                    <input type="hidden" name="mode" value="create">
                    <input type="hidden" class="form-control float-right" name="address" value="<?php echo $user_info['address'];?>">
                    <input type="hidden" class="form-control float-right" name="board_type" value="<?php echo $user_info['board_type'];?>">
                    <input type="hidden" class="form-control float-right" name="board_number" value="<?php echo $user_info['board_number'];?>">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">온도 설정</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="card-body row">
                                <div class="col-12">

                                    <div class="form-group">
                                        <label for="inputSubject">설정온도</label>
                                        <select class="form-control float-right" name="temperature">
                                            <option value="11">11</option>
                                            <option value="12">12</option>    
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17" selected >17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <?php if ($_SESSION['user_id'] == "savebox1" || $_SESSION['user_id'] == "savebox2") { ?>
                            <button type="button" class="btn btn-primary" onclick="javascript:alert('온도설정을 할 수 없습니다.')" >저장</button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary" >저장</button>
                        <?php } ?>
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