<div class="row">
    <form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="page-title">
                    <input type="text" name="subject" value="<?= $mail['title'] ?>" placeholder="Subject" class="form-control" readonly>
                </div>
                <div class="clearfix"></div>
                <textarea name="editor1" id="editor1" readonly><?= $mail['content'] ?></textarea>
                <br />
                <div class="ln_solid"></div>
            </div>
        </div>
    </form>
</div>
