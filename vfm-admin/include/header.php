<?php
/**
 * VFM - veno file manager: include/header.php
 * site header: top banner, description
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <support@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Exclusively sold on CodeCanyon: http://bit.ly/veno-file-manager
 * @link      http://filemanager.veno.it/
 */
$parent = basename($_SERVER["SCRIPT_FILENAME"]);
$islogin = ($parent === "login.php" ? true : false);
$logoAlignment = $setUp->getConfig("align_logo");
$fulldesc = $setUp->getDescription();

if ($setUp->getConfig("show_head") !== true && $fulldesc == false) {
    return;
} ?>

            <header class="vfm-header">
                <div class="container">
            <?php
            /**
            * ************************************************
            * ******************* Top Banner *****************
            * ************************************************
            */
            if ($setUp->getConfig("show_head") == true ) { 
                if ($islogin == true) { 
                    $logopath = "images/";
                } else {
                    $logopath = "vfm-admin/images/";
                }
                ?>
                <style>
                    .head-banner > img:hover {
                        cursor: pointer;
                    }
                    .reward {
                        position: absolute;
                        top: 20%;
                        left: 31%;
                        width: 38%;
                        height: 17%;
                        padding: 1.5%;
                        border-radius: 8px;
                        /* background-color: red; */
                        background-color: #F5F5F5;
                        display: flex;
                        justify-content: space-between;
                    }
                    .reward > div {
                        width: 45%;
                        display: flex;
                        flex-direction: column;
                    }
                    .reward > div > div {
                        cursor: pointer;
                        width: 100%;
                    }
                    .reward > div > p {
                        text-align: center;
                        margin-top: 5%;
                    }
                    
                </style>
                <div class="head-banner text-<?php echo $logoAlignment; ?>">
                    <img alt="<?php print $setUp->getConfig('appname'); ?>" src="<?php print $logopath.$setUp->getConfig('logo'); ?>">
                </div>
                <div class="reward">
                    <div class="wechat">
                        <div href="https://cdn.jsdelivr.net/gh/YuJiZhao/picbed/blog/other/wxpay.png">
                            <img src="https://cdn.jsdelivr.net/gh/YuJiZhao/picbed/blog/other/wxpay.png" alt="">
                        </div>
                        <p>微信打赏</p>
                    </div>
                    <div class="alipay">
                        <div href="https://cdn.jsdelivr.net/gh/YuJiZhao/picbed/blog/other/alipay.png">
                            <img src="https://cdn.jsdelivr.net/gh/YuJiZhao/picbed/blog/other/alipay.png" alt="">
                        </div>
                        <p>支付宝打赏</p>
                    </div>
                </div>
                <script>
                    document.querySelector(".head-banner > img").onclick = function() {
                        
                    }
                </script>
            <?php
            } 
            /**
            * ************************************************
            * ****************** Description *****************
            * ************************************************
            */            

            if ($gateKeeper->isAccessAllowed() 
                && !$getcloud 
                && $islogin == false
                && $fulldesc
            ) { ?>
                <div class="description lead"><?php echo $fulldesc; ?></div> 
            <?php
            } ?>
                </div> <!-- .container -->
            </header>