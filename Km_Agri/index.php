<?php
require('nav.php');
require('sec_nav.php');

if(isset($_SESSION['name']))
{
    if($_SESSION['des']==0)
    {   
        require('home.php');
        
    }else if($_SESSION['des']==1)
    {
        require('home.php');
    }else
    {
        require('dash1.php');
    }

}else{
    require('home.php');
}

?>