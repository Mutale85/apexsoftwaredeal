<?php
	function getSiteOG( $url, $specificTags=0 ){
	    $doc = new DOMDocument();
	    @$doc->loadHTML(file_get_contents($url));
	    $res['title'] = $doc->getElementsByTagName('title')->item(0)->nodeValue;

	    foreach ($doc->getElementsByTagName('meta') as $m){
	        $tag = $m->getAttribute('name') ?: $m->getAttribute('property');
	        if(in_array($tag,['description','keywords']) || strpos($tag,'og:')===0) $res[str_replace('og:','',$tag)] = $m->getAttribute('content');
	    }
	    return $specificTags? array_intersect_key( $res, array_flip($specificTags) ) : $res;
	}

	if(isset($_GET['url']) && $_GET['url']!=''){
	  	$url = $_GET['url'];
	  	if (filter_var($url, FILTER_VALIDATE_URL)) {
	      	$og_details = getSiteOG($url);

	  	} else {
	      	echo("Not a valid URL");
	  	}
	
	 if(isset($og_details) && $og_details){?>
	<div class="debug-box" onclick="openLink(this);" data-link="<?php echo $_GET['url'];?>">
  		<img src="<?php echo @$og_details['image'];?>" width="100%">
  		<div class="text-wrapper">
    		<p><strong><?php echo @$og_details['title'];?></strong></p>
    		<!-- <p class="description"><?php echo @$og_details['description'];?></p> -->
  		</div>
	</div>
<?php } ?>
<style>
	.debug-box{
		width:100%;border:1px solid #ddd;background:#eee;cursor:pointer;
	}
	.debug-box .text-wrapper{
		padding-left:10px;padding-right:10px;
	}
	.debug-box .text-wrapper p strong{
		font-size: 1.4rem;
	}
	.debug-box .text-wrapper .description{
		margin-top:-10px;
	}
	.debug-box img{
		background:#ddd;
		max-height: 300px;
	}
</style>
<script>
	function openLink(source){
		openInNewTab(source.getAttribute('data-link'));
	}
	function openInNewTab(url) {
		var win = window.open(url, '_blank');
		win.focus();
	}
</script>

<?php }
?>