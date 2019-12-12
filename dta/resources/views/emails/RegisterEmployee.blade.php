<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no"/>

    <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
    https://github.com/konsav/email-templates/  -->

    <style>
        /* Reset styles */
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

        /* Rounded corners for advanced mail clients only */
        @media all and (min-width: 560px) {
            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
        }

        /* Set color for auto links (addresses, dates, etc.) */
        a, a:hover {
            color: #127DB3;
        }
        .footer a, .footer a:hover {
            color: #999999;
        }

    </style>

    <!-- MESSAGE SUBJECT -->
    <title>Get this responsive email template</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->
<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #1d86af;
	color: #000000;"
      bgcolor="#1d86af"
      text="#000000">

<!-- SECTION / BACKGROUND -->
<!-- Set message background color one again -->
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;">

            <table border="0" cellpadding="0" cellspacing="0" align="center"
                   width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 20px;
			padding-bottom: 20px;">
                        <a target="_blank" style="text-decoration: none;" href="javascript:void(0)">
                            <img border="0" src="{{asset('assets\app\media\img\EOI360_Logo.png')}}" tyle="color: #000000;font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/>
                        </a>
                    </td>
                </tr>
            </table>

            <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="container">
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 25px;
			color: #000000;
			font-family: sans-serif;" class="header">
                        You can login using below credentials
                    </td>
                </tr>
                <!-- BUTTON -->
                <tr>
                    <td  valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;
			padding-bottom: 5px;" class="button">

                        <h4>Your Name: <strong> {{ $name }}</strong> </h4>
                        <h4>Your Login ID: <strong> {{ $email }}</strong> </h4>
                        <h4>Password: <strong> {{ $password }}</strong> </h4>

                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 20px;
			padding-bottom: 25px;
			color: #000000;
			font-family: sans-serif;" class="paragraph">
                        Have a&nbsp;question? <a href="mailto:support@ourteam.com" target="_blank" style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">support@ourteam.com</a>
                    </td>
                </tr>
                <!-- End of WRAPPER -->
            </table>
        </td>
    </tr>
</table>

</body>
</html>