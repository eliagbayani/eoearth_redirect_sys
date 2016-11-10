<script type="text/javascript">
function countdown() 
{
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=1) 
    {
        location.href = '<?php echo $url ?>';
    }
    else
    {
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
}
setInterval(function(){ countdown(); },1000);
</script>
