<!DOCTYPE html>
<html>

	<head>
		<meta charset="ISO-8859-1">
		<title>SpaceTraders</title>

		<link type="text/css" rel="stylesheet" href="css/bootstrap.css"
		media="all" />
	</head>

	<body>

        <?php

		if (!isset($_GET['agent'])) {  ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="agent.php" method="POST">
                                <!-- New Agent -->
                                <input class="form-control" type="text" name="agent" placeholder="Agent Name...">
                                <button type="submit" class="btn btn-primary top-button">Register Agent</button>
                            </form>
                        </div>
                    </div>
                </div>

        <?php 
        
        } else {
            
            $agent = $_GET['agent'];    
        ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="agent.php" method="GET">
                            <input type="hidden" name="agent" value="<?php echo $agent; ?>">
                            <button type="submit" class="btn btn-primary top-button">My Agent</button>
                        </form>
                        <form action="contracts.php" method="GET">
                            <input type="hidden" name="agent" value="<?php echo $agent; ?>">
                            <button type="submit" class="btn btn-primary top-button">My Contracts</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php }

        
        
        if (isset($_GET['contracts'])) {

            $contracts = json_decode($_GET['contracts'], true);

            foreach($contracts['data'] as $contract)  {

        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="contracts.php" method="POST">
                                        <input type="hidden" name="agent" value="<?php echo $agent; ?>">
                                        <input type="hidden" name="contractid" value="<?php echo $contract['id']; ?>">
                                        <?php if(isset($contract['id'])) {?>
                                            <button type="submit" class="btn btn-primary top-button">Accept Contract</button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php print_r($contract); ?>
                                </div>
                            </div>
                        </div>

        <?php
        
            }
        }

        ?>

        <?php
                if (isset($_GET['info'])) {

                    $accountinfo = json_decode($_GET['info'], true);

        ?>
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <table class="table">
                    <tbody>
                        <?php foreach($accountinfo['data'] as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $key;?></th>
                            <td><?php echo $value;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
                }
        ?>

	</body>

</html>

