	<?php 

			foreach($todos as $todoItem) {
		
				echo "
					<div class='todoItem'>".$todoItem['message']."</div><div class='todoDelete' data-delete='".$todoItem['todo_id']."'>X</div><br>
					
				";
			}
			
			if(count($todos) == 0) {
				echo "

					<p align='center'>
						No Todos Posted!
					</p>
				
				";
			}
			
		?>

