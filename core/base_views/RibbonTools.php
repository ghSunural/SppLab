<?php
?>


<div class="custom-padding">
    <nav>
        <div class="logo">Logo</div>

        <ul class="menu-area">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        outline: 0;
        box-sizing: border-box;
    }
    body {

        -webkit-background-size:cover;
        background-size:cover;
        background-position: center center;
        height: 100vh;
    }
    .menu-area li a {
        text-decoration: none;
    }

    .menu-area li {
        list-style-type: none;
    }

    .custom-padding{
        padding-top: 25px;
    }

    nav {
        position: relative;
        width: calc(100% - 60px);
        margin: 0 auto;
        padding: 10px 0;
        background: #333;
        z-index: 1;
        text-align: right;
        padding-right: 2%;
    }

    .logo {
        width: 15%;
        float: left;
        text-transform: uppercase;
        color: #fff;
        font-size: 25px;
        text-align: left;
        padding-left: 2%;
    }

    .menu-area li {
        display: inline-block;
    }

    .menu-area a {
        color: #fff;
        font-weight: 300;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: block;
        padding: 0 25px;
        font-size: 14px;
        line-height: 30px;
        position: relative;
        z-index: 1;
    }
    .menu-area a:hover {
        background: tomato;
        color: #fff;
    }

    .menu-area a:hover:after {
        transform: translateY(-50%) rotate(-35deg);
    }

    nav:before {
        position: absolute;
        content: '';
        border-top: 10px solid #333;
        border-right: 10px solid #333;
        border-left: 10px solid transparent;
        border-bottom: 10px solid transparent;
        top: 100%;
        left: 0;
    }

    nav:after {
        position: absolute;
        content: '';
        border-top: 10px solid #333;
        border-left: 10px solid #333;
        border-right: 10px solid transparent;
        border-bottom: 10px solid transparent;
        top: 100%;
        right: 0;
    }







</style>
