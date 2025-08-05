<!DOCTYPE html>
<html>

<head>
    <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
    body {
        font-family: freeserif;
        font-weight: 100;
        font-size: 12px;
    }
    
    .english {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;       
    }
    </style>
</head>

<body>
    <p>
        <div style="text-align: center;"> <span style="font-size: 13px; font-weight: bold;">शासनमान्य वाणिज्य संस्थांमधील संगणक टंकलेखन अभ्यासक्रमाबाबत मान्यतेचे नुतनीकरण<br>तपासणी अहवालाचा नमुना</span>
            <br>
            <br> नुतनीकरण किती वर्षाकरिता : 
            <b>
                <?php if(($form_data->years=='3'))
                { ?>
                    ३ 
                <?php }elseif(($form_data->years=='5'))
                { ?>
                    ५ 
                <?php }elseif(($form_data->years=='10'))  
                { ?>
                    १० 
                <?php } ?> वर्षे<br>
            </b> (योग्य ठिकाणी <i class="fa fa-check"></i> अशी खूण करा) </div>
        <hr style="border: 1px solid black;">
        <div> विभागाचे नाव : <b class="english"><?php echo(isset($form_data->area_name) && !empty($form_data->area_name))?$form_data->area_name:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; जिल्हा : <b class="english"><?php echo(isset($form_data->district) && !empty($form_data->district))?$form_data->district:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; परिक्षा परिषद संलग्नता कोड क्रमांक : <b class="english"><?php echo(isset($form_data->msceia_code) && !empty($form_data->msceia_code))?$form_data->msceia_code:'-'?></b>
            <br> </div>
        <div> परिक्षा परिषद संलग्नता कोड क्रमांक :<b><?php echo(isset($form_data->pp_code) && !empty($form_data->pp_code))?$form_data->pp_code:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(मॅन्युअल टायपींग व लघुलेखन) </div>
        <div> (संगणक टकलेखन) </div>
        <table width="100%">
            <tr>
                <td style="width: 3%;">१.</td>
                <td>संस्थेचे नाव व पुर्ण पत्ता :</td>
                <td> <b class="english"><?php echo(isset($form_data->inst_name_addr))?$form_data->inst_name_addr:'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">२.</td>
                <td>प्राचार्याचे संपुर्ण नाव :</td>
                <td> <b class="english"><?php echo(isset($form_data->principal_name))?$form_data->principal_name:'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%; ">३.</td>
                <td style="">तपासणी अधिकारी यांची भेट दिनांक वेळ :</td>
                <td style="">दि : _____________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;वेळ :_____________</td>
            </tr>
            <tr>
                <td style="width: 3%; ">४.</td>
                <td style=" width: 40%;">टंकलेखन संस्थेस विभागीय शिक्षण उपसंचालक कार्यालयाकडुन मिळालेल्या मान्यतेचा दिनांक व जावक क्र. :</td>
                <td style=""> <b><?php echo(isset($form_data->typing_approval_no))?date('d-m-Y', strtotime($form_data->typing_approval_no)):'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%; ">५.</td>
                <td style=" width: 40%;">संगणक टायपींग अभ्यासक्रमास विभागीय शिक्षण उपसंचालक कार्यालयाकडुन मिळालेल्या मान्यतेचा दिनांक व जंवक क्र.:</td>
                <td style=""> <b><?php echo(isset($form_data->computer_approval_no))?date('d-m-Y', strtotime($form_data->computer_approval_no)):'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%; ">६.</td>
                <td colspan="2" style="">पुढीलपैकी कोणत्या विषयाची मान्यता आहे.</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td colspan="2" style="">(बेसिक कोर्स इन कॉम्प्युटर टायपींग कालावधी ६ महीने)</td>
            </tr>
        </table>
        <table width="100%" border="1" style="margin-top: 10px; margin-left: 10px; border-collapse: collapse;">
            <tr>
                <td style="text-align: center;">इंग्रजी</td>
                <td style="text-align: center;">मराठी</td>
                <td style="text-align: center;">हिंदी</td>
            </tr>
            <tr>
                <td style="text-align: center;"> <b><?php if(($form_data->eng_30=='Y'))
            { ?>
              ३० शप्रमि
            <?php }
            else { ?>
              -
            <?php } ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>
            <?php if(($form_data->eng_40=='Y'))
            { ?>
              ३० शप्रमि
            <?php }
            else { ?>
              -
            <?php } ?>
          </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td style="text-align: center;"> <b><?php if(($form_data->mar_30=='Y'))
                      { ?>
                        ३० शप्रमि
                      <?php }
                      else { ?>
                        -
                      <?php } ?>  </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php if(($form_data->mar_40=='Y'))
                      { ?>
                        ३० शप्रमि
                      <?php }
                      else { ?>
                        -
                      <?php } ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </td>
                <td style="text-align: center;"> <b><?php if(($form_data->hindi_30=='Y'))
                      { ?>
                        ३० शप्रमि
                      <?php }
                      else { ?>
                        -
                      <?php } ?>  </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php if(($form_data->hindi_40=='Y'))
                      { ?>
                        ३० शप्रमि
                      <?php }
                      else { ?>
                        -
                      <?php } ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td colspan="3" style=" padding-left: 18px;">स्पेशल स्किल इन कॉम्प्युटर टायपींग फॉर इन्स्ट्रक्टर्स (कालावधी ३ महीने)</td>
            </tr>
            <tr>
                <td style="width: 3%;">७.</td>
                <td style=" width: 40%;">संस्थेच्या कामकाजाची वेळ :</td>
                <td style=""> सकाळी <b><?php echo(isset($form_data->m_from))?$form_data->m_from:'-'?></b> ते <b><?php echo(isset($form_data->m_to))?$form_data->m_to:'-'?></b> पर्यंत
                    <br> दुपारी&nbsp; <b><?php echo(isset($form_data->a_from))?$form_data->a_from:'-'?></b> ते <b><?php echo(isset($form_data->a_to))?$form_data->a_to:'-'?></b> पर्यंत </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">प्रत्येक तासिका किती मिनिटाची आहे :</td>
                <td style=""> मिनिटे <b><?php echo(isset($form_data->time))?$form_data->time:'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">८.</td>
                <td style="">संस्थेची मालकी :</td>
                <td style=""> <b><?php if(($form_data->property=='Proprietor'))
                                  { ?>
                                    प्रोप्रायटर
                                  <?php }elseif(($form_data->property=='Partner'))
                                  { ?>
                                    भागीदार
                                  <?php }elseif(($form_data->property=='Trust'))  
                                  { ?>
                                    ट्रस्ट
                                  <?php } ?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">९.</td>
                <td style="">संस्थेची जागा :</td>
                <td style=""><b><?php if(($form_data->place_authority=='Owner'))
                                  { ?>
                                    स्वमालकाची
                                  <?php }
                                  else { ?>
                                    भाड्याची
                                  <?php } ?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">स्वमालकाची असल्यास ७/१२ , ८ अ वर नोंद आहे का ? </td>
                <td style=""><b><?php if(($form_data->place_agree=='Y'))
                                  { ?>
                                    होय
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">भाड्याची असल्यास भाडे करार आहे का ? </td>
                <td style=""><b><?php if(($form_data->agreement=='Y'))
                                  { ?>
                                    होय
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">इमारतीचा तपशील :</td>
                <td style=""> खोल्यांची संख्या <b><?php echo(isset($form_data->rooms))?$form_data->rooms:'-'?><br></b> एकूण आकारमान (चौ. फुट ) <b><?php echo(isset($form_data->area_sqft))?$form_data->area_sqft:'-'?></b> </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">जागा :</td>
                <td style="">
                    <?php if(($form_data->area_enough=='Enough'))
                                  { ?> पुरेशी आहे
                        <?php }
                                  else { ?> अपुरी आहे
                            <?php } ?>
                                </b>
                </td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">प्रकाश व्यवस्था :</td>
                <td style="">चागली/ हवेशीर &nbsp;&nbsp; <b><?php if(($form_data->light=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?></b></td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="">महीला व पुरुषांसाठी स्वतंत्र स्वच्छताग्रह : </td>
                <td style=""><b><?php if(($form_data->wr=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?></b></td>
            </tr>
            <tr>
                <td style="width: 3%;">१०.</td>
                <td style="" colspan="2">संगणक टायपींग शुल्क (किती आकारले जाते ? अभिलेख पाहुन नोंदी करा.)</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="" colspan="2"><b>बेसिक कोर्स इन कॉम्प्युटर टायपींग (कालावधी ६ महीने )</b></td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रवेश शुल्क (रूपये) &nbsp;&nbsp;&nbsp;<b><?php echo(isset($form_data->b_entry_fee))?$form_data->b_entry_fee:'-'?></b></td>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मासिक शुल्क (रूपये) <b>&nbsp;<?php echo(isset($form_data->b_monthly_fee))?$form_data->b_monthly_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;परीक्षा शुल्क (रूपये) <b>&nbsp;&nbsp;<?php echo(isset($form_data->b_exam_fee))?$form_data->b_exam_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सामग्री शुल्क (रूपये) <b>&nbsp;&nbsp;<?php echo(isset($form_data->b_lab_fee))?$form_data->b_lab_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;एकूण शुल्क (रूपये) <b>&nbsp;&nbsp;<?php echo(isset($form_data->b_total_fee))?$form_data->b_total_fee:'-'?></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td style="" colspan="2"><b>स्पेशल स्किाल इन कॉम्युटर टायपींग फॉर इन्स्ट्रक्टर्स (कालावधी ३ महीने )</b></td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;प्रवेश शुल्क (रूपये)&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->s_entry_fee))?$form_data->s_entry_fee:'-'?></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मासिक शुल्क (रूपये)&nbsp;&nbsp; <b><?php echo(isset($form_data->s_monthly_fee))?$form_data->s_monthly_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;परीक्षा शुल्क (रूपये)&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->s_exam_fee))?$form_data->s_exam_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सामग्री शुल्क (रूपये)&nbsp;&nbsp; <b><?php echo(isset($form_data->s_lab_fee))?$form_data->s_lab_fee:'-'?></b> </td>
                <td>प्रतीमाह प्रत्येक विषयास</td>
            </tr>
            <tr>
                <td style="width: 3%;">&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;एकूण शुल्क (रूपये)&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->s_total_fee))?$form_data->s_total_fee:'-'?></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 3%;"> ११.</td>
                <td colspan="2" style="">चालू स्थितीतील उपलब्ध संगणक सामग्री तपशील (आवश्यक तेथे संख्या लिहा )</td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. सर्व्हर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->server))?$form_data->server:'-'?></b> </td>
                <td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;क्लायंट&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->client))?$form_data->client:'-'?></b> </td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. स्कॅनर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->scanner))?$form_data->scanner:'-'?></b> </td>
            </tr>
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. इंकजेट प्रिटर &nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->inkjet))?$form_data->inkjet:'-'?></b> </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;लेसर प्रिंटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->laser))?$form_data->laser:'-'?></b> </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दोन्हीही &nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->both_printers))?$form_data->both_printers:'-'?></b> </td>
            </tr>
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. युपीएस &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->ups))?$form_data->ups:'-'?></b> </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;इर्न्व्हटर &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->inverter))?$form_data->inverter:'-'?></b> </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;दोन्हीही &nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->both_ups))?$form_data->both_ups:'-'?></b> </td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. हेडफोन &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->headphone))?$form_data->headphone:'-'?></b> </td>
            </tr>
            <tr>
                <td style="" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>उपरोक्त १ ते ५ मधील साधनसामग्री खरेदीच्या पावत्या : </b>&nbsp;&nbsp; <b> <?php if(($form_data->purchase=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b></td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. सर्व संगणक जोडलेले (लॅन केलेले ): &nbsp;&nbsp; <b>
            <?php if(($form_data->lan=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. इंटरनेट सुविधा उपलब्ध : &nbsp;&nbsp;<b>
            <?php if(($form_data->internet=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br>
          </td>
      </tr>
      <tr>
        <td colspan="3">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;८. ब्रॉडबँड स्पीड : &nbsp;&nbsp;
          <b><?php echo(isset($form_data->internet_speed))?$form_data->internet_speed:'-'?></b> &nbsp;केबीपीएस/ एमबीपीएस </td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;९. मागील महीन्याचे इंटरनेट शूल्क भरले आहे : &nbsp;<b>
            <?php if(($form_data->net_payment=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?>
          </b> </td>
            </tr>
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;रक्कम: &nbsp; <b><?php echo(isset($form_data->net_pmt_amount) && !empty($form_data->net_pmt_amount))?$form_data->net_pmt_amount:'-'?><br></b> </td>
                <td colspan="2"> &nbsp;दिनांक: &nbsp; <b><?php echo(isset($form_data->net_pmt_date))?date('d-m-Y', strtotime($form_data->net_pmt_date)):'-'?><br></b> </td>
            </tr>
            <tr>
                <td colspan="3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१०. मागील महीन्यातील वीजबील देयक भरले आहे काय?&nbsp;<b><?php if(($form_data->net_pmt_paid=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;रक्कम: &nbsp;
          <b><?php echo(isset($form_data->net_paid_amount))?$form_data->net_paid_amount:'-'?></b> </td>
                <td colspan="2"> &nbsp;दिनांक: &nbsp; <b><?php echo(isset($form_data->net_paid_date))?date('d-m-Y', strtotime($form_data->net_paid_date)):'-'?><br></b> </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>संगणक यंत्रासंबंधीचा अभिप्राय :</b> &nbsp; <b>
          <?php if(($form_data->satisfactory=='Satisfactory'))
                                  { ?>
                                    समाधानकारक
                                  <?php }
                                  else { ?>
                                    असमाधानकारक
                                  <?php } ?>

        </b> </td>
            </tr>
            <tr>
                <td style="" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>मान्यता आदेशाप्रमाने संगणक सेटअप आहे काय : </b>&nbsp;<b>
          <?php if(($form_data->inst_setup=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?>
        </b> </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="width: 3%;"> १२.</td>
                <td colspan="2">निर्देशकाची माहिती :</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 20px;">स्पेशल स्किल इन कॉम्प्युटर टायपींग फॉर इन्स्ट्रक्टर्स (कालावधी ३ महीने)</td>
            </tr>
        </table>
        <table width="100%" border="1" style="margin-top: 10px; margin-left: 10px; border-collapse: collapse;">
            <tr>
                <td style="text-align: center;">अ. क्र.</td>
                <td style="text-align: center;">निर्देशकाचे नाव</td>
                <td style="text-align: center;">शैक्षणिक अहर्ता</td>
                <td style="text-align: center;">व्यावसायिक अहर्ता</td>
                <td style="text-align: center;">मोबाईल क्रमांक</td>
            </tr>
            <tr>
                <td style="text-align: center;">१</td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->director_1))?$form_data->director_1:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->quali_1))?$form_data->quali_1:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->busi_1))?$form_data->busi_1:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->mob_1))?$form_data->mob_1:'-'?><br></b></td>
            </tr>
            <tr>
                <td style="text-align: center;">२</td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->director_2))?$form_data->director_2:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->quali_2))?$form_data->quali_2:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->busi_2))?$form_data->busi_2:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->mob_2))?$form_data->mob_2:'-'?><br></b></td>
            </tr>
            <tr>
                <td style="text-align: center;">३</td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->director_3))?$form_data->director_3:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->quali_3))?$form_data->quali_3:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->busi_3))?$form_data->busi_3:'-'?><br></b></td>
                <td class="english" style="font-size: 10px"><b><?php echo(isset($form_data->mob_3))?$form_data->mob_3:'-'?><br></b></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td> १३.</td>
                <td colspan="2">फर्निचर तपशील (संख्‌या लिहा):</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. खुर्च्या &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->chairs))?$form_data->chairs:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. टेबल &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->tables))?$form_data->tables:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. स्टुल्स&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->stools))?$form_data->stools:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. कपाटे&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->cupboards))?$form_data->cupboards:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. रॅकस &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->sheleves))?$form_data->sheleves:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. नोटीस बोर्डे &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->noticeboards))?$form_data->noticeboards:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. इतर साहित्य &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->item_1))?$form_data->item_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo(isset($form_data->count_1))?$form_data->count_1:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->item_2))?$form_data->item_2:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo(isset($form_data->count_2))?$form_data->count_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->item_3))?$form_data->item_3:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo(isset($form_data->count_3))?$form_data->count_3:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> १४.</td>
                <td colspan="2">संगणक अभ्यासकाची पुस्तके (संख्या): </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="english">i.</span> इग्रजी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->book_eng))?$form_data->book_eng:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="english">ii.</span> मराठी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->book_mar))?$form_data->book_mar:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="english">iii.</span> हिंदी माध्यम &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->book_hin))?$form_data->book_hin:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> १५.</td>
                <td colspan="2"> संस्थेतील दप्तर व नोंदीची स्थिती: </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;अ. विद्यार्थी विषयक &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. संगणक अभ्यासक्रमाचे स्वतंत्र जनरल रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b> <?php if(($form_data->gen_registration=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. संगणक अभ्यासक्रमाची विद्यार्थी हजेरीपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->stud_attendence=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. विद्यार्थ्याचे प्रवेश अर्ज :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->stud_application=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. चाचण्या व संस्थाअंतर्गत परीक्षांच्या नोंदी :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->ex_ent=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. परीक्षाबाबतची नोंद/रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->ex_reg=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. संस्थेच्या प्रमाणपत्राचे रेकॉर्ड :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->cert_record=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;७. विद्यार्थ्यांची दैनंदीन सराव फाईल :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->d_practice=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;८. जनरल रजिस्टर व हजेरीपत्रकांशिवाय विद्यार्थ्यांची माहीती व हजेरीची नोंद संस्थेच्या संगणकात केली आहे काय:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->comp_atd=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;ब. निदेशक व सेवक यांचेबाबत &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. हजेरीपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->att_book=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. वेतन नांदपत्रक :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->salary_slip=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. निदेशक / सेवक माहिती रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->servent_info=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;क. संस्थेशी संबंधित &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. फी जमा पुस्तके:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->fee_book=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. फी रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->fee_reg=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. जडसंग्रह नोंदवही :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->hvy_dut_book=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. खात्याशी केलेल्या पत्र व्यवहाराची फाईल :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->letter_file=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. अधिकाऱ्यांचे भेट रजिस्टर :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td> <b><?php if(($form_data->visit_reg=='Y'))
                                  { ?>
                                    आहे
                                  <?php }
                                  else { ?>
                                    नाही
                                  <?php } ?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> १६. </td>
                <td colspan="2"> मागील दोन संगणक टायपिंग परीक्षांच्या निकालांची टक्केवारीबेसिक कोर्स इन कॉम्पुटर टायपिंग: </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> (कालावधी ६ महिने) &nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->res_mon_1))?$form_data->res_mon_1:'-'?></b>&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->res_mon_2))?$form_data->res_mon_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> (परीक्षांचा नेमका महिना व वर्ष लिहा)&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->res_yr_1))?$form_data->res_yr_1:'-'?></b>&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->res_yr_2))?$form_data->res_yr_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;१. इंग्रजी संगणक टायपिंग ३०: &nbsp; <b class="english"><?php echo(isset($form_data->eng_30_1))?$form_data->eng_30_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->eng_30_2))?$form_data->eng_30_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;२. इंग्रजी संगणक टायपिंग ४०: &nbsp; <b class="english"><?php echo(isset($form_data->eng_40_1))?$form_data->eng_40_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->eng_40_2))?$form_data->eng_40_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;३. मराठी संगणक टायपिंग ३० : &nbsp; <b class="english"><?php echo(isset($form_data->mar_30_1))?$form_data->mar_30_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->mar_30_2))?$form_data->mar_30_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;४. मराठी संगणक टायपिंग ४० : &nbsp; <b class="english"><?php echo(isset($form_data->mar_40_1))?$form_data->mar_40_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->mar_40_2))?$form_data->mar_40_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;५. हिंदी संगणक टायपिंग ३०: &nbsp; <b class="english"><?php echo(isset($form_data->hin_30_1))?$form_data->hin_30_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->hin_30_2))?$form_data->hin_30_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;६. हिंदी संगणक टायपिंग ४० : &nbsp; <b class="english"><?php echo(isset($form_data->hin_40_1))?$form_data->hin_40_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->hin_40_2))?$form_data->hin_40_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>स्पेशल स्किल इन कॉम्पुटर टायपिंग फॉर इन्स्ट्रक्टर्स</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> (कालावधी ३ महिने)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->s_res_yr_1))?$form_data->s_res_yr_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->s_res_yr_2))?$form_data->s_res_yr_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->s_res_per_1))?$form_data->s_res_per_1:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->s_res_per_2))?$form_data->s_res_per_2:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>१७.</td>
                <td colspan="2">यापूर्वीच्या तपासणी अहवालातील सुचनांची / पुर्तता :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <b>
                        <?php if(($form_data->invst_info=='Y'))
                        { ?>
                            आहे
                        <?php }
                        else { ?>
                            नाही
                        <?php } ?>
                        <br>
                    </b> 
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> केली आहे काय.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> तपशील द्यावा.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b class="english"><?php echo(isset($form_data->invst_info_detail))?$form_data->invst_info_detail:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> १८. </td>
                <td colspan="2"> चालू वर्षात संगणक अभ्यासक्रमासाठी प्रवेश दिलेल्या विद्यार्थ्यांची एकूण संख्या / व पटावरील संख्या :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo(isset($form_data->stud_in_yr))?$form_data->stud_in_yr:'-'?><br></b> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> १९.</td>
                <td colspan="2"> शासनमान्य क्षमतेपेक्षा जास्त विद्यार्थी प्रविष्ट केले आहेत काय? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <b><?php if(($form_data->extra_stud=='Y'))
                        { ?>
                            होय 
                        <?php }
                        else { ?>
                            नाही
                        <?php } ?>
                        <br>
                    </b> 
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <hr style="border: 1px solid black;">
        <table width="100%">
            <tr>
                <td style="padding-top: 8px;"> <b>२०.</b></td>
                <td colspan="2" style="padding-top: 8px;"><b>तपासणी अधिकाऱ्याचे अभिप्राय/सुचना/शिफारशी</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर संस्थेची मी श्री / श्रीमती &nbsp;&nbsp;&nbsp; <b class="english" style="font-size: 10px"><?php echo(isset($form_data->officer_name))?$form_data->officer_name:'-'?></b>&nbsp;&nbsp;&nbsp;&nbsp;पदनाम &nbsp;&nbsp;&nbsp; <b class="english" style="font-size: 10px"><?php echo(isset($form_data->officer_desig))?$form_data->officer_desig:'-'?></b>&nbsp;&nbsp; प्रत्यक्ष भेट देवून संस्थेतील कागदपत्रांची साधनसामग्रीची पडताळणी केली आहे व दप्तरे / रजिस्टरमधील नोंदी तपासून पाहिल्या आहेत. </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ही माहिती खोटी आढळल्यास मी / आम्ही व्यक्तिश: जबाबदार आहे / आहोत.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;सदर पुढील नुतनीकरण मान्यता देण्यास शिफारस &nbsp;
                    <b>
                        <?php if(($form_data->officer_appro=='Y'))
                        { ?>
                            आहे 
                        <?php }
                        else { ?>
                            नाही
                        <?php } ?>
                        <br>
                    </b> 
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="padding-top: 30px;">दिनांक : <b class="english" style="font-size: 10px"><?php echo(isset($form_data->submission_date))?date('d-m-Y', strtotime($form_data->submission_date)):'-'?><br></b> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="padding-top: 10px;">स्थळ : <b class="english" style="font-size: 10px"><?php echo(isset($form_data->submission_place))?$form_data->submission_place:'-'?><br></b> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="padding-top: 50px;">तांत्रिक सहायक/डेटा एन्ट्री ऑपरेटर&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;तपासणी अधिकारी यांची स्वाक्षरी:</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>स्वाक्षरी : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;संपूर्ण नाव : <b class="english" style="font-size: 10px"><?php echo(isset($form_data->officer_name_1))?$form_data->officer_name_1:'-'?></b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>संपूर्ण नाव : <b class="english"><?php echo(isset($form_data->de_name))?$form_data->de_name:'-'?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;पदनाम व शिक्का : <b class="english" style="font-size: 10px"><?php echo(isset($form_data->officer_desig_2))?$form_data->officer_desig_2:'-'?></b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>मोबाईल क्रमांक : <b class="english"><?php echo(isset($form_data->de_mob))?$form_data->de_mob:'-'?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;मोबाईल क्रमांक : <b class="english" style="font-size: 10px"><?php echo(isset($form_data->officer_mob))?$form_data->officer_mob:'-'?></b> </td>
            </tr>
        </table>
        <hr style="border: 1px solid #3E4D5C;">
        <div> सूचना:
            <div style="padding-left: 20px;"> १. तपासणी अहवालाच्या चार प्रती तयार कराव्यात. एक स्थळप्रत तपासणी अधिकाऱ्याने स्वत:कडे ठेवावी, दुसरी प्रत संस्थेस द्यावी. तर तिसरी प्रत शिक्षणाधिकारी ( माध्य ) जि.प. / शिक्षण निरीक्षक, मुंबई (उ/द/प) यांचेकडे पाठवावी. </div>
            <div style="padding-left: 20px;"> २. तपासणी अहवालाच्या सर्व क्रमवार पृष्ठांची एकत्रित पी.डी.एफ फाइल तयार करून संबंधित संस्थेच्या <span class="english">LOGIN</span> द्वारे परीक्षा परिषदेच्या संकेतस्थळावर विहित मुदतीत अपलोड करावी. </div>
            <div style="padding-left: 20px;"> ३. तपासणी अधिकाऱ्याने संस्थेच्या लॅब मध्ये उपस्थीत राहून लॅबमधील साधनसामग्री, संस्थाचालक / प्राचार्य आणि संगणक तंत्रासह फोटो काढावा. फोटोमध्ये चारपेक्षा अधिक व्यक्ती नसाव्यात आणि तो फोटोही संस्थेच्या लॉगिण द्वारे अपलोड करावा. </div>
            <div style="padding-left: 20px;"> ४. पुढील काळात परीक्षा परिषदेकडून राज्यातील संस्थांची अचानक तपासणी केली जाईल. तपासणी त्रुटी / अपूर्णता आढळणाऱ्या संस्थांचा परीक्षा परिषदेने दिलेला संगणक अभ्यासक्रमाचा सांकेतांक (ई-प्रमाणपत्र) रद्द करण्यात येईल. तसेच अशा प्रकरणी मान्यतेच्या नुतनीकरणास शिफारस करणाऱ्या अधिकाऱ्यांविरूद्ध शिस्तभंगाची कारवाई प्रस्तावित केली जाईल. </div>
        </div>
    </p>
</body>

</html>