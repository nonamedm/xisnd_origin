
<script>
    if (/(iPhone|iPad|iPod|iOS|Android)/i.test(navigator.userAgent))
    { //移动端
        window.location.href= "/home_mobile.html";
    }
    else
    {
        window.location.href= "/home_pc.html";
    }
</script>