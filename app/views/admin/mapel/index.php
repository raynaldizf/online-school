<div class="admin-content-inner"> 
    <?php Flasher::flash(); ?>
    <div class="uk-flex-inline uk-flex-middle"> 
        <i class="fas fa-user icon-large uk-margin-right"></i> 
        <h4 class="uk-margin-remove"> Mapel </h4> 
        <button class="uk-button uk-button-success uk-margin-medium-left admin-btn" href="#create-model" uk-tooltip="title: Create New User ; delay: 500 ; pos: top ;animation: uk-animation-scale-up" uk-toggle> 
            <i class="fas fa-user-plus"></i> tambah baru 
        </button>                     
        <!-- model -->                     
        <div id="create-model" uk-modal> 
            <div class="uk-modal-dialog"> 
                <button class="uk-modal-close-default uk-padding-small" type="button" uk-close></button>                             
                <div class="uk-modal-header"> 
                    <h4> Tambah mapel baru   </h4> 
                </div>                             
                <div class="uk-modal-body"> 
                    <div uk-grid>                                    
                        <div class="uk-width-2-1@m"> 
                            <form method="POST" action="<?php echo BASEURL ?>/admin/tambahMapel"> 
                                <div class="uk-margin"> 
                                    <label> Nama Mapel </label>                                                 
                                    <input required="" name="nama_mapel" class="uk-input uk-form-width-large" placeholder="Nama Mapel" type="text"> 
                                </div>        
                                <div class="uk-margin">
                                    <label> Kelas </label>   
                                    <select required="" class="uk-select" name="jenjang_kelas">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                    </select>
                                </div>              
                                <div class="uk-margin"> 
                                    <label> Deskripsi Mapel </label>                                                 
                                    <textarea class="uk-textarea" name="deskripsi_mapel" required="" placeholder="Deskripsi mapel"></textarea>
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
                <form method="post" action="cariMapel"> 
                    <input name="keyword" class="uk-input uk-form-width-medium" type="text" placeholder="Cari guru"> 
                    <button class="uk-button uk-button-grey admin-btn" type="submit">Cari</button>                          
                </form>                           
            </div>                         
        </div>                     
    </div>                 
    <div class="uk-overflow-auto"> 
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider"> 
            <thead> 
                <tr class="uk-text-small uk-text-bold"> 
                    <th>No</th> 
                    <th>Kelas</th>
                    <th>Nama Mapel</th>  
                    <th>Deskripsi Mapel</th>
                    <th></th>
                </tr>                             
            </thead>                         
            <tbody> 
                <?php
                    $no = 1; 
                    foreach ($data['mapel'] as $mapel):
                ?>
                    
                    <tr> 
                        <td>
                            <?php echo $no; ?>
                        </td>                                           
                        <td><?php echo $mapel['jenjang_kelas'] ?></td>
                        <td> <?php echo $mapel['nama_mapel'] ?> </td> 
                        <td><?php echo $mapel['deskripsi_mapel'] ?></td>   
                        <td class="uk-flex-inline uk-flex-middle"> 
                            <button class="uk-button uk-button-primary" type="button">Aksi</button>
                            <div uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-nav-header">Pilih aksi (<?php echo $mapel['id_mapel'] ?>):</li>
                                    <li><a href="<?php echo BASEURL ?>/admin/editMapel/<?php echo $mapel['id_mapel'] ?>">1. Edit</a></li>
                                    <li><a href="<?php echo BASEURL ?>/admin/hapusMapel/<?php echo $mapel['id_mapel'] ?>">2. Hapus</a></li>
                                </ul>
                            </div>   
                        </td>                                 
                    </tr>  

                <?php 
                    $no++; 
                    endforeach 
                ?>                    
            </tbody>                         
        </table>                     
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
        <p> you are showing 1 to 12 entries</p> 
    </div>                 
</div>