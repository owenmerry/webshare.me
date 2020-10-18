<?php

namespace App;


class Website
{  

public static function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_ENCODING, '');

    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36") ); 
    curl_setopt($ch, CURLOPT_NOBODY, false);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
    
public static function getWebsiteData($url){
  
        
$html = self::file_get_contents_curl($url);

    //echo "this". $html;
//parsing begins here:
$doc = new \DOMDocument();
@$doc->loadHTML($html);

//default variables
$title='';
$h1='';
$h2='';
$ogtitle='';
$ogdescription='';
$ogimage='';
$metadescription='';
$metakeywords='';
$image='';  
$images=''; 
    
//get and display what you need:
//$title = $doc->getElementsByTagName('title')->item(0)->nodeValue;
//$body = $doc->getElementsByTagName('body')->item(0)->nodeValue;

    
// get website 
$website_domain = parse_url($url, PHP_URL_HOST);
preg_replace('/^www./', '', $website_domain);      
    

// get title 
$nodes = $doc->getElementsByTagName('title');
if ($nodes->length > 0) {
    $title = $nodes->item(0)->textContent;
};

//og title  
$metas = $doc->getElementsByTagName('meta');     
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get og:title
    if($meta->getAttribute('property') == 'og:title')
        $ogtitle = $meta->getAttribute('content');
}

//og description
$metas = $doc->getElementsByTagName('meta');     
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get og:title
    if($meta->getAttribute('property') == 'og:description')
        $ogdescription = $meta->getAttribute('content');
}

//og image  
$metas = $doc->getElementsByTagName('meta');     
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get og:image
    if($meta->getAttribute('property') == 'og:image')
        $ogimage = $meta->getAttribute('content');
}

// h1
$nodes = $doc->getElementsByTagName('h1');
if ($nodes->length > 0) {
    $h1 = $nodes->item(0)->textContent;
};

// h1 - many
$h1_list = $doc->getElementsByTagName('h1');
$h1_many = array();
for ($i = 0; $i < $h1_list->length; $i++)
{
    $h1_many[] = $h1_list->item($i)->textContent;
}

// h2
$nodes = $doc->getElementsByTagName('h2');
if ($nodes->length > 0) {
    $h2 = $nodes->item(0)->textContent;
};

// h2 - many
$h2_list = $doc->getElementsByTagName('h2');
$h2_many = array();
for ($i = 0; $i < $h2_list->length; $i++)
{
    $h2_many[] = $h2_list->item($i)->textContent;
}

// get description & keywords and more meta data
$metas = $doc->getElementsByTagName('meta');

for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    //get description
    if($meta->getAttribute('name') == 'description')
        $metadescription = $meta->getAttribute('content');
    //get keywords
    if($meta->getAttribute('name') == 'keywords')
        $metakeywords = $meta->getAttribute('content');
}

// get image
$nodes = $doc->getElementsByTagName('img');
if ($nodes->length > 0) {
    $image = $nodes->item(0)->getAttribute('src');
};  
  
//get images
$image_list = $doc->getElementsByTagName('img');
$images = array();

for ($i = 0; $i < $image_list->length; $i++)
    {
        $image_single = $image_list->item($i);
    
        if(!$image_single->getAttribute('src')==''){
            $images[] = $image_single->getAttribute('src');
        }
    }


    function isBlank($check)
    {
        return $check === '' ? null : $check;
    }
 
    
    //$image = $doc->getElementsByTagName('img');
    //$image = $doc->getElementsByTagName('img')->item(0)->getAttribute('src');
    //$image = $image_list->length;

        $data = [
            'url'=>$url,
            'title'=>$title,
            'h1'=>$h1,
            'h1_many'=>$h1_many,
            'h2'=>$h2,
            'h2_many'=>$h2_many,
            'ogtitle'=>$ogtitle,
            'ogdescription'=>$ogdescription,
            'ogimage'=>$ogimage,
            'metadescription'=>$metadescription,
            'metakeywords'=>$metakeywords,
            'image'=>$image,
            'image_many'=>$images,
            'showtitle' => isBlank($ogtitle) ?? isBlank($title) ?? $h1,
            'showdescription' => isBlank($ogdescription) ?? $metadescription,
            'showimage' => isBlank($ogimage) ?? $image,
            'domain'=>$website_domain,
            'html'=> htmlspecialchars($html),
                ];
            
    return $data;
    //return $data_image;
        
    }

}


?>