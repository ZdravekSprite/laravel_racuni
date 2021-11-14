<html>
<head>
  <title>{{env('RACUNI_1')}} {{date("Y_m", strtotime($racuni->izvrsen))}}</title>
  <meta http-equiv="content-type" content="text/html;charset=iso-8859-2">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <meta http-equiv="X-UA-Compatible" content="IE=8">
  <style type="text/css" media="print">
    div.nalog {
      page-break-inside: avoid;
    }

    .printer {
      display: none;
    }

  </style>
  <link href="/css/eZaba.css" rel="stylesheet" type="text/css" media="all">
  <link href="/css/opcenito.css" rel="stylesheet" type="text/css" media="all">
  <link href="/css/SEPA_ispis.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
  <table width="800px" cellspacing="0" style="margin-bottom:10px;background: transparent; color: #000000" border="0" cellpadding="1">
    <tbody>
      <tr>
        <td align="LEFT">
          <img src="/images/LogoBlackSmall.jpg">
          <table width="100%" align="left" cellspacing="0" border="0" style="background: transparent;">
            <tr>
              <td style=" font:="" 10px="" arial;="" font-weight:="" normal;="" color:="" #000000;"="" colspan="3">
                <tbody>
                  <tr>
                    <td width="30px">&nbsp;</td>
                    <td style="font: 10px Arial; font-weight: normal; color: #000000; padding-top: 5px;" align="left">
                      10000 Zagreb, Trg bana Josipa Jelačića 10
                      <br>
                      MB: 3234495
                      <br>
                      IBAN: HR8823600001000000013
                    </td>
                    <td align="right" valign="bottom"><img class="printer" src="/images/printer.gif" style="cursor:pointer;" onclick="window.print();return false;"></td>
                  </tr>
                </tbody>
              </td>
            </tr>
          </table>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="content" style="width:800px;">
    <div class="nalog">
      <table class="greyBck" cellspacing="0" width="100%">
        <tbody>
          <tr>
            <td class="title" width="50%">IZNOS:</td>
            <td width="25%">&nbsp;</td>
            <td width="25%">&nbsp;</td>
          </tr>
          <tr>
            <td class="boldBigPrikaz borderBtm">{{number_format($racuni->iznos/100, 2, ',', '')}}&nbsp;HRK</td>
            <td class="redBoldElement borderBtm"><br></td>
            <td class="borderBtm">&nbsp;</td>
          </tr>
          <tr>
            <td class="title" colspan="3">PLATITELJ:</td>
          </tr>
          <tr>
            <td valign="top" class="boldPrikaz"><label>IBAN platitelja:</label><br>{{env('RACUNI_2')}}&nbsp;&nbsp;<br><label>Iznos kreditnog transfera u valuti računa platitelja: {{number_format($racuni->iznos/100, 2, ',', '')}}&nbsp;HRK </label><br></td>
            <td class="boldPrikaz" colspan="2"><label>Ime i adresa platitelja:</label><br>{{env('RACUNI_3')}}<br>{{env('RACUNI_4')}}<br>{{env('RACUNI_5')}}</td>
          </tr>
          <tr>
            <td class="boldPrikaz borderBtm" width="50%"><label>Model i poziv na broj platitelja:</label><br>{{env('RACUNI_6')}}&nbsp;&nbsp;</td>
            <td class="borderBtm" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td class="title" colspan="3">STVARNI DUŽNIK:</td>
          </tr>
          <tr>
            <td class="boldPrikaz borderBtm" width="50%"><label>Ime i prezime:</label><br>{{env('RACUNI_7')}}</td>
            <td class="borderBtm" colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td class="title" colspan="3">PRIMATELJ:</td>
          </tr>
          <tr>
            <td class="boldPrikaz" width="50%"><label>IBAN primatelja:</label><br>{{env('RACUNI_8')}}&nbsp;<br><label>Iznos koji se šalje primatelju plaćanja: {{number_format($racuni->iznos/100, 2, ',', '')}}&nbsp;HRK </label><br></td>
            <td class="boldPrikaz" colspan="2"><label>Naziv / ime primatelja:</label><br>{{env('RACUNI_9')}}</td>
          </tr>
          <tr>
            <td valign="top" class="boldPrikaz" rowspan="2"><label>Adresa:</label><br>{{env('RACUNI_10')}}<br>{{env('RACUNI_11')}}<br>{{env('RACUNI_12')}}</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td valign="bottom" colspan="2">Naziv banke primatelja: <span class="bold">{{env('RACUNI_13')}}</span><br>SWIFT: <span class="bold">{{env('RACUNI_14')}}</span></td>
          </tr>
          <tr>
            <td class="boldPrikaz" colspan="3"><label>Opis plaćanja:</label><br>{{$racuni->opis}}</td>
          </tr>
          <tr>
            <td class="boldPrikaz borderBtm"><label>Model i poziv na broj primatelja:</label><br>{{env('RACUNI_15')}} {{$racuni->poziv}}</td>
            <td class="boldPrikaz borderBtm"><label>Datum plaćanja:</label><br>{{date("d.m.Y.", strtotime($racuni->izvrsen))}}</td>
            <td class="borderBtm">&nbsp;</td>
          </tr>
          <tr>
            <td class="title" colspan="3">PODACI O PLAĆANJU:</td>
          </tr>
          <tr>
            <td>Referencija: <span class="bold">{{$racuni->referencija}}</span><br></td>
            <td class="boldPrikaz" colspan="2"><label>Status naloga:</label><br>Nalog je izvršen. <br>{{date("d.m.Y. \u H:i:s", strtotime($racuni->izvrsen))}}</td>
          </tr>
          <tr>
            <td class=" borderBtm">&nbsp;</td>
            <td class=" borderBtm" colspan="2">Kanal zaprimanja: <span class="bold">{{strtolower($racuni->referencija[0])}}-zaba</span></td>
          </tr>
          <tr>
            <td class="title" colspan="2">NAKNADE:</td>
          </tr>
          <tr>
            <td>Naknada za zadavanje naloga: <span>{{$racuni->naknada ? number_format($racuni->naknada/100, 2, ',', '') : '0,00'}}&nbsp;HRK</span></td>
          </tr>
          <tr></tr>
        </tbody>
      </table>
    </div><br>
  </div>
</body>
</html>
