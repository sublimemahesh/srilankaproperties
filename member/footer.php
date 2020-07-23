<div id="footer"">

    <div class=" container ">
        <div class=" row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="text-center">
            <p class="footer-font copy-text footer-m"> All rights reserved by srilankaproperties.lk. Designed By <a href="https://synotec.lk">Synotec Holdings (pvt) Ltd</a>.</p>
        </div>
    </div>
</div>
</div>
</div>
<?php
$F_MEMBER = New Member($_SESSION["m_id"]);
$check_empty_basic_data = $F_MEMBER->checkEmptyBasicData();
?>
<input type="hidden" id="member_id" value="<?php echo $F_MEMBER->id; ?>" />
<input type="hidden" id="email_verified" value="<?php echo $F_MEMBER->email_verified; ?>" />
<input type="hidden" id="basic_data_verify" value="<?php echo $check_empty_basic_data; ?>" />