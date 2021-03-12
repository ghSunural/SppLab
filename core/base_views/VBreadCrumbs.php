<?php

$sitemap = json_decode(file_get_contents('core/sitemap.json'), true);
$node_name = $this->page_description['uripattern'];
$tree_nodes_names = getTree($sitemap, $node_name);

displayBreadCrumbs($sitemap, $tree_nodes_names);

//Debug::print_array($tree_nodes_names );

function displayBreadCrumbs($sitemap, $tree_nodes_names)
{
    echo "<ol class=\"breadcrumb main_text_color-2\">";
    foreach ($tree_nodes_names as $node_name) {
        //echo $sitemap[$node_name]['title'] . ' >> ';
        //  echo $node_name . ' >> ';
       echo $li = <<< EOL
        <li class="breadcrumb-item" >
        <a href="/{$node_name}">{$sitemap[$node_name]['title']}</a>
        </li>
EOL;
    }
    echo "</ol>";
}

//var_dump(getTree($sitemap, $node_name));
function getTree($sitemap, $node_name)
{

    $tree_nodes_names = [];
    while (true) {
        if ($node_name == '') {
            array_unshift($tree_nodes_names, $node_name);
            break;
        }
        array_unshift($tree_nodes_names, $node_name);
        // echo $sitemap[$node_name]['title'];
        $node_name = $sitemap[$node_name]['parent_page'];
        //
    }

    return $tree_nodes_names;
}

?>


<style>

    .breadcrumb {
        text-transform: lowercase;
    }

    .breadcrumbs-item {
        display: inline;
        font-size: .8rem;
        letter-spacing: 5px;
        font-weight: bold;
    }

    .breadcrumbs-item:hover {
        background-color: var(--main-color-dark);
        color:  var(--main-color-light);
        transition-delay: 0.5s;
    }


</style>