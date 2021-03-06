<?php 
// Tour Packages
	$tour_packages = get_post_meta( get_the_ID(), '_rayaparvaz_group_tour_package', true );
	//var_dump($tour_packages);
	
?>
	<table class="tour-table">
		<tbody class="tour-table-body">
			
			<tr class="tour-table-header">
				<th><?php echo __('Hotel Name','rayaparvaz'); ?></th>
				<th><?php echo __('Hotel Rank','rayaparvaz'); ?></th>
				<th><?php echo __('Hotel Service','rayaparvaz'); ?></th>
				<th><?php echo __('Two Bed','rayaparvaz'); ?></th>
				<th><?php echo __('One Bed','rayaparvaz'); ?></th>
				<th><?php echo __('With Child','rayaparvaz'); ?></th>
				<th><?php echo __('Without Child','rayaparvaz'); ?></th>
			</tr> <!-- tour-table-header -->
			
			<?php 
				foreach ( (array) $tour_packages as $key => $package ) {

			    $hotel_id = $hotel_service = $two_bed = $one_bed = '';
			    $child_with_bed =  $child_without_bed = '';

			    if ( isset( $package['package_hotel'] ) ) {
			        $hotel_id = esc_html( $package['package_hotel'] );
			    	
			    	
			    	$hotel_name = get_the_title($hotel_id);
			    	$hotel_url = post_permalink($hotel_id);

			    	$hotel_rank = esc_html(get_post_meta( $hotel_id, '_rayaparvaz_hotel_rank', true ));
			    	$hotel_degree = esc_html(get_post_meta( $hotel_id, '_rayaparvaz_hotel_degree', true ));



				    if ( isset( $package['hotel_service'] ) )
				        $hotel_service = esc_html( $package['hotel_service'] );
				    if ( isset( $package['two_bed'] ) )
				        $two_bed = esc_html( $package['two_bed'] );
				    if ( isset( $package['one_bed'] ) )
				        $one_bed = esc_html( $package['one_bed'] );
				    if ( isset( $package['child_with_bed'] ) )
				        $child_with_bed = esc_html( $package['child_with_bed'] );
				    if ( isset( $package['child_without_bed'] ) )
				        $child_without_bed = esc_html( $package['child_without_bed'] );
				?>

				<tr class="tour-table-row">
					<td><a href="<?php echo $hotel_url; ?>"><strong><?php echo $hotel_name; ?></strong></a></td>
					<td><?php echo $hotel_rank; ?></td>
					<td>
						<img class="hotel-rate" src='<?php echo get_stylesheet_directory_uri()."/images/star".$hotel_degree.".png"; ?>'/><br />
						 <span "hotel-service">
						 	<?php  if($hotel_service == "b_b"){
						 				echo "<span> B.B </span>".'<img src="'.get_stylesheet_directory_uri().'/images/cup.png"/>';
						 			}elseif($hotel_service == "h_b"){
						 				echo "<span> H.B </span>".'<img src="'.get_stylesheet_directory_uri().'/images/cup.png"/>';
						 			}elseif($hotel_service == "u_all"){
						 				echo "<span> U.All </span>".'<img src="'.get_stylesheet_directory_uri().'/images/spoon.png"/>';
						 			}elseif($hotel_service == "all"){
						 				echo "<span> All </span>".'<img src="'.get_stylesheet_directory_uri().'/images/spoon.png"/>';		
						 			}else{
						 				echo "--";
						 			}
						 	?>
						 </span>
					</td>
					<td><?php echo $two_bed; ?></td>
					<td><?php echo $one_bed; ?></td>
					<td><?php echo $child_with_bed; ?></td>
					<td><?php echo $child_without_bed; ?></td>
				</tr>	
				<?php } ?>

			<?php } ?>

			
		</tbody>
		
	</table>

<?php //end 
?>
	