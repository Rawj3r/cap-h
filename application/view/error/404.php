<style>
    .error-404{
        /* background: url(<?php echo Config::get('URL'); ?>img/404_page_missing.png) center center no-repeat;
        background-size: cover; */
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background: #eeeeee;
        padding-top: 10rem;
    }
    header{
        display: none;
    }
    </style>
<div class="error-404">
    <div class="large-4 large-centered text-center cell">
        <h3 class="subheader">Oops!</h3>
        <img src="<?php echo Config::get('URL'); ?>img/404_page_missing.png" />
        <a href="<?php echo Config::get('URL'); ?>" class="small button">Go back home</a>
    </div>
</div>