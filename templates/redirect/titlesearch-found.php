<?php
$url     = self::create_url($title);
$old_url = self::create_old_url();
?>
<?php
/* works OK, commented because shift of scheme
<table id="redirect_table" align="center" cellpadding="15">
    <tr>
      <th colspan="2">www.eoearth.org has moved to a Wiki platform.</th>
    </tr>
    <tr>
        <td>Page found: OK</td>
        <td>: <?php echo $title ?></td>
    </tr>
    <tr>
        <td>This is the old URL</td>
        <td>: <a href="<?php echo $old_url ?>"><?php echo $old_url ?></a></td>
    </tr>
    <tr>
        <td>This is now the new URL</td>
        <td>: <a href="<?php echo $url ?>"><?php echo $url ?></a></td>
    </tr>
    <tr><td colspan="2">Please use this new URL as outlink in your website instead.</td></tr>
    <tr><td colspan="2">
    <b>You will be redirected to the new URL in <span id="counter">0</span> seconds.</b>
    </td></tr>
    <tr><td colspan="2">Or you can click now on the new URL to proceed.</td></tr>
</table>
*/
?>
<?php
// /* another option
// sleep(10); 
header("Location: $url");
// */
?>
