<?php

$admin_level = $this->session->admin_grade;

$header_temp = '';

    if($admin_level < 0)
    {
        $header_temp = 'include/header_super';
    }
    elseif($admin_level > 0)
    {
        $header_temp = 'include/header_edit';
    }
    else
    {
        $header_temp = 'include/header_admin';
    }

    $this->load->view($header_temp);

?>

<script>
    //console.log('<?php echo json_encode( $_SESSION )  ?>');
    //console.log('<?php echo $this->session->admin_grade  ?>');
</script>
