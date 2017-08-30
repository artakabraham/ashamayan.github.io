<div class="row">
    <form class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <? if (isset($success)) { echo $success; } ?>                    
                <? if (isset($error)) { for ($i = 0; $i < count($error); $i++) { echo $error; } } ?>
                <div class="page-title">
                    <input type="text" id="subject" name="subject" value="" placeholder="Subject" class="form-control">
                </div>
                <div class="clearfix"></div>
                <textarea name="editor1" id="editor1"></textarea>
                <br />
                <div class="ln_solid"></div>
                <div onclick="messageSend()" class="btn btn-primary">Send</div>
            </div>
        </div>
    </form>
</div>
