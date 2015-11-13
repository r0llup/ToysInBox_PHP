<?php
	$dir = "../";

	if(is_dir($dir))
	{
		if($handle = opendir($dir))
		{
			echo "<p>";
			while(($file = readdir($handle)) !== false)
			{
				if(is_numeric($file[0]) and $file != "include")
				{
					echo "<a href='../" . $file . "/" . strtolower(substr($file, 2)) . ".php'>" .
						substr($file, 2) . "</a> | ";
				}
			}

			echo "</p>";
			closedir($handle);
		}
	}
?>