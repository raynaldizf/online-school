<div class="admin-content-inner"> 
    <?php Flasher::flash(); ?>
    <div class="uk-card-small uk-card-default"> 
        <div class="uk-card-header uk-text-bold">
            <i class="fas fa-user uk-margin-small-right"></i> Ubah data <?php echo $data['kelas']['jenjang_kelas'] ?>
        </div>                     
        <div class="uk-card-body "> 
            <div uk-grid>                           
                <div class="uk-width-1-1@m"> 
                    <form class="uk-grid-small" uk-grid method="post" action="<?php echo BASEURL ?>/admin/prosesEditKelas/">
                        <input type="hidden" value="<?php echo $data['kelas']['id_kelas'] ?>" name="id_kelas">
                        <div class="uk-width-1-1"> 
                            <label> Jenjang Kelas </label>                                                 
                            <input class="uk-input" name="jenjang_kelas" required="" placeholder="jenjang kelas" value="<?php echo $data['kelas']['jenjang_kelas'] ?>">
                        </div>                 
                        <div class="uk-width-1-1"> 
                            <label> Deskripsi Kelas </label>                                                 
                            <textarea class="uk-textarea" name="deskripsi_kelas" required="" placeholder="Deskripsi kelas"><?php echo $data['kelas']['deskripsi_kelas'] ?></textarea>
                        </div>                                 
                </div>                             
            </div>                         
        </div>                     
    </div><br>
    <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" type="submit" name="simpan">Simpan</button>

    </form>                   
</div>