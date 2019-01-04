<!-- <style>
	

.social-line-type{
	display: flex;
	a{
		
		

		&:hover{
			@include p-web(transform ,scale(1.2));
		}
		i{
			display: flex;
			justify-content:center;
			align-items: center;
			// font-size: 20px;
			color: $c-white;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			margin-left: 3px;
			margin-right: 3px;
		}
		.fa-facebook{
			background-color: #3b5998;	
		}
		.fa-tiwtter{
			background-color: #1da1f3;	
		}
		.fa-google{
			background-color: #da4835;	
		}
		.fa-youtube{
			background-color: #be0a0a;	
		}
		.fa-pinterest{
			background-color: #bd1e24;	
		}

	}
}

</style> -->
<?php 
$source_social=get_field('op_inf_sn_repeat','option');
?>
<ul class="footer_social">
	<?php 
	foreach ($source_social as $key => $value) {
		?>
		<li><a href="<?php echo $value['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow"><i class="fa <?php echo $value['op_inf_sn_repeat_icon']; ?>" aria-hidden="true"></i></a></li>
		<?php
	}
	?>						
</ul>	