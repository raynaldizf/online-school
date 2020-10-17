<div class="admin-content-inner"> 
    <?php Flasher::flash(); ?>
    <div class="uk-card-small uk-card-default"> 
        <div class="uk-card-header uk-text-bold">
            <i class="fas fa-user uk-margin-small-right"></i> Ubah data <?php echo $data['sub']['judul_sub'] ?>
        </div>                     
        <div class="uk-card-body "> 
            <div uk-grid>                           
                <div class="uk-width-1-1@m"> 
                    <form class="uk-grid-small" uk-grid method="post" action="<?php echo BASEURL ?>/admin/prosesEditSub/">
                        <input type="hidden" value="<?php echo $data['sub']['id_sub'] ?>" name="id_sub">              
                        <div class="uk-width-1-2">
                            <label> Bab </label>   
                            <select required="" class="uk-select" name="id_bab">
                                <option selected="" value="<?php echo $data['sub']['id_bab'] ?>"><?php echo $data['sub']['nama_bab'] ?></option>
                                <?php foreach ($data['bab'] as $sub): ?>
                                <option value="<?php echo $sub['id_bab'] ?>"><?php echo $sub['nama_bab'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>              
                        <div class="uk-width-1-2"> 
                            <label> Judul Sub Bab </label>                                                 
                            <input class="uk-input" name="judul_sub" required="" placeholder="Judul Sub Bab" value="<?php echo $data['sub']['judul_sub'] ?>">
                        </div>                 
                        <div class="uk-width-1-1"> 
                            <label> Isi Sub </label>                                                 
                            <textarea class="uk-textarea" name="isi_sub" required="" placeholder="Isi sub"><?php echo $data['sub']['isi_sub'] ?></textarea>
                        </div>                                 
                </div>                             
            </div>                         
        </div>                     
    </div><br>
    <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" type="submit" name="simpan">Simpan</button>

    </form>                   
</div>