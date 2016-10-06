<?php
class eoearth_redirect_controller
{
    function __construct()
    {
        $this->non_html_extensions = array("pdf", "xls", "xlsx", "csv", "txt", "doc", "png", "ppt", "pptx", "ods", "jp2", "webp", "svg", "png", "jpg", "jpeg", "gif", "bmp");
    }

    function search_path($path)
    {
        $paths = array();
        $path = trim($path);

        //-start
        /*
        from website: http://www.eoearth.org/view/article/51cbf1ef7896bb431f6a73ac/?topic=51cbfc78f702fc2ba8129e5f
        from dbase:                          view/article/51cbed2d7896bb431f6904d6/index-topic=51cbfc77f702fc2ba8129ab9.html
        */
        if(stripos($path, "/?topic=") !== false) //string is found
        {
            $path = str_replace("/?topic=", "/index-topic=", $path) . ".html";
        }
        //-end
        
        //with or without starting '/'
        if(substr($path, 0, 1) == "/")
        {
            $paths[] = trim(substr($path, 1, strlen($path)));   //first option is the one without "/"   -- saved from dbase
            $paths[] = $path;                                   //2nd option is the one with "/"
        }
        else $paths[] = $path;

        $final_paths = array();
        foreach($paths as $path)
        {
            //with or without 'index.html'
            if(substr($path, -1) == "/")
            {
                $final_paths[] = $path . "index.html";    //first option is the one with 'index.html'     -- saved from dbase
                $final_paths[] = $path;                   //2nd option is the one without 'index.html'
            }
            else $final_paths[] = $path;
        }

        foreach($final_paths as $path)
        {
            // echo "<br>searching...[$path]"; //debug
            if($title = self::find_title_from_path($path)) return $title;
        }
        
        //start of another round...
        
        //if from website is: http://www.eoearth.localhost/topics/view/51cbfc78f702fc2ba8129e70 --- without ending '/'
        foreach($final_paths as $path)
        {
            if(substr($path, -1) != "/")
            {
                $path .= "/";                                                               //lets add '/'
                
                // echo "<br>searching...[$path" . "index.html]"; //debug                   //first option
                if($title = self::find_title_from_path($path."index.html")) return $title;

                // echo "<br>searching...[$path]"; //debug                                  //2nd option
                if($title = self::find_title_from_path($path)) return $title;
            }
        }
    }
    
    function find_title_from_path($path)
    {
        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        if(!$conn) die("Connection failed: " . mysqli_connect_error());
        $sql = "SELECT title FROM redirects WHERE path = '$path'";
        echo "<br>$path<br>";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                mysqli_close($conn);
                return $row["title"];
            }
        }
        mysqli_close($conn);
    }

    function create_url($title)
    {
        // start -- for non-HTML pages
        $path_info = pathinfo($_SERVER['REQUEST_URI']);
        if(in_array(@$path_info['extension'], $this->non_html_extensions))
        {
            return "http://" . WIKI_DOMAIN . "/" . MEDIAWIKI_FOLDER . "/wiki/File:" . $path_info['basename'];
            // "http://editors.eol.localhost/eoearth/wiki/File:Nasa-part-1.pdf"
        }
        // end -- for non-HTML pages
        
        return "http://" . WIKI_DOMAIN . "/" . MEDIAWIKI_FOLDER . "/wiki/" . $title;
    }
    
    function create_old_url()
    {
        return "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    
    function create_search_page_url()
    {
        // http://editors.eol.localhost/eoearth/index.php?title=Special%20Search&profile=default&search=&fulltext=Search
        return "http://" . WIKI_DOMAIN . "/" . MEDIAWIKI_FOLDER . "/wiki/" . "Special:Search";
    }
    
    function render_template($filename, $variables)
    {
        extract($variables); //makes the array index value to become a variable e.g. array("a" => "dog") becomes $a = "dog";
        ob_start();
        require('templates/redirect/' . $filename . '.php');
        $contents = ob_get_contents(); 
        ob_end_clean();
        return $contents;
    }

}
?>
