<div class="row">
	<div class="container">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item <?php if($_GET['id'] <= 1) { ?>disabled<?php }?>">
					<a class="page-link" href="films-<?=$_GET['id']-1;?>.html?title=<?=$_GET['title'];?>&gender=<?=$_GET['gender'];?>&year=<?=$_GET['year'];?>&time=<?=$_GET['time'];?>&limit=<?=$_GET['limit'];?>" tabindex="-1">Prev</a>
				</li>
				<?php for($i = 1; $i <= $nbr_page; $i++) {?>
					<li id= "<?=$i;?>" class="page-item <?php if($i == $_GET['id']){?>active<?php }?>"><a class="page-link" href="films-<?=$i?>.html?title=<?=$_GET['title'];?>&gender=<?=$_GET['gender'];?>&year=<?=$_GET['year'];?>&time=<?=$_GET['time'];?>&limit=<?=$_GET['limit'];?>"><?=$i?></a></li>
				<?php }?>
				<li class="page-item <?php if($_GET['id'] >= $nbr_page) { ?>disabled<?php }?>">
					<a class="page-link" href="films-<?=$_GET['id']+1;?>.html?title=<?=$_GET['title'];?>&gender=<?=$_GET['gender'];?>&year=<?=$_GET['year'];?>&time=<?=$_GET['time'];?>&limit=<?=$_GET['limit'];?>">Next</a>
				</li>
			</ul>
		</nav>
	</div>
</div>