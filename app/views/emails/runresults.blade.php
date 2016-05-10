<?php
?>
{{-- <html>
<head>
</head>
<body>
<h1>Results for {{{$results['run']['user_input']['run_name']}}}</h1>
<h2>Zip Code: {{{$results['run']['user_input']['zipcode']}}}</h2>
<h2>Gross floor area: {{{$results['run']['user_input']['gross_roof_area']}}}</h2>
<h2>Your annual bill: {{{$results['run']['user_input']['energy_data']['elec']['cost']['total']}}}</h2>
<h3></h3>
</body>
</html> --}}



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <meta name="viewport" content="width=device-width">
    <title> </title>
    <style type="text/css">
.btn a:hover,
.footer__links a:hover {
  opacity: 0.8;
}
.wrapper .footer__share-button:hover {
  color: #ffffff !important;
  opacity: 0.8;
}
a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important;
}
.column {
  padding: 0;
  text-align: left;
  vertical-align: top;
}
.mso .font-avenir,
.mso .font-cabin,
.mso .font-open-sans,
.mso .font-ubuntu {
  font-family: sans-serif !important;
}
.mso .font-bitter,
.mso .font-merriweather,
.mso .font-pt-serif {
  font-family: Georgia, serif !important;
}
.mso .font-lato,
.mso .font-roboto {
  font-family: Tahoma, sans-serif !important;
}
.mso .font-pt-sans {
  font-family: "Trebuchet MS", sans-serif !important;
}
.mso .footer p {
  margin: 0;
}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
  .fblike {
    background-image: url(https://i7.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
  }
  .tweet {
    background-image: url(https://i8.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
  }
  .linkedinshare {
    background-image: url(https://i10.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
  }
  .forwardtoafriend {
    background-image: url(https://i9.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
  }
}
@media only screen and (max-width: 620px) {
  .wrapper .size-18,
  .wrapper .size-20 {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  .wrapper .size-22 {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  .wrapper .size-24 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  .wrapper .size-26 {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  .wrapper .size-28 {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  .wrapper .size-30 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  .wrapper .size-32 {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  .wrapper .size-34,
  .wrapper .size-36 {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  .wrapper .size-40 {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  .wrapper .size-44 {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  .wrapper .size-48 {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  .wrapper .size-56 {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  .wrapper .size-64 {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  .divider {
    Margin-left: auto !important;
    Margin-right: auto !important;
  }
  .btn a {
    display: block !important;
    font-size: 14px !important;
    line-height: 24px !important;
    padding: 12px 10px !important;
    width: auto !important;
  }
  .btn--shadow a {
    padding: 12px 10px 13px 10px !important;
  }
  .image img {
    height: auto;
    width: 100%;
  }
  .layout,
  .column,
  .preheader__webversion,
  .header td,
  .footer,
  .footer__left,
  .footer__right,
  .footer__inner {
    width: 320px !important;
  }
  .preheader__snippet,
  .layout__edges {
    display: none !important;
  }
  .preheader__webversion {
    text-align: center !important;
  }
  .layout--full-width {
    width: 100% !important;
  }
  .layout--full-width tbody,
  .layout--full-width tr {
    display: table;
    Margin-left: auto;
    Margin-right: auto;
    width: 320px;
  }
  .column,
  .layout__gutter,
  .footer__left,
  .footer__right {
    display: block;
    Float: left;
  }
  .footer__inner {
    text-align: center;
  }
  .footer__links {
    Float: none;
    Margin-left: auto;
    Margin-right: auto;
  }
  .footer__right p,
  .footer__share-button {
    display: inline-block;
  }
  .layout__gutter {
    font-size: 20px;
    line-height: 20px;
  }
  .layout--no-gutter.layout--has-border:not(.layout--full-width),
  .layout--has-gutter.layout--has-border .column__background {
    width: 322px !important;
  }
  .layout--has-gutter.layout--has-border {
    left: -1px;
    position: relative;
  }
}
@media only screen and (max-width: 320px) {
  .border {
    display: none;
  }
  .layout--no-gutter.layout--has-border:not(.layout--full-width),
  .layout--has-gutter.layout--has-border .column__background {
    width: 320px !important;
  }
  .layout--has-gutter.layout--has-border {
    left: 0 !important;
  }
}

</style>
    
  <!--[if !mso]><!--><style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);
</style><link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400" rel="stylesheet" type="text/css"><!--<![endif]--><style type="text/css">
body,.wrapper{background-color:#f5f7fa}.wrapper h1{color:#00b0f0;font-size:26px;line-height:34px}.wrapper h1{}.wrapper h1{font-family:Lato,Tahoma,sans-serif}.mso .wrapper h1{font-family:Tahoma,sans-serif !important}.wrapper h2{color:#00b0f0;font-size:20px;line-height:28px}.wrapper h2{}.wrapper h2{font-family:Lato,Tahoma,sans-serif}.mso .wrapper h2{font-family:Tahoma,sans-serif !important}.wrapper h3{color:#434547;font-size:16px;line-height:24px}.wrapper a{color:#5c91ad}.wrapper a:hover{color:#375a6c !important}@media only screen and (max-width: 620px){.wrapper h1{}.wrapper h1{font-size:22px;line-height:31px}.wrapper h2{}.wrapper h2{font-size:17px;line-height:26px}.wrapper h3{}.wrapper p{}}.column,.column__background td{color:#60666d;font-size:14px;line-height:21px}.column,.column__background td{font-family:"Open Sans",sans-serif}.mso .column,.mso .column__background 
td{font-family:sans-serif !important}.border{background-color:#b1c1d8}.layout--no-gutter.layout--has-border:not(.layout--full-width),.layout--has-gutter.layout--has-border .column__background,.layout--full-width.layout--has-border{border-top:1px solid #b1c1d8;border-bottom:1px solid #b1c1d8}.wrapper blockquote{border-left:4px solid #b1c1d8}.divider{background-color:#b1c1d8}.wrapper .btn a{color:#fff}.wrapper .btn a{font-family:"Open Sans",sans-serif}.mso .wrapper .btn a{font-family:sans-serif !important}.wrapper .btn a:hover{color:#fff !important}.btn--flat a,.btn--shadow a,.btn--depth a{background-color:#5c91ad}.btn--ghost a{border:1px solid #5c91ad}.preheader--inline,.footer__left{color:#b9b9b9}.preheader--inline,.footer__left{font-family:"Open Sans",sans-serif}.mso .preheader--inline,.mso .footer__left{font-family:sans-serif !important}.wrapper .preheader--inline a,.wrapper 
.footer__left a{color:#b9b9b9}.wrapper .preheader--inline a:hover,.wrapper .footer__left a:hover{color:#b9b9b9 !important}.header__logo{color:#c3ced9}.header__logo{font-family:Roboto,Tahoma,sans-serif}.mso .header__logo{font-family:Tahoma,sans-serif !important}.wrapper .header__logo a{color:#c3ced9}.wrapper .header__logo a:hover{color:#859bb1 !important}.footer__share-button{background-color:#7b7c7d}.footer__share-button{font-family:"Open Sans",sans-serif}.mso .footer__share-button{font-family:sans-serif !important}.layout__separator--inline{font-size:20px;line-height:20px;mso-line-height-rule:exactly}
</style><meta name="robots" content="noindex,nofollow"></meta>
<meta property="og:title" content="Wattbott"></meta>
</head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
  <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f5f7fa;">
<!--<![endif]-->
    <div class="wrapper" style="background-color: #f5f7fa;">
      <table style='border-collapse: collapse;table-layout: fixed;color: #b9b9b9;font-family: "Open Sans",sans-serif;' align="center">
        <tbody><tr>
          <td class="preheader__snippet" style="padding: 10px 0 5px 0;vertical-align: top;width: 280px;">
            <p style="Margin-top: 0;Margin-bottom: 0;font-size: 12px;line-height: 19px;">Your Wattbott results are in!</p>
          </td>
          <td class="preheader__webversion" style="text-align: right;padding: 10px 0 5px 0;vertical-align: top;width: 280px;">
            
          </td>
        </tr>
      </tbody></table>
      
      <table class="layout layout--no-gutter" style="border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;" align="center" emb-background-style>
        <tbody><tr>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 600px;'>
    
        <div class="image" style="font-size: 12px;font-style: normal;font-weight: 400;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="display: block;border: 0;max-width: 783px;" src="https://i1.createsend1.com/ei/d/30/05F/C3C/222853/csfinal/wattbottheader1.png" alt="" width="600" height="121">
        </div>
      
          </td>
        </tr>
      </tbody></table>
  
      <div style="font-size: 20px;line-height: 20px;mso-line-height-rule: exactly;">&nbsp;</div>
    
      <table class="layout layout--no-gutter" style="border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;" align="center" emb-background-style>
        <tbody><tr>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 600px;'>
    
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <div style="line-height:10px;font-size:1px">&nbsp;</div>
    </div>
    
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <h2 class="size-24" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #00b0f0;font-size: 24px;line-height: 32px;font-family: Lato,Tahoma,sans-serif;text-align: center;"><strong>Check out those results!</strong></h2><p class="size-16" style="Margin-top: 16px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;">Thanks for choosing Wattbott, the first step towards a greener building! We've attached a PDF of your results.&nbsp;</p>
    </div>
    
          </td>
        </tr>
      </tbody></table>
  
      <table class="layout layout--no-gutter" style="border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;" align="center" emb-background-style>
        <tbody><tr>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 200px;'>
      
        <div class="image" style="font-size: 12px;font-style: normal;font-weight: 400;" align="center">
          <img style="display: block;border: 0;max-width: 158px;" src="https://i2.createsend1.com/ei/d/30/05F/C3C/222853/csfinal/wattbott1.png" alt="" width="158" height="163">
        </div>
      
          </td>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 400px;'>
      
          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <p style="Margin-top: 0;Margin-bottom: 20px;">
    </div>
      
          <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat" style="text-align:left;">
        <![if !mso]><a style="border-radius: 4px;display: inline-block;font-weight: bold;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #f5f7fa !important;background-color: #00b0f0;font-family: Lato, Tahoma, sans-serif;font-size: 12px;line-height: 22px;padding: 10px 28px;" href="{{ action('RunsController@show',$results->id)}}">Edit your property info</a><![endif]>
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://wattbott.createsend1.com/t/d-l-tytyuil-l-r/" style="width:178px" arcsize="10%" fillcolor="#00B0F0" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,9px,0px,9px"><center style="font-size:12px;line-height:22px;color:#F5F7FA;font-family:Tahoma,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">Edit your property info</center></v:textbox></v:roundrect><![endif]--></div>
    </div>
      
          </td>
        </tr>
      </tbody></table>
  
      <div style="font-size: 20px;line-height: 20px;mso-line-height-rule: exactly;">&nbsp;</div>
    
      <table class="layout layout--no-gutter" style="border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;" align="center" emb-background-style>
        <tbody><tr>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 600px;'>
    
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
            	<h2 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #00b0f0;font-size: 20px;line-height: 28px;font-family: Lato,Tahoma,sans-serif;">
            		Estimated ROI: <span style="color:#006400;"><strong>{{ round($results['run']['user_output']['pv']['roi'], 1) }} years</strong></span>
            	</h2>
            	<h2 style="Margin-top: 16px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #00b0f0;font-size: 20px;line-height: 28px;font-family: Lato,Tahoma,sans-serif;">
            		Yearly savings with a PV system: <span style="color:#006400;"><strong>{{ round($results['run']['user_output']['pv']['percent_savings']) }}%</strong></span>
            	</h2>
            </div>
          </td>
        </tr>
      </tbody></table>
  
      <div style="font-size: 20px;line-height: 20px;mso-line-height-rule: exactly;">&nbsp;</div>
    
      <table class="layout layout--no-gutter" style="border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;" align="center" emb-background-style>
        <tbody><tr>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 200px;'>
      
        <div class="image" style="font-size: 12px;font-style: normal;font-weight: 400;" align="center">
          <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top gnd-corner-image-bottom" style="display: block;border: 0;max-width: 300px;" src="https://i3.createsend1.com/ei/d/30/05F/C3C/222853/csfinal/solarpanels2.jpg" alt="" width="200" height="200">
        </div>
      
          </td>
          <td class="column" style='padding: 0;text-align: left;vertical-align: top;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;width: 400px;'>
      
          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <h2 style="Margin-top: 0;Margin-bottom: 16px;font-style: normal;font-weight: normal;color: #00b0f0;font-size: 20px;line-height: 28px;font-family: Lato,Tahoma,sans-serif;"><strong>Take the next step!</strong></h2>
    </div>
      
          <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat" style="text-align:left;">
        <![if !mso]><a style="border-radius: 4px;display: inline-block;font-weight: bold;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #f5f7fa !important;background-color: #00b0f0;font-family: Lato, Tahoma, sans-serif;font-size: 12px;line-height: 22px;padding: 10px 28px;" href="http://dbhms.com/">Find a solar provider in your area</a><![endif]>
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://wattbott.createsend1.com/t/d-l-tytyuil-l-y/" style="width:231px" arcsize="10%" fillcolor="#00B0F0" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,9px,0px,9px"><center style="font-size:12px;line-height:22px;color:#F5F7FA;font-family:Tahoma,sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">Find a solar provider in your area</center></v:textbox></v:roundrect><![endif]--></div>
    </div>
      
          </td>
        </tr>
      </tbody></table>
  
      <div style="font-size: 9px;line-height: 9px;mso-line-height-rule: exactly;">&nbsp;</div>
    
      <table class="footer" style="border-collapse: collapse;table-layout: fixed;Margin-right: auto;Margin-left: auto;border-spacing: 0;width: 560px;" align="center">
        <tbody><tr>
          <td style="padding: 0 0 40px 0;">
            <table class="footer__right" style="border-collapse: collapse;table-layout: auto;border-spacing: 0;" align="right">
              <tbody><tr>
                <td class="footer__inner" style="padding: 0;">
                  
                  
                  
                  
<p style="Margin-top: 0;Margin-bottom: 5px;mso-line-height-rule: exactly;line-height: 26px;"><![if !mso]><a class="footer__share-button forwardtoafriend" style='background-image: url(https://i3.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward.png);background-color: #7b7c7d;font-family: "Open Sans",sans-serif;text-decoration: none;transition: opacity 0.1s ease-in;color: #ffffff;background-repeat: no-repeat;background-size: 200px 56px;border-radius: 2px;display: block;font-size: 11px;font-weight: bold;line-height: 11px;padding: 8px 11px 7px 28px;text-align: left;' href="http://wattbott.forwardtomyfriend.com/d-l-2AD73FFF-tytyuil-l-i" left-align-text="true">Forward</a><![endif]><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://wattbott.forwardtomyfriend.com/d-l-2AD73FFF-tytyuil-l-i" style="width:81px" arcsize="8%" fill="t" stroke="f"><v:fill 
type="tile" src="https://i3.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward.png" color="#7B7C7D"></v:fill><v:textbox style="mso-fit-shape-to-text:t" inset="27px,7px,0,6px"><p style="font-size:11px;line-height:11px;color:#FFFFFF;font-family:sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:-1px">Forward</p></v:textbox></v:roundrect><![endif]--></p>
                </td>
              </tr>
            </tbody></table>
            <table class="footer__left" style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;color: #b9b9b9;font-family: "Open Sans",sans-serif;width: 380px;'>
              <tbody><tr>
                <td class="footer__inner" style="padding: 0;font-size: 12px;line-height: 19px;">
                  
                  <div>
                    <div>Wattbott, Inc.
                    	<br>
                    	127 Princess Pass
                    	<br>
                    	San Antonio, TX 78212</div>
                  </div>
                  <div class="footer__permission" style="Margin-top: 18px;">
                    
                  </div>
                  <div>
                    <a style="text-decoration: underline;transition: opacity 0.1s ease-in;color: #b9b9b9;" href="http://wattbott.createsend1.com/t/d-u-tytyuil-l-d/">Unsubscribe</a>
                  </div>
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>      
    </div>
  <img style="visibility: hidden !important; display: block !important; height:1px !important; width:1px !important; border: 0 !important; margin: 0 !important; padding: 0 !important" src="https://wattbott.createsend1.com/t/d-o-tytyuil-l/o.gif" width="1" height="1" border="0" alt="">
</body>
</html>