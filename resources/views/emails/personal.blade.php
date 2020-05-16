<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hearty Greeting</title>
    <style type="text/css">
        /***** BEST PRACTICE CSS *****//* This is included in the mobile stylesheet so that it doesn't get removed when you inline CSS for desktop */
        /* Force Hotmail to display emails at full width */
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height: 100%;
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

            /*** Divider-01 module 480px ***/
            td[class="divider01MC"] {
                width: 414px !important;
                padding-bottom: 10px !important;
            }

            td[class="divider01MC"] img {
                width: 414px !important;
                height: 7px !important;
            }

            /******* Drop the CSS marked with '480px' in the section below *******/
            /*** Featured-05 module 480px ***/
            td[class="featured05MC"] {
                width: 460px !important;
                padding-bottom: 15px !important;
            }

            td[class="featured05image"] {
                width: 460px !important;
            }

            td[class="featured05image"] img {
                width: 460px !important;
                height: auto !important;
            }

            /*** Text-03a module 480px ***/
            td[class="text03aMC"] {
                width: 414px !important;
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }

            /*** Text-03b module 480px ***/
            td[class="text03bMC"] {
                width: 414px !important;
                padding-top: 8px !important;
                padding-bottom: 8px !important;
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

            /*** Divider-01 module 320px ***/
            td[class="divider01MC"] {
                width: 270px !important;
                padding-bottom: 7px !important;
            }

            td[class="divider01MC"] img {
                width: 270px !important;
                height: 5px !important;
            }

            /******* Drop the CSS marked with '320px' in the section below *******/
            /*** Featured-05 module 320px ***/
            td[class="featured05MC"] {
                width: 300px !important;
                padding-bottom: 10px !important;
            }

            td[class="featured05image"] {
                width: 300px !important;
            }

            td[class="featured05image"] img {
                width: 300px !important;
                height: auto !important;
            }

            /*** Text-03a module 320px ***/
            td[class="text03aMC"] {
                width: 270px !important;
                padding-top: 5px !important;
                padding-bottom: 5px !important;
            }

            /*** Text-03b module 320px ***/
            td[class="text03bMC"] {
                width: 270px !important;
                padding-top: 5px !important;
                padding-bottom: 5px !important;
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

        /*** Header-05***/
        td#logoname {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        td#date, td#tagline {
            padding-bottom: 5px;
        }

        /*** Footer-07 ***/
        table.footer07linksTable {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0;
        }

    </style>
    <![endif]-->
    <!-- / Outlook 2007+ fix -->

</head>
<body style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;width: 100%;background: url('{{$message->embed(asset('img/bg.png'))}}') left top repeat">

<!------- START OVERALL WRAPPER TABLE ------->
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

<!------- START 600px WRAPPER ------->
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" class="MCwrapper">
    <tr>
        <td style="padding-top: 0;padding-bottom: 20px;margin-top: 0;margin-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">

            <!------- START FEATURED-05 MODULE ------->
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="600" class="featured05MC"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 20px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                        <table class="featured05imageTable" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="featured05image" width="600"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                    <a href="#" target="_blank"
                                       style="color: #ad77bb;text-decoration: none;">
                                        <img hspace="0" vspace="0"
                                             src="{{$message->embed(asset('img/happy_01.jpg'))}}"
                                             width="600"
                                             height="300" alt="" title=""
                                             style="border: 0;display: block;outline: none;"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!------- END FEATURED-05 MODULE ------->

            <!------- START TEXT-03a MODULE ------->
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="text03aMC" width="540"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 10px;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                        <table align="left" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="text03aDate"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 30px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;font-family: 'Lucida Sans Unicode','Lucida Grande','Lucida Sans',Tahoma,Helvetica,Arial,Verdana,sans-serif;font-size: 14px;line-height: 21px;letter-spacing: -1px;font-weight: normal;">
                                    {{\Carbon\Carbon::now()->toFormattedDateString()}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text03aGreeting"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 10px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;font-family: 'Lucida Sans Unicode','Lucida Grande','Lucida Sans',Tahoma,Helvetica,Arial,Verdana,sans-serif;font-size: 24px;line-height: 21px;letter-spacing: 1px;font-weight: normal;">
                                    My <span
                                            style="font-weight: bold;color: #FF0000;">Dear {{$usuario->getNombreCompleto()}}</span>,
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!------- END TEXT-03a MODULE ------->

            <!------- START TEXT-03b MODULE ------->
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="text03bMC" width="540"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 10px;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                        <table align="left" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="text03bBodySummary"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #777777;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;font-family: Tahoma,Helvetica,Arial,Verdana,sans-serif;font-size: 14px;line-height: 32px;letter-spacing: 0;font-weight: bold;">
                                    Hearty Greeting & Sincere Good wishes For a Sweet Person.
                                    There is no End to all The joy I’m wishing you my Dear With all my best
                                    wishes on your Birthday.
                                    <br>
                                    The Warmest Greeting come Today
                                    To Wish you nothing less then everything
                                    That’s fills your heart With special happiness again
                                    Many many happy birthday & Many many happy Returns of The Day
                                    Wish you Best of Luck.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!------- END TEXT-03b MODULE ------->

            <!------- START FEATURED-05 MODULE ------->
            <table align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="600" class="featured05MC"
                        style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 20px;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                        <table class="featured05imageTable" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="featured05image" width="600"
                                    style="margin-top: 0;margin-bottom: 0;padding-top: 0;padding-bottom: 0;color: #555555;border-collapse: collapse;padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
                                    <a href="#" target="_blank"
                                       style="color: #ad77bb;text-decoration: none;">
                                        <img hspace="0" vspace="0"
                                             src="{{$message->embed(asset('img/happy_02.jpg'))}}"
                                             width="600"
                                             height="150" alt="" title=""
                                             style="border: 0;display: block;outline: none;"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!------- END FEATURED-05 MODULE ------->

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


<!------- ******* END FOOTER-07 MODULE ******* ------->

<!------- END OVERALL WRAPPER TABLE ------->

</body>

</html>