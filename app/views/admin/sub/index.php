<div class="admin-content-inner"> 
    <?php Flasher::flash(); ?>
    <div class="uk-flex-inline uk-flex-middle"> 
        <i class="fas fa-user icon-large uk-margin-right"></i> 
        <h4 class="uk-margin-remove"> Sub </h4> 
        <button class="uk-button uk-button-success uk-margin-medium-left admin-btn" href="#create-model" uk-tooltip="title: Create New User ; delay: 500 ; pos: top ;animation: uk-animation-scale-up" uk-toggle> 
            <i class="fas fa-user-plus"></i> tambah baru 
        </button>                     
        <!-- model -->                     
        <div id="create-model" uk-modal> 
            <div class="uk-modal-dialog"> 
                <button class="uk-modal-close-default uk-padding-small" type="button" uk-close></button>                             
                <div class="uk-modal-header"> 
                    <h4> Tambah sub baru   </h4> 
                </div>                             
                <div class="uk-modal-body"> 
                    <div uk-grid>                                    
                        <div class="uk-width-2-1@m"> 
                            <form method="POST" action="<?php echo BASEURL ?>/admin/tambahSub">
                                <div class="uk-margin">
                                    <label> Bab </label>   
                                    <select required="" class="uk-select" name="id_bab">
                                        <?php foreach ($data['bab'] as $sub): ?>
                                        <option value="<?php echo $sub['id_bab'] ?>"><?php echo $sub['nama_bab'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="uk-margin"> 
                                    <label> Judul Sub Bab </label>    
                                    <input required="" name="judul_sub" class="uk-input uk-form-width-large" placeholder="Judul Sub" type="text"> 
                                </div>   
                                <div class="uk-margin"> 
                                    <label> Isi Sub Bab </label>  
                                    <textarea class="uk-textarea" name="isi_sub" required="" placeholder="Isi sub bab"></textarea>
                                </div>             
                        </div>                                     
                    </div>                                 
                </div>                             
                <div class="uk-modal-footer uk-text-right"> 
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Batal</button>                                 
                    <button class="uk-button uk-button-primary" type="submit" name="simpan">Simpan</button>                                 
                </div>      

                </form>                       
            </div>                         
        </div>                     
    </div>                 
    <div class="uk-background-default uk-margin-top uk-padding"> 
        <div uk-grid> 
            <div class="uk-width-expand@m"> 
                <form class=" uk-flex-inline uk-flex-middle uk-text-small"> 
                    <p class="uk-margin-remove-bottom uk-margin-right"> Show entries :  </p> 
                    <select class="uk-select uk-width-small" id="form-horizontal-select"> 
                        <option>10 page </option>                                     
                        <option>20 page </option>                                     
                        <option>30 page </option>                                     
                        <option>50 page </option>                                     
                    </select>                                 
                </form>                             
            </div>                         
            <div class="uk-width-auto@m uk-text-small"> 
                <form method="post" action="cariSub"> 
                    <input name="keyword" class="uk-input uk-form-width-medium" type="text" placeholder="Cari sub bab"> 
                    <button class="uk-button uk-button-grey admin-btn" type="submit">Cari</button>                          
                </form>                           
            </div>                         
        </div>                     
    </div>                 
    <div class="uk-overflow-auto"> 
        <div class="uk-background-default uk-position-relative uk-box-shadow-medium"> 
            <hr class="uk-margin-remove"> 
            <?php foreach ($data['sub'] as $sub): ?>
                <div class="uk-padding-small " style="padding-left: 50px; padding-right: 50px;" uk-grid>              
                    <div class="uk-width-expand"> 
                        <div class="uk-align-right"> 
                            <a class="el-content uk-button uk-button-success uk-circle" href="<?php echo BASEURL ?>/admin/editSub/<?php echo $sub['id_sub'] ?>"> <i class="fas fa-check"></i> Edit </a> 
                            <a class="el-content uk-button uk-button-danger uk-circle" href="<?php echo BASEURL ?>/admin/hapusSub/<?php echo $sub['id_sub'] ?>"> <i class="fas fa-times"></i>  Hapus  </a> 
                        </div>                             
                        <h3 class="uk-margin-top "> <?php echo $sub['judul_sub'] ?> </h3> 
                        <h5 class="uk-margin-remove"> Kelas : <?php echo $sub['jenjang_kelas'] ?> &nbsp;|&nbsp;
                        Bab : <?php echo $sub['nama_bab'] ?> </h5>  
                        <h5 class="uk-margin-small uk-text-muted"> Isi Sub Bab</h5> 
                        <p> <?php echo $sub['isi_sub'] ?> </p> 
                    </div>                         
                </div>                    
                <hr>     
            <?php endforeach ?>             
        </div>                  
        </div>                 
        <div class="uk-padding uk-background-default"> 
            <ul class="uk-pagination uk-flex-center uk-margin-medium"> 
                <li class="uk-active"> 
                    <span>1</span> 
                </li>                         
                <li> 
                    <a href="#">2</a> 
                </li>                         
                <li> 
                    <a href="#">3</a> 
                </li>                         
                <li> 
                    <a href="#">4</a> 
                </li>                         
                <li> 
                    <a href="#">5</a> 
                </li>                         
                <li> 
                    <a href="#"><i class="fas fa-ellipsis-h uk-margin-small-top"></i></a> 
                </li>                         
                <li> 
                    <a href="#">12</a> 
                </li>                         
            </ul>                     
            <p>  You are showing 1 to 12 entries</p> 
        </div>                     
    </div>            
</div>