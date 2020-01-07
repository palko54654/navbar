<?php
require('db.php');
ini_set('memory_limit', '2048M');
ini_set('upload_max_filesize', '2048M');
ini_set('post_max_size', '2048M');
ini_set('file_uploads', 'On');
ini_set('max_execution_time', '9000');

$xml = file_get_contents('https://www.glami.sk/sitemap/sk/sitemap.xml');
file_put_contents('./data/products.xml', $xml);

$xmldata = @simplexml_load_file('./data/products.xml');
 
     if(!$xmldata)
  { 
   
    echo '<b>Preskakujem nezdarilo sa</b>';
  }
else  { 

  mysqli_query($db, 'CREATE TABLE IF NOT EXISTS produkty_z LIKE produkty');
mysqli_query($db, 'TRUNCATE TABLE produkty_z'); 
mysqli_query($db, 'ALTER TABLE produkty_z ENGINE = MYISAM');



   foreach($xmldata->product as $item)  
          {
     
         $nazovcek = (string) trim($item->PRODUCTNAME);
           $img = (string) trim($item->IMGURL);
           $link = (string) trim($item->URL);
            $cena = (string) trim($item->PRICE_VAT); 
             $kategorie = (string) trim($item->CATEGORYTEXT);  
$vyrobca  =  (string) trim($item->MANUFACTURER);     
                  $popisproduktov  =  (string) trim($item->DESCRIPTION);

$popisproduktu = strip_tags($popisproduktov, '<ul><li><h3><h4><h5><h6><p><br><u><i><b><strong><span>');

$kategoria =str_replace('&gt;', '|',$kategorie);
$zoznam = array(">", "%","-","+","*","/",".","!",",","\"","'","?","&","#");
$nazov = str_replace($zoznam, " ", $nazovcek);


              mysqli_query($db, 'INSERT INTO produkty_z(ID, PRODUCTNAME, IMGURL, URL , PRICE_VAT,  MANUFACTURER, CATEGORYTEXT, DESCRIPTION ) 
                VALUES(NULL,"'.mysqli_real_escape_string($db, $PRODUCTNAME).'","'
                  .mysqli_real_escape_string($db, $IMGURL).'","'.mysqli_real_escape_string($db, $URL)
                  .'","'.mysqli_real_escape_string($db, $PRICE_VAT).'", "'.mysqli_real_escape_string($db, $MANUFACTURER).'", "'.mysqli_real_escape_string($db, $CATEGORYTEXT).'", "'.mysqli_real_escape_string($db, $DESCRIPTION).'")') or die(mysqli_error($db));
             
}

 mysqli_query($db, 'CREATE TABLE IF NOT EXISTS produkty_b LIKE produkty_z');
mysqli_query($db, 'TRUNCATE TABLE produkty_b'); 
mysqli_query($db, 'INSERT INTO produkty_b SELECT * FROM produkty_z group by IMGURL');
mysqli_query($db, 'DROP TABLE produkty_z');
mysqli_query($db, 'ALTER TABLE produkty_b ENGINE = INNODB');
mysqli_query($db, 'ALTER TABLE produkty_b ADD FULLTEXT vyha (PRODUCTNAME, MANUFACTURER, CATEGORYTEXT)');
mysqli_query($db, 'ALTER TABLE produkty_b ADD FULLTEXT vyhlb (PRODUCTNAME)');
mysqli_query($db, 'ALTER TABLE produkty_b ADD FULLTEXT vyhlc (CATEGORYTEXT)');
mysqli_query($db, 'START TRANSACTION');
mysqli_query($db, 'DROP TABLE produkty');
mysqli_query($db, 'ALTER TABLE produkty_b RENAME TO produkty_z');
mysqli_query($db, 'COMMIT');

}
?>