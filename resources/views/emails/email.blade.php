<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Happy Birthday</title>
    <style type="text/css">
        /***** BEST PRACTICE CSS *****//* This is included in the mobile stylesheet so that it doesn't get removed when you inline CSS for desktop */
        /* Force Hotmail to display emails at full width */
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
        }

        a img {
            border: none; /* remove border */
        }

        /*** Drop your chosen modules' 480px and 320px CSS below ***//*** remember not to include this when you inline your CSS ***/

        /***** MEDIA QUERIES DECLARATIONS *****/

        @media only screen and (max-width: 599px) {

            /*** Default heading styles 480px ***/
            table[class="MCwrapper"] {
                width: 460px !important;
            }

            td[class="MCwrappercell"] {
                padding-top: 23px !important;
                padding-bottom: 23px !important;
            }

            h1[class="h1"] {
                font-size: 24px !important;
                letter-spacing: -1px !important;
            }

            h2[class="h2"] {
                font-size: 21px !important;
                letter-spacing: -1px !important;
            }

            h3[class="h3"] {
                font-size: 19px !important;
                letter-spacing: -1px !important;
            }

            h4[class="h4"] {
                font-size: 17px !important;
                letter-spacing: -1px !important;
            }

            h5[class="h5"] {
                font-size: 15px !important;
                letter-spacing: -1px !important;
            }

            /*** Container / Preheader 480px ***//* keep also these in all your layouts */
            table[class="MCwrapper"] {
                width: 460px !important;
            }

            table[class="hide"], td[class="hide"], img[class="hide"], p[class="hide"] {
                display: none !important;
            }

            /*** Header-04 module 480px ***/
            td[id="logoname"] {
                padding-top: 10px !important;
                padding-left: 23px !important;
                align: left !important;
            }

            img[id="logonameImage"] {
                width: 237px !important;
                height: 41px !important;
                margin-top: -16px !important;
            }

            td[class="header04MC"] {
                padding-bottom: 7px !important;
            }

            /******* Drop the CSS marked with '480px' in the section below *******/
            /*** Featured-04 module 480px ***/
            td[class="featured04MC"] {
                width: 460px !important;
                padding-bottom: 15px !important;
            }

            td[class="featured04imageText"] {
                width: 460px !important;
            }

            td[class="featured04image"] {
                width: 284px !important;
            }

            td[class="featured04image"] a img {
                width: 284px !important;
                height: 229px !important;
            }

            td[class="featured04textBtn"] {
                width: 175px !important;
            }

            td[class="featured04title"], td[class="featured04text"], td[class="featured04button"] {
                padding-left: 15px !important;
                padding-top: 10px !important;
                padding-right: 15px !important;
                padding-bottom: 7px !important;
            }

            td[class="featured04title"] {
                font-size: 14pt !important;
                padding-bottom: 5px !important
            }

            td[class="featured04text"] {
                font-size: 13px !important;
                line-height: 18px !important;
                padding-bottom: 7px !important;
            }

            td[class="featured04text"], td[class="featured04button"] {
                padding-top: 5px !important;
            }

            /*** Text-Photo-Combo-14 module 480px ***/
            td[class="TPC14MC"] {
                padding-left: 23px !important;
                padding-right: 23px !important;
                padding-top: 23px !important;
                padding-bottom: 8px !important;
            }

            td[class="TPC14imageWrapper"] {
                padding-right: 23px !important;
                padding-bottom: 6px !important;
            }

            td[class="TPC14MC"] h2 {
                margin-bottom: 5px !important;
            }

            /*** Footer-07 module 480px ***/
            td[id="footer07MC"] {
                width: 460px !important;
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            td[id="footer07copyText"], td[id="footer07linksWrapper"] {
                width: 414px !important;
            }

            td[id="footer07logo"], td[id="footer07copyText"], td[id="footer07linksWrapper"], td[id="footer07social"], td[id="footer07connect"], td[id="footer07permRem"] {
                padding-left: 23px !important;
                padding-right: 23px !important;
            }

            td[id="footer07linksWrapper"] {
                padding-bottom: 15px !important;
            }

            td[id="footer07links"] {
                line-height: 30px !important;
                font-size: 13px !important;
            }

            td[id="footer07permRem"], td[id="footer07copyText"] span, td[id="footer07copyText"] span a {
                color: #999999 !important;
                font-size: 13px !important;
            }

            td[id="footer07permRem"] {
                font-size: 16px !important;
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }

            /******* End of 480px CSS *******/
        }

        /*** Default heading styles 320px ***/
        @media only screen and (max-width: 479px) {
            table[class="MCwrapper"] {
                width: 300px !important;
            }

            td[class="MCwrappercell"] {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            h1[class="h1"] {
                font-size: 20px !important;
                letter-spacing: -1px !important;
            }

            h2[class="h2"] {
                font-size: 18px !important;
                letter-spacing: -1px !important;
            }

            h3[class="h3"] {
                font-size: 17px !important;
                letter-spacing: -1px !important;
            }

            h4[class="h4"] {
                font-size: 16px !important;
                letter-spacing: -1px !important;
            }

            h5[class="h5"] {
                font-size: 15px !important;
                letter-spacing: -1px !important;
            }

            /*** Container / Preheader 320px ***/
            table[class="MCwrapper"] {
                width: 300px !important;
            }

            /*** Header04 module 320px ***/
            td[id="logoname"] {
                padding-top: 0 !important;
                padding-left: 15px !important;
            }

            img[id="logonameImage"] {
                width: 148px !important;
                height: 26px !important;
                margin-top: -16px !important;
            }

            td[class="header04MC"] {
                padding-bottom: 3px !important;
            }

            /******* Drop the CSS marked with '320px' in the section below *******/
            /*** Featured-04 module 320px ***/
            td[class="featured04MC"] {
                width: 300px !important;
                padding-bottom: 10px !important;
            }

            td[class="featured04image"] {
                width: 300px !important;
            }

            td[class="featured04image"] a img {
                width: 300px !important;
                height: 243px !important;
            }

            td[class="featured04textBtn"] {
                width: 300px !important;
                padding-bottom: 20px !important;
                padding-top: 5px !important;
            }

            /*** Text-Photo-Combo-14 module 320px ***/
            td[class="TPC14MC"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
                padding-top: 15px !important;
                padding-bottom: 5px !important;
            }

            td[class="TPC14imageWrapper"] {
                padding-right: 0 !important;
                width: 270px !important;
                padding-bottom: 20px !important;
            }

            td[class="TPC14MC"] h2 {
                margin-bottom: 3px !important;
            }

            /*** Footer-07 module 320px ***/
            td[id="footer07MC"] {
                width: 300px !important;
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }

            td[id="footer07logo"], td[id="footer07copyText"], td[id="footer07linksWrapper"], td[id="footer07social"], td[id="footer07connect"], td[id="footer07permRem"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            td[id="footer07links"] {
                line-height: 36px !important;
            }

            /******* End of 320px CSS *******/
        }
    </style>
    <!-- Outlook 2007+ fix -->
    <!--[if gte mso 9]>
    <style type="text/css">

        /*** Header-04 ***/
        td#logoname {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        td#date, td#tagline {
            padding-bottom: 5px;
        }

        /*** Featured-04 ***/
        table.featured04imageTable {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0;
        }

        td.featured04textBtn {
            width: 220px;
        }

        /*** Text-Photo-Combo-14 ***/
        table.TPC14imageWrapperTable {
            mso-table-lspace: 0;
            mso-table-rspace: 6pt;
        }

        td.TPC14imageWrapper {
            padding-right: 23px;
        }

        /*** Footer-07 ***/
        table.footer07linksTable {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0;
        }

    </style>
    <![endif]-->
    <!-- / Outlook 2007+ fix -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;width: 100%">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding-bottom: 50px;margin-top: 0;margin-bottom: 0;padding-top: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0}}">

            <!------- ******* START HEADER-04 MODULE ******* ------->
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td id="topSpace" class="hide"
                        style="padding-top: 10px;margin-top: 0;margin-bottom: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                        &nbsp;
                    </td>
                </tr>
            </table><!--- just some space --->

            <!------- START PRE-HEADER / BROWSER VIEW MODULE ------->
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" class="hide">
                <tr>
                    <td id="preheader" align="left" class="hide"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #ffffff;border-collapse: collapse;padding-left: 10px;padding-right: 0;margin-left: 0;margin-right: 0;background: #21409a;">
                        <p style="font-family: 'Lucida Grande','Lucida Sans Unicode','Lucida Sans',Helvetica,Arial,Verdana,sans-serif;margin-top: 0;margin-bottom: 5px;padding-top: 0;padding-bottom: 0;font-size: 12px;line-height: 150%;color: #ffffff;letter-spacing: 0;">
                            ¡Tenemos algo especial para ti!
                        </p>
                    </td>
                    <td id="preheader" align="right" class="hide"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #ffffff;border-collapse: collapse;padding-left: 10px;padding-right: 0;margin-left: 0;margin-right: 0;background: #21409a;">
                        <p style="font-family: 'Lucida Grande','Lucida Sans Unicode','Lucida Sans',Helvetica,Arial,Verdana,sans-serif;margin-top: 0;margin-bottom: 5px;padding-top: 0;padding-bottom: 0;font-size: 12px;line-height: 150%;color: #ffffff;letter-spacing: 0;">
                            We've got something special for you!
                        </p>
                    </td>
                </tr>
            </table>
            <!------- END PRE-HEADER / BROWSER VIEW MODULE------->

            <!------- START 600px WRAPPER ------->
            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" class="MCwrapper">
                <tr>
                    <td style="padding-top: 0;padding-bottom: 20px;border-bottom: 2px solid #1a79bc;margin-top: 0;margin-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;background: #ffffff;">

                        <!------- START FEATURED-04 MODULE ------->
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="600" class="featured04MC"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 20px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td class="featured04imageText" width="600"
                                                style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;border-top: 5px solid #1a79bc;border-bottom: 5px solid #1a79bc;background-color: #3e83a9;">
                                                <table class="featured04imageTable" align="left" cellpadding="0"
                                                       cellspacing="0" border="0">
                                                    <tr>
                                                        <td width="370" align="left" class="featured04image"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                            <a href="#" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/370x300_02.jpg'))}}"
                                                                     width="370" height="300" alt="" title=""
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td class="featured04textBtn" width="230" valign="top"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #fefefe;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;background-color: #4874a7;">
                                                            <table cellpadding="0" cellspacing="0" border="0">
                                                                <tr>
                                                                    <td class="featured04title"
                                                                        style="margin-top: 0;margin-bottom: 0;padding-top: 20px;padding-bottom: 15px;color: #fefefe;border-collapse: collapse;padding-left: 20px;padding-right: 20px;margin-left: 0;margin-right: 0;font-size: 22px;line-height: 1.5;letter-spacing: 1px;font-style: italic;font-family: 'Palatino Linotype',Palatino,Georgia,Times,'Times New Roman',serif;">
                                                                        “Que Dios te bendiga y cumplas muchos años mas!”
                                                                        “God bless you and many more years!”
                                                                        <br>
                                                                        <a href="#" target="_blank"
                                                                           style="color: #b1e1e6;text-decoration: none;">
                                                                            <b>{{$usuario->getNombreCompleto()}}</b>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!------- END FEATURED-04 MODULE ------->

                        <!------- START TEXT-PHOTO-COMBO-14 MODULE ------->
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="TPC14MC" width="540"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 30px;padding-bottom: 10px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">

                                    <table class="TPC14imageWrapperTable" cellpadding="0" cellspacing="0" border="0"
                                           align="left">
                                        <tr>
                                            <td width="118" align="center" class="TPC14imageWrapper"
                                                style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 10px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 30px;margin-left: 0;margin-right: 0;">
                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td align="center" class="TPC14image" valign="bottom"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;padding: 5px;">
                                                            <a href="#" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/balloons.png'))}}"
                                                                     width="108" height="108" alt="" title=""
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <h2 class="TPC14heading"
                                        style="font-size: 24px;letter-spacing: -1px;margin-bottom: 8px;font-weight: normal;font-family: 'Lucida Sans Unicode','Lucida Grande','Lucida Sans',Helvetica,Verdana,sans-serif;line-height: 100%;margin-top: 0;padding-top: 0;padding-bottom: 0;color: #555555;">
                                        Dear <a href="#" target="_blank" style="color: #f86868;text-decoration: none;">Friend</a>!
                                    </h2>

                                    <p class="TPC14paragraph" valign="top"
                                       style="font-family: Tahoma,Helvetica,Arial,Verdana,sans-serif;margin-top: 0;margin-bottom: 15px;padding-top: 0;padding-bottom: 0;font-size: 14px;line-height: 21px;color: #777777;letter-spacing: 0;">
                                        Greetings on your birthday! You have reached a new milestone. All of us at
                                        Corporation join in wishing you Happy Birthday and express our appreciation and
                                        admiration for all you have accomplished. We are confident you will continue to
                                        even greater heights. Thanks for all you do to make us look good.</p>

                                </td>
                            </tr>
                        </table>
                        <!------- END TEXT-PHOTO-COMBO-14 MODULE ------->


                    </td>
                </tr>
            </table>
            <!------- END 600px WRAPPER ------->

            <!------- ******* START FOOTER-07 MODULE ******* ------->
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="600" id="footer07MC"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 20px;padding-bottom: 30px;color: #ffffff;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;background: #21409a;">

                        <table align="left" cellpadding="0" cellspacing="0" border="0">

                            <tr>
                                <td id="footer07midWrapper" width="600"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 10px;color: #fffdfb;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">

                                    <table class="footer07linksTable" align="left" cellpadding="0" cellspacing="0"
                                           border="0">

                                        <tr>
                                            <td id="footer07copyText" width="275"
                                                style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 10px;color: #ffffff;border-collapse: collapse;padding-left: 30px;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                <span
                                                        style="font-size: 12px;line-height: 18px;letter-spacing: 0;margin-top: 0;font-family: 'Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,Helvetica,Arial,Verdana,sans-serif;color: #999999;">{{\Carbon\Carbon::now()->year}}
                                                    ,
                                                    Zona norte, Anillo Vial Km. 12
                                                    Cartagena, Colombia<br/>
                                                    <a href="https://www.google.es/maps?near=10.54431,-75.461719&geocode=CbWb8HVRhWP4FbbkoAAdqYuA-w&q=colegio&f=l&sll=10.545196,-75.46335&sspn=0.011645,0.01929&ie=UTF8&hq=colegio&hnear&ll=10.544669,-75.462127&spn=0.011645,0.01929&t=h&z=16&iwloc=A&cid=1573280303459589690"
                                                       style="color: white">
                                                        (Ver Mapa)
                                                    </a><br/>
                                                    Phone: <span
                                                            style="color: white;">+57 (5) 693 0170 Ext. 30100</span><br/>
                                                    
                                                </span>
                                            </td>
                                        </tr>
                                    </table>

                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td id="footer07connect" width="260"
                                                style="margin-top: 0;margin-bottom: 5px;padding-top: 0;padding-bottom: 10px;color: #999999;border-collapse: collapse;padding-left: 15px;padding-right: 0;margin-left: 0;margin-right: 0;font-family: 'Lucida Sans Unicode','Lucida Grande','Lucida Sans',Helvetica,Verdana,sans-serif;line-height: 100%;font-size: 18px;letter-spacing: 0;font-weight: normal;">
                                                Connect with us:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="footer07social"
                                                style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #ffffff;border-collapse: collapse;padding-left: 15px;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>

                                                        <!--- facebook --->
                                                        <td width="43" align="left"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #ffffff;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                            <a href="https://www.facebook.com/cojowa" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/facebook_32x32.png'))}}"
                                                                     width="32"
                                                                     height="32" alt="Like us on Facebook"
                                                                     title="Like us on Facebook"
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>

                                                        <!--- twitter --->
                                                        <td width="43" align="left"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                            <a href="https://twitter.com/cojowa" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/twitter_32x32.png'))}}"
                                                                     width="32"
                                                                     height="32" alt="Follow us on Twitter"
                                                                     title="Follow us on Twitter"
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>
                                                        <!--- Instagram --->
                                                        <td width="43" align="left"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                            <a href="https://instagram.com/cojowa/" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/instagram-32x32.png'))}}"
                                                                     width="32"
                                                                     height="32" alt="Follow us on Instagram"
                                                                     title="Follow us on Instragram"
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>
                                                        <td width="43" align="left"
                                                            style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                                            <a href="https://www.youtube.com/user/WEBCOJOWA" target="_blank"
                                                               style="color: #f86868;text-decoration: none;">
                                                                <img hspace="0" vspace="0"
                                                                     src="{{$message->embed(asset('img/youtube.png'))}}"
                                                                     width="32"
                                                                     height="32" alt="Follow us on Youtube"
                                                                     title="Follow us on Youtube"
                                                                     style="border: 0;display: block;outline: none;"></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>