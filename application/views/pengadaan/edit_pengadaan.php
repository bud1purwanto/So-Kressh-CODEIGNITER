
<body>
   <div class="page-container">
   <!--/content-inner-->
  <div class="left-content">
     <div class="inner-content">
    <!-- header-starts -->
      <div class="header-section">
      <!-- top_bg -->
            
          <div class="clearfix"></div>
        <!-- /top_bg -->
        </div>
        <div class="header_bg">
            
              <div class="header">
                <div class="head-t">
                  <div class="logo">
                    <a href="index"><img src="<?php echo base_url('') ?>assets/bs/images/sokressh.png" class="img-responsive" alt="" height="250" width="250"> </a>
                  </div>
                    <!-- start header_right -->
                  
                    
                  <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
          
        </div>
          <!-- //header-ends -->
        
        <div class="container-fluid p-0">

      <div class="col-sm-12">
        <div class="my-auto"><h1>Edit Data Pengadaan</h1> 
          <br>
          <?php if (validation_errors()) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo validation_errors(); ?></strong></div><?php } 
                                                else if ($this->session->flashdata('terhapus')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('terhapus'); ?></strong></div><?php } else if ($this->session->flashdata('fail')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-danger">
                                                    <strong><?php echo $this->session->flashdata('fail'); ?></strong></div><?php } else if ($this->session->flashdata('sudah_input')) {
                                                   ?><div style="margin-top: 20px" class="alert alert-success">
                                                    <strong><?php echo $this->session->flashdata('sudah_input'); ?></strong></div><?php } ?>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="panel panel-default">
                        <?php foreach ($get_pengadaan as $key) {
                        ?>
                        <div class="panel-body">
                <?php echo form_open_multipart('pengadaan/edit/'.$this->uri->segment(3)); ?>
                    <?php if (validation_errors()) {
                        ?><div style="margin-top: 0px" class="alert alert-danger">
                              <strong><?php echo validation_errors(); ?></strong></div><?php } ?>
                        <div class="table-responsive">
                  
                            <div style="margin-top: 0px" class="form-group">
                                <label>Nama Bahan</label>
                                <input class="form-control" id="namaBahan" name="namaBahan" type="text" placeholder="Nama Bahan" value="<?php echo $key->namaBahan; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" id="jumlah" name="jumlah" type="number" placeholder="Jumlah" value="<?php echo $key->jumlah; ?>">
                            </div>
                            <div style="margin-top: 0px" class="form-group">
                                <label>Harga</label>
                                <input class="form-control" id="harga" name="harga" type="number" placeholder="Harga" value="<?php echo $key->harga; ?>">
                            </div>
                           <div style="margin-top: " class="form-group">
                                            <label>Kualitas Bahan</label>
                                            <select class="form-control" id="required" name='idKualitas' data-placeholder="Pilih Pengarang">
                                            <?php foreach ($kualitas as $key) { ?>
                                                 <?php echo "<option value='".$key->idKualitas."'>".$key->kualitasBarang."</option>" ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>  Edit</button>
                                
                            </div><?php } ?>
                          <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      
    <div class="clearfix"> </div>
    </div>
