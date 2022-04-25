<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Clearance Form</title>
      <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
      <style>
         @page {
            size: 14in 8.5in;
            background: red;
         }

         @media print {
            body {
               width: 816px;
               height: 1344px;
            }

            @page {
               size: 14in 8.5in;
               background: red;
            }
         }

         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
         }
         #main{
            margin: auto;
         }
         #register_table td {
            height: 30px;
            border: 1px solid #000;
         }
         button{
            background: none;
            padding: 10px 15px;
            border: none;
            font-family: sans-serif;
            font-size: 20px;
            background: #1cc88a;
            color: #fff;
            border-radius: 10px;
            text-transform: uppercase;
            cursor: pointer;
            position: fixed;
            left: 0;
            top: 0;
         }
      </style>
   </head>

   <body>
      <button onclick="prinForm()">Print Form</button>
      <table id="main" border="0" cellpadding="0" cellspacing="0" width="816"
         style="max-height: 1344px;padding: 15px 30px;font-size: 11px;text-align: center;line-height:1.6;">
         <tr valign='top' align="center" style="height:105px;">
            <td>
               <span style="display: block">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</span>
               <span style="display: block">অধ্যক্ষের কার্যালয়</span>
               <span style="display: block">চট্টগ্রাম মহিলা পলিটেকনিক ইনস্টিটিউট, উত্তর হালিশহর, চট্টগ্রাম-৪২১৬ ।</span>
               <span style="display: block">web site: www.cmpi.gov.bd , E-mail: cmpi10@yahoo.com</span>
               <span style="display: block; text-align: right;text-decoration: underline;">সিরিয়াল নং (রেজিঃমোতাবেক):
                  --------</span>
            </td>
         </tr>
         <tr valign='top' align="center" style="height:25px;">
            <td style="text-decoration: underline">নী-দাবী প্রত্যয়ন</td>
         </tr>
         <tr valign='top' style="height:110px;text-align:left;">
            <td>
               নাম : --------------------------------------, বোর্ড রোল নম্বর : ------------------------, রেজিস্টেশন
               নম্বর--------------------------------, সেশন--------------------, টেকনোলজি ---------------, পর্ব
               -----------------,শিফট --------------------, পরীক্ষা অনুষ্ঠানের --------------- সন ----------মাস,
               পরীক্ষায় প্রাপ্ত জিপিএ/ সিজিপিএ --------------- । তাকে শিক্ষা সমাপ্ত/ভর্তি বাতিল/ বদলী জনিত কারণে
               ইনস্টিউট হতে ছাড়পত্র প্রদান করা হবে। তার নামে কোন পাওনা থাকলে নিম্নে তার বিবরণ দিতে হবে। প্রয়োজন বোধে
               পৃথক সীটে রিপোর্ট দাখিল করা যাবে।
            </td>
         </tr>
         <tr valign="top">
            <td>
               <table id="register_table" border="1" cellpadding="0" cellspacing="0" width="100%"
                  style="font-size:11px;text-align:center;">
                  <tr>
                     <td style="width: 3%">
                        ক্রঃ নং
                     </td>
                     <td style="width: 5%">
                        বিভাগ
                     </td>
                     <td style="width: 22%">
                        সেকশন/ল্যাব/সপ
                     </td>
                     <td style="width: 14%">
                        পাওনার বিবরণ
                     </td>
                     <td style="width: 16%">
                        ক্র্যাফট ইনস্ট্রাক্টর/ ল্যাব অ্যাসিস্ট্যান্টের স্বাক্ষর
                     </td>
                     <td style="width: 15%">
                        ওয়ার্কশপ সুপার/ ল্যাব ইনচার্জের স্বাক্ষর
                     </td>
                     <td style="width: 14%">
                        বিভাগীয় প্রধানের স্বাক্ষর
                     </td>
                     <td style="width: 11%">
                        মন্তব্য
                     </td>
                  </tr>
                  <tr>
                     <td rowspan="21" style=" text-align: center;">
                        <span style="transform: rotate(90deg);display:inline-block;">০১ । সংশ্লিষ্ট টেকনোলজি</span>
                     </td>
                     <td rowspan="5" style="writing-mode: vertical-rl; text-align: center;">কম্পিউটার(৬৬)</td>
                     <td>সফটওয়্যার ল্যাব -১</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>

                  </tr>
                  <tr>

                     <td>সফটওয়্যার ল্যাব -২</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>

                     <td>সফটওয়্যার ল্যাব -৩</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>

                     <td>হার্ডওয়্যার/ নেটওয়ার্ক ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ল্যাংগুয়েজ ল্যাব</td>
                     <td> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <!-- Computer Lab Ends Here -->

                  <!-- Electronics Lab Start -->
                  <tr>
                     <td rowspan="6" style="writing-mode: vertical-rl; text-align: center;">ইলেকট্রনিক্স (৬৮)</td>
                     <td>বেসিক ইলেকট্রনিক্স ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>পিডি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>এপিডি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>এডি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>এমটি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ই.টি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <!-- Electronics Lab Ends Here -->

                  <!-- Architechture Lab Start -->
                  <tr>
                     <td rowspan="4" style="writing-mode: vertical-rl; text-align: center;">এআইডিটি/আর্কিটেকচার(৮৭)</td>
                     <td>মডেল ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ক্যাড ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>সিভিল ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ড্রাফটিং ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <!-- Architechture Lab ends Here -->

                  <tr>
                     <td rowspan="5" style="writing-mode: vertical-rl; text-align: center;">জিডিপিটি/অ্যাপারেল
                        ম্যানুফেকচারিং(১৯)</td>
                     <td>আরএমজি ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>সুইং ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ক্যাড এন্ড ক্যাম ল্যাব</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>প্যাটার্ন ল্যাব</td>
                     <td></td>
                     <td> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>ফিনিশিং ল্যাব</td>
                     <td></td>
                     <td> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>নন টেক</td>
                     <td>ফিজিক্স এন্ড কেমিস্ট্রি ল্যাব</td>
                     <td> </td>
                     <td colspan="2"></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td>০২</td>
                     <td colspan="2">ছাত্রীনিবাস</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td> </td>
                     <td colspan="2"></td>
                     <td></td>
                     <td colspan="2">বিবরণ</td>
                     <td>স্বাক্ষর</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td>০৩</td>
                     <td colspan="2">লাইব্রেরী</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>

                  <tr>
                     <td> ০৪ </td>
                     <td colspan="2">হিসাব শাখা </td>
                     <td> </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td>উপরোক্ত তথ্যের ভিত্তিতে তার নিকট----------------------------পাওনা আছে/নাই, তাই তাকে কাগজপত্র উত্তোলনের
               জন্য ছাড়পত্র দেয়া যেতে পারে।</td>
         </tr>
         <tr>
            <td>
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                     <td colspan="2" style="text-decoration: overline;">
                        রেজিস্টার
                     </td>
                  </tr>
                  <tr>
                     <td>
                        সুপারিশ করা হলো
                     </td>
                     <td>
                        মঞ্জুর করা হল
                     </td>
                  </tr>
                  <tr>
                     <td style="text-decoration: overline;">
                        উপাধ্যক্ষ
                     </td>
                     <td style="text-decoration: overline;">
                        অধ্যক্ষ
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="text-align: justify">
               উপরোক্ত তথ্যের ভিত্তিতে তার নিকট বিভিন্ন টেকনোলজি/শাখা কর্তৃক বর্ণনানুযায়ী দাবীকৃত দেনার বিপরীতে টাকা
               (অঙ্কে)---------------, কথায়ঃ------------------------------------জামানত হতে কর্তন করার পর টাকা (অঙ্কে)
               ------------------, কথায়ঃ -------------------------------- প্রকৃত পাওনা প্রদানের প্রস্তাব পেশ করা হলো।
            </td>
         </tr>
         <tr>
            <td style="text-align: right">
               হিসাব রক্ষক/ক্যাশিয়ার
            </td>
         </tr>
         <tr>
            <td style="text-align: left">
               টাকা (অঙ্কে)---------------, কথায়ঃ------------------------------------- প্রদানের অনুমোদন করা হলো।
            </td>
         </tr>
         <tr>
            <td style="text-align: right">
               অধ্যক্ষ
            </td>
         </tr>

         <tr>
            <td style="text-align: left">
               জামানতের টাকা (অঙ্কে)---------------, কথায়ঃ------------------------------------- মাত্র বুঝিয়া পেলাম।
            </td>
         </tr>
         <tr>
            <td style="text-align: right">
               গ্রহনকারীর স্বাক্ষর ও তারিখ
            </td>
         </tr>
         <tr>
            <td>
               প্রদানকারীর (হিসাব রক্ষক/ক্যাশিয়ারের) স্বাক্ষর ও তারিখ
            </td>
         </tr>
      </table>

      <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
      <script>
         function prinForm(){
            printJS({
               printable:'main',
               type:'html',
               maxWidth:816,
               targetStyles: ['*'],
            })
         }
      </script>
   </body>

</html>