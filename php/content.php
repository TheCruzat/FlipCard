<?php 
	function strposa($haystack, $needles=array(), $offset=0) {
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
	}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  	
  	<meta charset="utf-8">

	<!-- this sets the page title in the browser -->
	<title><?php echo $teedle; ?></title>

	<!-- this makes the site flexible to device sizes, like mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- please Ms/Mr Search Engine Spider, ignore this page -->
	<meta name="robots" content="noindex, nofollow">

	<!-- let there be Google Font -->
	<link href="https://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $font); ?>" rel="stylesheet">

	<!-- these are the CSS rules, which govern style and appearance -->
	<style>

		:root {
			--body-size: 12px;
		}

		@media (min-width: 64rem) {
			:root {
				--body-size: 16px;
			}
		}

		* 		{	box-sizing:border-box;padding:0;margin:0;	}
		html, body 	{	font-family: <?php echo $font; ?>, Helvetica, Arial, sans-serif; font-weight:400; font-size: var(--body-size); -webkit-font-smoothing: antialiased;	}
		a 			{	color:red;text-decoration:none;	}
		a:hover 	{	text-decoration:underline;	}
		.frame 		{	cursor:pointer;	}
		.pane 		{	float:left;z-index:1;background:#fff;display:block;width:100%;height:100%;overflow:hidden;position:relative;text-align: center;	}
		.shell 		{	display:block;top:0;left:0;right:0;bottom:0;	/*position:fixed;*/	}
		.lens 		{	padding:0 2rem;display:flex;align-items: center; justify-content: center;width:100vw;height:100vh;	}
		p 			{	line-height:1.8; letter-spacing: 0.2rem; font-size:1.2rem; background: rgba(255,255,255,0.8); display: inline;	}
		em 			{	font-style:normal;opacity:0.5;font-size:72%;line-height:1;	}

		@media screen and (min-width:768px) {
			.lens p 	{	font-size:1.7em;	}
			.rim 		{	padding:0 5.5em;	}
		}

	</style>
	
	<!-- this is the include for JQuery, the magic! -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<body>

	<div class="frame">

	<?php foreach($coppee as $coun => $cop) : 
		// is it a background image?
		$bg = "";
		if(strposa($cop[1], [".jpg", ".jpeg", ".png", ".gif", ".svg"], 0)) {
			$bg = "background: url(img/".$cop[1].") 50% 50% / cover no-repeat fixed";
		}
		if(((strlen($cop[1]) == 7) || (strlen($cop[1]) == 4)) && (strpos($cop[1], "#") > -1)) {
			$bg = "background: ".$cop[1].";";
		}
		?>
		<section class="pane" style="<?php echo $bg; ?>">
			<div class="shell">
				<div class="lens">
					<p><?php echo $cop[0]; ?></p>
				</div>
			</div>
		</section>

	<?php endforeach; ?>

	</div>

	<!-- these are the JQuery commands that drive the page interactions -->
	<script>

		// we only want our functions when the page has fully loaded, including the JQuery
		(function($) {

			var $tar = $('.pane'),
			co = 0,
			cc = $tar.length;

			// I am the function that drives the page advance on click
			function adVnc() {
				var $t = $tar.eq(co);
				if($t.length>0) {
					$t = $t.offset().top;
					$c = 240;
		    	} else {
		    		co = 0;
		    		$t = 0;
		    		$c = 3000;
		    	}
		        $('html,body').stop(true,true).animate({
		          scrollTop: $t
		        }, $c);
			}

			// I detect keystrokes, literally the down-press
			$(document).keydown(function(e) {

				// keys used to do things, now they don't
				e.preventDefault();

			// we connect the flip action to the key release
			}).keyup(function(e) {

				// increment global counter down, call adVnc()
				if(e.keyCode==38 || e.keyCode==37) {
					co --;
					adVnc();
				}

				// increment global counter up, call adVnc()
				if(e.keyCode==40 || e.keyCode==32 || e.keyCode==13 || e.keyCode==39) {
					co ++;
					adVnc();
				}

				// whatever key is pressed, pass the value to the console
				console.log('keyup called with '+e.keyCode);

			});

			// on page click, increment global counter up, call adVnc()
			$tar.on('click',function() {
				co = $(this).index();
				co ++;
				adVnc();
			});

		})(jQuery);
	</script>
</body>
</html>