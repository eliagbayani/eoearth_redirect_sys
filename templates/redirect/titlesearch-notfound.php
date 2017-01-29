<?php
$old_url         = self::create_old_url();
$search_page_url = self::create_search_page_url();
?>
<?php
/* works OK, commented because shift of scheme
<table id="redirect_table" align="center" cellpadding="15">
    <tr>
      <th colspan="2">www.eoearth.org has moved to a Wiki platform.</th>
    </tr>
    <tr>
        <td colspan="2" id="alert">Page not found !</td>
    </tr>
    <tr>
        <td>This is the URL you tried to search</td>
        <td>: <a href="<?php echo $old_url ?>"><?php echo $old_url ?></a></td>
    </tr>
    <tr>
        <td width="32%">Please use this page to search the Wiki and find the page you are looking for.</td>
        <td>: <a href="<?php echo $search_page_url ?>"><?php echo $search_page_url ?></a></td>
    </tr>
</table>
*/
?>
<?php
// /* another option
// sleep(10); 
header("Location: $search_page_url");
// */
?>
