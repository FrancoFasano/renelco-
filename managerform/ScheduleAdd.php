
   
      <?php  include("header.php");
      	
		if(isset($_POST["id"])){
	    	$id = $_POST["id"];
	    	$schedule_name = $_POST['schedule_name'];
	    	$description = $_POST['description'];
	    	$is_legal = $_POST['is_legal'];
	    	$active_from = $_POST['start'];
	    	$active_end = $_POST['end'];
	    	if($active_from == '') $active_from = date('Y-m-d H:i:s');
	    	if($active_end == '') $active_end = date('Y-m-d H:i:s');
	    	if($id == 0){
	    		$sql = "INSERT `SCHEDULE` (`SCHEDULE_ID`, `NAME`, `DESCRIPTION`, `IS_LEGAL`, `ACTIVE_FROM`,`ACTIVE_TO`) VALUES (NULL, '$schedule_name', '$description', '$is_legal', '$active_from', '$active_end')";
	    		
	    	}
	    	else if($id > 0){
	    		
	    		$sql = "UPDATE `SCHEDULE`  SET `NAME`='".$schedule_name."', `DESCRIPTION`='".$description."',
	    		 `IS_LEGAL`='".$is_legal."', `ACTIVE_FROM`='".$active_from."', `ACTIVE_TO`='".$active_end."' WHERE `SCHEDULE_ID`=".$id;
	    	}
	    	//echo $sql."</br>";
	    	mysqli_query($connect, $sql);
	    	if($id == 0){
	    		$id=mysqli_insert_id($connect);
	    		
	    	}
	    	$error = "";
	    	
	    	?><script>
	    		window.location.href = "ConfigSchedule.php?id_mod=<?php echo $id;?>";
    		</script>
    		<?php 
	    }
      ?>
    
       <hr class="style_one"/>
      <section id='content'>
        <div class='container'>
        	<div class="row">
                <div class='col-sm-12'>
                  <div class='box'>
                    <div class='box-header red-background'>
                       <div class='title'><p>Schedule:</p>
                          <a class="btn btn-danger btn-lg" style="float:right;" href="ScheduleList.php" title="Retour au tableau">Retour au tableau</a>
                          <hr class="style_two"/>
                      </div>
                      </div>
						<div class='box-content clearfix'>
                       <?php
                       if(!empty($message)){
                         echo "<div class=\"col-sm-12\" id=\"afficheMessage\" style=\"display:block;\">";
                         echo "<p>".$message;
                         echo "</p></div>";
                       }
                        
                         ?>
				<form class="form" style="margin-bottom: 0;" method="post" action="ScheduleAdd.php" enctype="multipart/form-data" >
	                        <div class="col-sm-12">
	                        	<hr class="style_one"/>
					<input type="hidden" value="0" name="id" id="id" />
                    <div class='form-group'>
                        <label for='organizatin_unit_name'>Nom</label>
                        <input class="form-control" id="schedule_name" name="schedule_name" placeholder="Schedule Name" type="text" required>
                      </div>
					<div class='form-group'>
                    	<label for="desc_cus">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Schedule Description" />
                    </div>
					<div class='form-group'>
						<label for='is_legal'>Legal Entity</label>
						<select id = "is_legal" name="is_legal" class="form-control">
							<option value="Y">YES</option>
							<option value="N">NO</option>
						</select>
                      </div>
                    </div>

					<div class="col-sm-12">
                    		<div class="form-group">
                    			<label for='inputText'>ACTIVE FROM</label> 
				                   <div class="datepicker-input input-group" id="datepicker">
				                      <input class="form-control" data-format="YYYY-MM-DD" name="start" value="">
				                      <span class="input-group-addon">
				                        <span data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></span>
				                      </span>
				                    </div>
                    			
                    		</div>
                    	</div>
                    	<div class="col-sm-12">
                    		<div class="form-group">
                    			<label for='inputText'>ACTIVE TO </label> 
				                   <div class="datepicker-input input-group" id="datepicker2">
				                      <input class="form-control" data-format="YYYY-MM-DD" name="end" value="">
				                      <span class="input-group-addon">
				                        <span data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></span>
				                      </span>
				                    </div>
                    		</div>
                    	</div>
					<div class="col-sm-12">
							<div class="col-sm-12">
					    <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
						
						  <div class='row' >

										<div class='col-sm-8'></div>

                       <div class='col-sm-2' >
                       	  
                       </div>
                       <div class="col-sm-2">
                          <input type="submit" id="addCustomer" name="addCustomer" value="Ajouter" class='btn btn-danger btn-lg'>
                      </div>
                      </div>
								</div>
                     
								<hr class="style_two"/>
							</div>
                      </form>
              	
              		<!--ADRESSE-->
          <
              	
                    </div>
                  </div>
                </div>
            
              </div>
            </div>
          </div>
      </section>
      <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- / jquery mobile (for touch events) -->
    <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <!-- / jquery migrate (for compatibility with new jquery) [required] -->
    <script src="assets/javascripts/jquery/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- / jquery ui -->
    <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- / jQuery UI Touch Punch -->
    <script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
    <!-- / bootstrap [required] -->
    <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
    <!-- / modernizr -->
    <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
    <!-- / retina -->
    <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
    <!-- / theme file [required] -->
    <script src="assets/javascripts/theme.js" type="text/javascript"></script>
	<script src="assets/javascripts/plugins/fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
    <script src="assets/javascripts/plugins/datatables/dataTables.overrides.js" type="text/javascript"></script> 
<script type="text/javascript">

//DISPLAY CHOISIR UN RESPONSABLE 
 $(document).ready(function(){

   $("#type_col").change(function () {

        if($("#type_col option:selected").val()!=1) {
            $("#responsable").css("display","block");
        }else{
            $("#responsable").css("display","none");
        }
    });
 });
  $(document).ready(function(){
	  $("#addAddress").click(function () {

          if( $("#displayAddress").css("display","block")){
            var page = $(this).attr('href'); // Page cible
            var speed = 2000; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top }, speed );
            return false;
          }
          
       });
 });
  function initializeAutocomplete(id) {
	  var element = document.getElementById(id);
	  if (element) {
	    var autocomplete = new google.maps.places.Autocomplete(element, { types: ['geocode'] });
	    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
	  }
	}
	function onPlaceChanged() {
	  var place = this.getPlace();
	  document.getElementById('lat').value = place.geometry.location.lat();
	  document.getElementById('lng').value  = place.geometry.location.lng();

	  // console.log(place);  // Uncomment this line to view the full object returned by Google API.
	   
	  for (var i in place.address_components) {
	    var component = place.address_components[i];
	    
	    for (var j in component.types) {  // Some types are ["country", "political"]
	       var type_element = document.getElementById(component.types[j]);

	      if (type_element) {
	        if(type_element==administrative_area_level_1){
	          type_element.value = component.short_name;
	        }else{
	          type_element.value = component.long_name;

	        }

	      }
	    }
	  }
	}


	//AJOUTER UNE ADRESSE
	 $(document).ready(function(){
	       $("#addAddress").click(function () {

	           if( $("#displayAddress").css("display","block")){
	             var page = $(this).attr('href'); // Page cible
	             var speed = 2000; // Durée de l'animation (en ms)
	             $('html, body').animate( { scrollTop: $(page).offset().top }, speed );
	             return false;
	           }
	           
	        });
	       $('#datepicker').on("changeDate", function() {
	            $('#date_debut').val(
	                $('#datepicker').datepicker('getFormattedDate')
	            );
	        });
	       $('#datepicker2').on("changeDate", function() {
	            $('#date_fin').val(
	                $('#datepicker2').datepicker('getFormattedDate')
	            );	
	        });
	     });


</script>

  </body>


</html>
