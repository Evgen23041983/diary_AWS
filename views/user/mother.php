<!DOCTYPE html >

<html lang="en">
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
	
	</head>
	<body>
    <nav>
        <a href="/">HOME</a>
            
            
            <div class="animation start-home"></div>
        </nav>
		
            <div id = "content" >
                
                <div class="table col-12 mt-3 pt-2">
                    <div class="row table-light">
                        <div class="col-1 font-weight-bold text-center py-2">
                            #
                        </div>
                        <div class="col-3 font-weight-bold text-center py-2">
                            Name
                        </div>
                        <div class="col-6 font-weight-bold text-center py-2">
                            Task
                        </div>
                        <div class="col-2 font-weight-bold text-center py-2">
                            Done
                        </div>
                    </div>
                    <?php foreach (Mother::GetInfo() AS $index): ?> 
                    <div class="row table-dark d-flex flex-row justify-content-around py-2">
                        <div class="col-1 text-center"><?=$index['id']?></div>

                        <div class="col-3 text-center">Mother</div>

                        <div class="col-6"><?=$index['task']?></div>

                        <div class="col-2 text-center">
                            <div class="form-check">
                                <form method="post" action="">
                                
                                    <input type="hidden" name="idd" value="<?=$index['id']?>">
                                    <input class="form-check-input position-static" type="checkbox" name="done" value="yes" aria-label="...">
                                    <input name="submitch" type="submit" value="done" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>    
            </div>



		
			<div id="page">
				
				<div id="content">
					<div class="box">
                        <form method="post" > 
                    
                            <input name="task" type="text"  />
                            <input name="submitadd" type="submit" value="Add new task" />
                        </form>

					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			
		<div id="footer">
		
		</div>

        


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
