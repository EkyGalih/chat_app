<?php
include "header.php";
?>

<div class="col-sm-6 pull-left">
	<div class="panel panel-danger">
		<div class="panel-heading"><h4><label class="glyphicon glyphicon-plus"></label> Add Events</h4></div>
		<div class="panel-body">
			<form class="form-group" name="events" enctype="multipart/form-data" method="POST" action="EventsProccess.php" onsubmit="return validateForm()">
				<div class="input-group">
					<span class="input-group-addon"><b>Title Events</b></span>
					<input type="text" class="form-control" name="title" placeholder="Title Events" required>
				</div><br/>
				<div class="input-group">
					<span class="input-group-addon"><b>Description</b></span>
					<textarea name="descript" class="form-control" placeholder="Deskription Events.." required></textarea>
				</div><br/>
				<div class="input-group">
					<span class="input-group-addon"><b>write event</b></span>
					<textarea name="contents" class="form-control" cols="2" rows="4" placeholder="write contents of events.."></textarea>
				</div><br/>
				<input type="file" name="images" class="form-control"><br/>
				<button type="submit" name="save" class="btn btn-danger"> Publish</button>
				<button type="reset" name="reset" class="btn btn-btn"><label class="glyphicon glyphicon-refresh"></label> Reset</button>
			</form>
		</div>
	</div>
</div>

<!-- list untuk events -->
<div class="col-sm-6 pull-right">
	<script src="assets/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
	<div class="row">
		<div class="panel panel-danger">
			<div class="panel-heading"> <img src="assets/img/events.ico" alt="ibtem" width="20px" height="20px"></span> <b>list Events</b></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12">
						<ul class="list_events" style="overflow-y: hidden; height: 210px;">
							<li class="news-item">
								<table cellspacing="6" class="table table-hover table-responsive" cellpadding="4">
									<thead>
										<td>No</td>
										<td>Images</td>
										<td>Deskrip</td>
										<td>Action</td>
									</thead>
									<?php
		$sql = "SELECT * FROM events ORDER BY id ASC"; //menampung karakter/perintah mysql
            $hasil = $mysqli->query($sql); //menjalankan perintah dengan fungsi mysqli
				if ($hasil == FALSE) { //jika gagal menjalankan query mysql
                	trigger_error("Syntax Mysqli Error: " . $sql . "Error: " . $mysqli->error, E_USER_ERROR); //menampilkan pesan error
                } else {
                	$no = 1;
            	while ($q = $hasil->fetch_array()) { //menampilkan data
            		?>
            		<tbody>
            			<tr>
            				<td><?php echo "$no" ?></td>
            				<td><img src="<?php echo "$q[images]" ?>" width="100" class="img-rounded"></td>
            				<td><?php echo "$q[descript]" ?></a></td>
            				<td>hapus</td>
            			</tr>
            		</tbody>
            		<?php
            		$no++;
            	}
            }
            ?>
        </table>
    </li></ul>
</div>
</div>
</div>
<div class="panel-footer">
	<div class="clearfix"></div>
</div>
</div>
<!-- end list untuk events -->

<!-- javascrip event -->
<script type="text/javascript">
	$(document).ready(function(){

		var clickEvent = false;
		$('#myCarousel').carousel({
			interval:   4000	
		}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
		}).on('slid.bs.carousel', function(e) {
			if(!clickEvent) {
				var count = $('.list-group').children().length -1;
				var current = $('.list-group li.active');
				current.removeClass('active').next().addClass('active');
				var id = parseInt(current.data('slide-to'));
				if(count == id) {
					$('.list-group li').first().addClass('active');	
				}
			}
			clickEvent = false;
		});
	})

	$(window).load(function() {
		var boxheight = $('#myCarousel .carousel-inner').innerHeight();
		var itemlength = $('#myCarousel .item').length;
		var triggerheight = Math.round(boxheight/itemlength+1);
		$('#myCarousel .list-group-item').outerHeight(triggerheight);
	});
</script>
<script type="text/javascript">

	$(function () {
		$(".list_events").bootstrapNews({
			newsPerPage: 3,
			autoplay: true,
			pauseOnHover:true,
			direction: 'up',
			newsTickerInterval: 4000,
			onToDo: function () {
                //console.log(this);
            }
        });
	});

</script>
<!-- end javascript events -->

<footer align="right">
	<p>copyright 2016 © Indonesian Backrtack Team</p>
</footer></div></div>