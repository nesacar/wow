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
                        <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:15px;padding-top:0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                                <tr>

                                    <td
                                            style="vertical-align:top;width:600px;"
                                    >
                            <![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                <tr>
                                                    <td style="width:550px;">
                                                        <a href="{{ url($post->link . '?news=' . $newsletter->verification . '&email=' . $subscriber->verification) }}" target="_blank">
                                                            <img alt="{{ $post->title }}" height="250px" src="{{ url($post->image) }}" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="550" />
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0;padding-bottom:0;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                                <div class="article">
                                                    <h2 class="heading">{{ $post->title }}</h2>
                                                    <p>{{ substr($post->short, 0, 250) }}...</p>
                                                    <div style="text-align: right;"> <a href="{{ url($post->link) }}">Read more &gt;</a> </div>
                                                </div>
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