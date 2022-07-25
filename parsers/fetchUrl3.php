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

	 	if(isset($og_details) && $og_details){
	 		// echo basename(@$og_details['image']);
	 		echo @$og_details['description'];
	 	}  
	}
?>