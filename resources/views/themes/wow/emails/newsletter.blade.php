<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title> </title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass * {
            line-height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }
        @viewport {
            width: 320px;
        }
        }
    </style>
    <!--<![endif]-->
    <!--[if mso]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <!--[if lte mso 11]>
    <style type="text/css">
        .outlook-group-fix { width:100% !important; }
    </style>
    <![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto);
    </style>
    <!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-50 {
                width: 50% !important;
            }
            .mj-column-per-100 {
                width: 100% !important;
            }
            .mj-column-per-30 {
                width: 30% !important;
            }
            .mj-column-per-70 {
                width: 70% !important;
            }
        }
    </style>
    <style type="text/css">
    </style>
    <style type="text/css">
        a {
            color: #128a88;
            text-decoration: none;
        }

        p {
            margin-bottom: 6px;
            margin-top: 0;
        }

        h2 {
            margin: 12px 0 6px;
        }

        .heading {
            font-size: 18px;
            color: #128a88;
            text-transform: uppercase;
            font-weight: normal;
        }

        .article {
            position: relative;
        }
    </style>
</head>

<body style="background-color:#e9e2d0;">
<div style="background-color:#e9e2d0;">
    <!--[if mso | IE]>
    <table
            align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
    >
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                        <tr>

                            <td
                                    style="vertical-align:bottom;width:300px;"
                            >
                    <![endif]-->
                    <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:250px;"> <a href="{{ url('/') }}" target="_blank">

                                                    <img
                                                            alt="https://www.wowmalta.com.mt/" height="auto" src="{{ url('themes/wow/img/logo.png') }}" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="250"
                                                    />

                                                </a> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>

                    </tr>

                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>

    @if(count($templates)>0)

        @foreach($templates as $template)

            @if($template->type == 'post')

                @php $post = \App\Post::find($template->item1); @endphp
                @include('themes.wow.emails.parts.leading-post')

            @elseif($template->type == 'posts')

                @php $post1 = \App\Post::find($template->item1); @endphp
                @php $post2 = \App\Post::find($template->item2); @endphp
                @include('themes.wow.emails.parts.two-parts')

            @else

                @php $banner = \App\Banner::find($template->item1); @endphp
                @include('themes.wow.emails.parts.banner')

            @endif

        @endforeach

    @endif

    <!--[if mso | IE]>
    <table
            align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
    >
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                        <tr>

                            <td
                                    style="vertical-align:middle;width:180px;"
                            >
                    <![endif]-->
                    <div class="mj-column-per-30 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:middle;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:130px;">
                                                <a href="{{ url('/') }}" target="_blank">
                                                    <img alt="https://www.wowmalta.com.mt/" height="auto" src="{{ url('themes/wow/img/logo.png') }}" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="130" />
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>

                    <td
                            style="vertical-align:middle;width:420px;"
                    >
                    <![endif]-->
                    <div class="mj-column-per-70 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:middle;" width="100%">
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <!--[if mso | IE]>
                                    <table
                                            align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    >
                                        <tr>

                                            <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://www.facebook.com/wowmalta.com.mt" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-fb.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://twitter.com/wowmalta" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-twt.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://plus.google.com/+WowMaltaTravelInfoGuideforMaltaGozoComino" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-goo.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://www.pinterest.com/wowmalta/" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-pin.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://www.instagram.com/wowmalta/" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-ins.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    <td>
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float:none;display:inline-table;">
                                        <tr>
                                            <td style="padding:4px;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:3px;width:36px;">
                                                    <tr>
                                                        <td style="font-size:0;height:36px;vertical-align:middle;width:36px;"> <a href="https://www.youtube.com/channel/UCKYEEy3c19MaGCQKbp7oU5Q" target="_blank">
                                                                <img
                                                                        height="36" src="https://www.wowmalta.com.mt/res/newsletter/nl-you.gif" style="border-radius:3px;" width="36"
                                                                />
                                                            </a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso | IE]>
                                    </td>

                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>

                    </tr>

                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>

    <table
            align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
    >
        <tr>
            <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
    <![endif]-->
    <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">
                    <!--[if mso | IE]>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                        <tr>

                            <td
                                    style="vertical-align:bottom;width:600px;"
                            >
                    <![endif]-->
                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Roboto;font-size:12px;line-height:1.5;text-align:left;color:#000000;">
                                        <p text-align="center">You have received this message because you subscribed to it on <a href="https://www.wowmalta.com.mt">https://www.wowmalta.com.mt</a>. To stop receiving this and other messages from WowMalta - Travel Info Guide for Malta, Gozo &amp;
                                            Comino, click <a href="#">HERE</a>.</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--[if mso | IE]>
                    </td>

                    </tr>

                    </table>
                    <![endif]-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <![endif]-->
</div>
</body>

</html>