
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="../conf/pushAction.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">경보 설정</h3>
                        </div>

                        <div class="card-body table-responsive">

                            <div class="card-body row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputName">푸쉬 타이틀</label>
                                        <input type="text" class="form-control float-right"  name="push_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">푸쉬 내용</label>
                                        <textarea class="form-control float-right"  name="push_content">

                                        </textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">이동 URL</label>
                                        <input type="text" class="form-control float-right"  name="push_url" placeholder="서비스 도메인 아니면 외부 웹브라우져로 열림"  >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">이미지 URL</label>
                                        <input type="text" class="form-control float-right"  name="img_url" placeholder="https로 시작하는 url이여야함" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">수신대상자</label>
                                        <div class="form-check" style="user-select: auto;">
                                            <input class="form-check-input" type="radio" name="push_target" value="All" checked=""  style="user-select: auto;">
                                            <label class="form-check-label" style="user-select: auto;">전체</label>
                                        </div>
                                        <div class="form-check" style="user-select: auto;">
                                            <input class="form-check-input" type="radio" name="push_target" value="Individual" style="user-select: auto;" disabled>
                                            <label class="form-check-label" style="user-select: auto;">특정대상자</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject">대상자 Pushid</label>
                                        <input type="text" class="form-control float-right"  name="push_id" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default" >
                            보내기
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