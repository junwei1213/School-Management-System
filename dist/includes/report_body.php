
<table style="width:55%;float:left">
							<thead>
							  <tr>
								<th class="first">Time</th>
								<th>M</th>
								
							  </tr>
							</thead>
							
		<?php
				
				$query=mysqli_query($conn,"select * from time where days='all' order by time_start")or die(mysqli_error());
					
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
								<td class="first"><?php echo $start."-".$end;?></td>
								<td><?php 
								if ($member<>"")
								{
									$query2=mysqli_query($conn,"select * from schedule natural join admindata where day='w' and schedule.adminid='$member' and time_id='$id' and settings_id='$sid'")or die(mysqli_error($con));
								}
										$row1 = mysqli_fetch_array($query1);
										$id1=$row1['sched_id'];
										$count=mysqli_num_rows($query1);
										$encode=$row1['encoded_by'];
										$mid=$_SESSION['UNAME'];
										
										if($mid==$encode)
										{
											$options="";
										}
										else
											$options="none";
										if ($count==0)
										{
											//echo "<td></td>";
										}
										else
										{
											
											echo "<div class='show'>";	
											echo "<ul>";
											echo "<li class='showme'>";		
											echo $row1['subjectid'];
											echo "</li>";
											
																					
											
											
											echo "</ul>";
										}	
									?>
								</td>
								</tr>
			<?php }?>					  
			</table> 