
</div>
        <!--//content-inner-->
      <!--/sidebar-menu-->
        <div class="sidebar-menu">
          <header class="logo1">
            <h2>Gudang</h2>
          </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
                  <ul id="menu" >
                    <li><a href="Home"><span>Home</span></a></li>
                     
                    <li id="menu-academico" ><a href="<?php echo site_url('pengadaan') ?>"><span>Pengadaan</span></a></li>
                  <li><a href="<?php echo site_url('produksi') ?>"><span>Produksi</span></a></li>
                  <li id="menu-academico" ><a href="<?php echo site_url('QualityControl ') ?>"></i> <span>Quality Control</span></a></li>
                  <li id="menu-academico" ><a href="<?php echo site_url('gudang') ?>"><span>Gudang Barang Jadi</span></a></li>
                  <li id="menu-academico" ><a href="<?php echo site_url('Login/logout')?>" onClick="JavaScript: return confirm('Anda yakin untuk Keluar?')"><span>Logout</span></a></li>
									<li id="menu-academico" ><a href="CreateUser"><span>Register</span></a></li>
                   
                      
                  
                  </ul>
                </div>
                </div>
                <div class="clearfix"></div>    
              </div>
              <script>
              var toggle = true;
                    
              $(".sidebar-icon").click(function() {                
                if (toggle)
                {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
                }
                else
                {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                  $("#menu span").css({"position":"relative"});
                }, 400);
                }
                      
                      toggle = !toggle;
                    });
              </script>
<!--js -->
<script src="<?php echo base_url('') ?>assets/bs/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url('') ?>assets/bs/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url('') ?>assets/bs/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
          
          <script type="text/javascript">
             $(document).ready(function(){
             $('#example').DataTable();
          });
          </script>
   

       <script src="<?php echo base_url('') ?>assets/bs/js/menu_jquery.js"></script>
        <script type="text/javascript">
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }      
          </script>
</body>
</html>

