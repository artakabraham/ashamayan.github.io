<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg" style="width:95%; height:95%;">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Media Gallery</h4>
         </div>
         <div class="modal-body">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
               <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Gallery</a></li>
                  <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Upload</a></li> -->
               </ul>
               <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                     <div class="row">
                        <div class="col-md-12 pre-scrollable">
                           <div class="x_panel">
                              <div class="x_title">
                                 <h2>Select folder</h2>
                                 <div class="form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                       <select class="form-control" onChange="getImagesByDate(this.value)">
                                           <option>Select folder</option>
                                          <?php foreach($imgFolders as $folder):?>
                                          <option value="<?=$folder['value']?>"><?=$folder['name']?></option>
                                          <?php endforeach;?>																	
                                       </select>                                       
                                    </div>
                                     <span id="loading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></span>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                 <div class="row" id="hint"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                     <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                        booth letterpress, commodo enim craft beer mlkshk aliquip
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>