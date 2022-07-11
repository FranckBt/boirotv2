<?php
function redirect($page, $arguments = array()){
    $args = '';
    if(!empty($arguments)){
        foreach ($arguments as $key => $value) {
            $args .= "&$key=$value";
        }
    }
    $url="index.php?page=" . $page . $args;
    return $url;
}

function redirectJS($page){
    $url = "<script>document.location.href='";
    $url.= redirect($page);
    $url .= "'</script>";

    echo $url;
}

function redirectLink($page, $arguments = array(), $link = 'Lien', $title =''){
    if($title){
        $title = "title='" . $title . "' ";
    }

    $args = '';
    if(!empty($arguments)){
        foreach ($arguments as $key => $value) {
            $args .= "&$key=$value";
        }
    }
    $url="<a " . $title . "href='index.php?page=" . $page . $args . "'>" . $link . "</a>";
    return $url;
}
