<!-- ==============================================
   Footer Section
   =============================================== -->
<footer class="footerWhite">
   <!-- COPY RIGHT -->
   <div class="clearfix copyRight">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="copyRightWrapper">
                  <div class="row">
                     <div class="col-sm-5 col-sm-push-7 col-xs-12">
                        <ul class="list-inline socialLink">
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                     <!-- /col-sm-5 -->
                     <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                        <div class="copyRightText">
                           <p>Copyright © 2019. All Rights Reserved</p>
                        </div>
                     </div>
                     <!-- /col-sm-7 -->
                  </div>
                  <!-- /row -->
               </div>
               <!-- /copyRightWrapper -->
            </div>
            <!-- /col-xs-2 -->
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </div>
   <!-- /copyRight -->
</footer>
<a id="scrollup">Scroll</a>
<!-- ==============================================
   Scripts
   =============================================== -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
   $(function () {
     $("#example1").dataTable();
   });
</script>
<script src="assets/plugins/knob/knob.min.js"></script>
   <script>
      $(function() {
         $(".knob").knob({
         "height": 75,
         "readOnly": true,
         });
      });
   </script>   
    <!-- Datetime Picker -->
    <script src="assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
    <script>
     $('.start').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
        showMeridian: 1, 
        startDate: new Date(),
        pickTime: false, 
        minView: 2,      
        pickerPosition: "bottom-left",
    });
     $('.end').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
        showMeridian: 1, 
        startDate: new Date(),
        pickTime: false, 
        minView: 2,      
        pickerPosition: "bottom-left",
    });
   </script>   
    <!-- Jquery UI 1.10.3 -->
   <script src="assets/plugins/progress/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- UI Slider Progress -->
    <script src="assets/plugins/progress/progress.js"></script>  
   <script src="assets/js/kafe.js"></script>

</body>
</html>