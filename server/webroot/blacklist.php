<?php
//set file name
$blacklist = 'ownblacklist.txt';
//get file contents into array
$contents = file($blacklist, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//sort array - note this sorts it for display
usort($contents, "strcasecmp");
//make sure there are no duplicates in array
$contents = array_unique($contents);
//count array elements for possible display (the js search displays the number of rows itself, but at the end of the table)
$numdomains=count($contents); 

//process form submission for adddomain (adding a domain to blacklist)
if (isset($_POST["adddomain"])) {
	$adddomain = $_POST["adddomain"];
	//if domain entered in form doesnt match any domain in array, then append it to file
	if(!in_array($adddomain, $contents)){
		//add the domain to the array
		$contents[] = $adddomain;
		//sort the array for writing for file 
		usort($contents, "strcasecmp"); 	
		//convert the array to string
		$contents = implode("\r\n",$contents);
		//write to file
		file_put_contents($blacklist, $contents . "\r\n");
	}
	//force a page refresh to make sure table is updated
	echo "<meta http-equiv='refresh' content='0'>";
}

//process button onclick for remdomain (removing a domain from) blacklist
if(array_key_exists('id',$_POST)){
$remdomain = $_POST["id"];
//search array for domain to be removed, if found, unset (remove) it
	if (($key = array_search($remdomain, $contents)) !== false) {
		//remove the matching array item
		unset($contents[$key]); 
		//sort the array
		usort($contents, "strcasecmp"); 	
		//convert the array to string
		$contents = implode("\r\n",$contents);
		//write to file
		file_put_contents($blacklist, $contents . "\r\n");	
	}
	//force a page refresh to make sure table is updated
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html >
<head>
<!-- Site made with Mobirise Website Builder v4.8.2, https://mobirise.com -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="generator" content="Mobirise v4.8.2, mobirise.com">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">
<meta name="description" content="Web Site Generator Description">
<title>Blacklist (Block) A Website</title>
<link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="assets/dropdown/css/style.css">
<link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>

<section class="menu cid-r7nvWfKju5" once="menu" id="menu1-g">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-default navbar-static-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="">
                        Multi USG Adblock
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
			<li class="nav-item"><a class="nav-link link text-white display-4" href="index.php">Home</a></li>
			<li class="nav-item"><a class="nav-link link text-white display-4" href="whitelist.php">Whitelist (Unblock) A Website</a></li>
			<li class="nav-item"><a class="nav-link link text-white display-4" href="blacklist.php">Blacklist (Block) A Website</a></li>
			</ul>
		</div>
    </nav>
</section>

<section class="section-table cid-r65YSca07c" id="table1-8">
  <div class="container container-table">
      <h1 class="mbr-section-title align-center">
        Blacklist (Block) & UnBlacklist Websites</h1>
		<p>
		<b>Important Note On Terminology:</b> When we Whitelist (Unblock) or Blacklist (Block) websites, we do it by using the domain name only, or the main part of the websites address only, i.e. the domain name from the web address (for example) <b>http://www.smh.com.au/help/</b> is <b>smh.com.au</b>  - that is, everything <b>after</b> the <b>http://www.</b> and <b>before</b> the first single slash <b>/</b> if there is one.
		<p>
		<div class="container">
		<a href="#addinfo" class="btn btn-warning p-1" data-toggle="collapse">Click here for steps to Blacklist (Block) a website</a>
		<div id="addinfo" class="collapse">		
		<p>
		Type the domain name into the <b>"Search for domain name"</b> box below, do not type the www. prefix (i.e. for website "www.example.com", type "example.com")
		<p></p>
		If the domain name is not displayed in the search results, then it is not already blacklisted.
		<p></p>
		Next, type the domain name you wish to blacklist(block) into the box below titled <b>"type a domain name"</b>, and then click the <b>"Blacklist(Block) this site"</b> button
		<p></p>
		The page will automatically reload and the domain should be added to the blacklist, and visible in the table at the bottom of the page. If you want to, you can always use the <b>"Search for domain name"</b> box to make sure it has been added.
		<p></p>
		The USG's will pick up the changes made here on their next scheduled update
		</div>
		</div>			
		<p>&nbsp;</p>
		<form class="form-inline" method = "POST">  
		<label for="usr">Add a new site to the blacklist:</label>&nbsp;&nbsp;&nbsp;
		<div class="input-group input-group-sm col-6">
		<input type="text" class="form-control" placeholder="type a domain name" name="adddomain"></input>
		<button type="submit" class="btn btn-primary p-1">Blacklist (Block) this site</button>
		</div>
		</form>
		<p>&nbsp;</p>
		<div class="container">
		  <a href="#reminfo" class="btn btn-warning p-1" data-toggle="collapse">Click here for steps to remove a site from the blacklist</a>
		<div id="reminfo" class="collapse">
		<p></p>
		You can either:
		<p></p>
		Browse the list of domain names below and click the <b>Un-Blacklist</b> button to the left of the entry for the domain you wish to remove from the blacklist
		<p></p>
		OR
		<p></p>
		Type the domain name into the <b>"Search for domain name"</b> box below, do not type the www. prefix (i.e. for website "www.example.com", type "example.com")
		<p></p>
		If the domain name is displayed in the search results, then simply click the <b>Un-Blacklist</b> button to the left of the entry.
		<p></p>
		Either way, the page will automatically reload and the domain should be removed from the blacklist, and no visible in the table at the bottom of the page. If you want to, you can always use the <b>"Search for domain name"</b> box to make sure it has been removed.
		<p></p>
		The USG's will pick up the changes made here on their next scheduled update
		<p></p>		
		<b>Note:</b> Removing a site from the blacklist does not mean it will necessarily be whitelisted. If the site appears on the main blacklist, then removing it from the personal blacklist may still me it is still blacklisted.
		If you definitely want the site you're removing from the blacklist to be unblocked, remove it from the blacklist and test it, and if its still inaccessible, return here and add it to the <a href="whitelist.php">whitelist</a>		
		</div>
		</div> 		
		<p>&nbsp;</p> 
        <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-11">Search for domain name:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div>
		<p>
        <div class="container scroll">
		<form method = "post">
          <table class="table isSearch" id="domains" cellspacing="0">
            <thead>
              <tr class="table-heads">
              <th class="head-item mbr-fonts-style display-11">
              <?php echo $numdomains ?> currently blacklisted sites</th></tr>
            </thead>
            <tbody>
            <?php 
			if(is_array($contents)){
				foreach ($contents as $item) {
					echo '<tr><td class="body-item mbr-fonts-style display-11"><button type="submit" class="btn btn-primary btn-sm p-1" name="id" id="id" value="'.$item.'"/>Un-Blacklist</button>'.$item.'</td></tr>'."\n";
			}
			}
			?>
			</tbody>
			</form>					  	
			</table>
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">Showing</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter">entries</span>
                <span class="infoFilteredBefore">(filtered from</span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter"> total entries)</span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="engine"><a href="https://mobiri.se">Mobirise</a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/datatables/jquery.data-tables.min.js"></script>
<script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
<script src="assets/theme/js/script.js"></script>
</body>
</html>