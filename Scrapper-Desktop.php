<?php
require 'vendor/autoload.php';
$httpClient = new \simplehtmldom\HtmlWeb();

// $IntelScores = ["1050ti" => 6302, ];
$RyzenScores = ["1200" => 6322, "1300x" => 6968, "2200G" => 6767, "2200GE" => 6062, "2200U" => 3695, "2300U" => 5473, "2300X" => 7514, "3100" => 11635, "3200G" => 7160, "3200GE" => 7309, "3200U" => 3827, "3250C" => 3208, "3250U" => 3864, "3300U" => 5695, "3300X" => 12677, "3350U" => 5853, "4100" => 11041, "4300GE" => 7488, "4300G" => 10922, "5300GE" => 13321, "5300G" => 12891, "5300U" => 9711, "5400U" => 11523, "5425U" => 11552, "7320C" => 8252, "7320U" => 9175, "7330U" => 11103, "1400" => 7779, "1500X" => 9102, "1600X" => 13066, "1600" => 12300, "2400GE" => 7438, "2400G" => 8739, "2500U" => 6517, "2500X" => 9514, "2600H" => 7834, "2600X" => 13962, "2600" => 13219, "3350GE" => 9343, "3350G" => 9048, "3400GE" => 8901, "3400G" => 9294, "3450U" => 6770, "3500C" => 5564, "3500U" => 6993, "3500X" => 13206, "3500" => 12809, "3550H" => 7823, "3550U" => 7681, "3580U" => 7174, "3600XT" => 18693, "3600X" => 19238, "3600" => 17784, "4400G" => 17160, "4500U" => 11015, "4500" => 16221, "4600GE" => 15641, "4600G" => 16027, "4600HS" => 14377, "4600H" => 14554, "4600U" => 13449, "5500U" => 13175, "5500" => 19556, "5560U" => 15089, "5600GE" => 18748, "5600G" => 19918, "5600U" => 15466, "5600X3D" => 22039, "5600X" => 21932, "5600" => 21607, "5625U" => 15104, "6600H" => 18977, "6600U" => 17185, "7500F" => 26540, "7520U" => 9680, "7530U" => 16116, "7535HS" => 18431, "7535U" => 17494, "7540U" => 19093, "7600X" => 28771, "7600" => 27550, "7640HS" => 23284, "7640U" => 21850, "1700X" => 15663, "1700" => 14821, "2700E" => 14657, "2700U" => 6972, "2700X" => 17564, "2700" => 15737, "2800H" => 7863, "3700C" => 7145, "3700U" => 7194, "3700X" => 22625, "3750H" => 8210, "3780U" => 6910, "3800XT" => 23705, "3800X" => 23223, "4700GE" => 19846, "4700G" => 20210, "4700U" => 13477, "4800HS" => 18545, "4800H" => 18684, "4800U" => 15469, "5700GE" => 22196, "5700G" => 24670, "5700U" => 15839, "5700X" => 26789, "5700" => 24333, "5800HS" => 20423, "5800H" => 21177, "5800U" => 18642, "5800X3D" => 28233, "5800X" => 28004, "5800" => 25867, "5825U" => 18424, "6800HS" => 22964, "6800H" => 23702, "6800U" => 20586, "7700X" => 36298, "7700" => 35078, "7730U" => 18807, "7735HS" => 24202, "7735H" => 24425, "7735U" => 21214, "7736U" => 23163, "7745HX" => 32621, "7800X3D" => 34623, "7840HS" => 28977, "7840H" => 28730, "7840S" => 26627, "7840U" => 25158, "3900XT" => 32752, "3900X" => 32698, "3900" => 30833, "3950X" => 38909, "4900HS" => 19128, "4900H" => 19318, "5900HS" => 21863, "5900H" => 20960, "5900HX" => 22759, "5900X" => 39255, "5900" => 34540, "5950X" => 45835, "5980HS" => 21232, "5980HX" => 23670, "6900HS" => 23976, "6900HX" => 24930, "7845HX" => 46148, "7900X3D" => 50684, "7900X" => 52193, "7900" => 49148, "7940HS" => 30811, "7940H" => 31099, "7945HX" => 56414, "7950X3D" => 62642, "7950X" => 63334];
$i3Scores = ["N305" => 10126,"N300" => 8064,"9350KF" => 7577,"9350K" => 7700,"9320" => 7358,"9300T" => 6164,"9300" => 7279,"9100TE" => 4501,"9100T" => 5576,"9100F" => 6750,"9100E" => 6868,"9100" => 6641,"8350K" => 6926,"8300T" => 5733,"8300" => 6343,"8145UE" => 4099,"8145U" => 3809,"8140U" => 4227,"8130U" => 3602,"8121U" => 4388,"8109U" => 4249,"8100T" => 5334,"8100B" => 6055,"8100" => 6145,"7350K" => 4943,"7320" => 4844,"7300T" => 4211,"7300" => 4529,"7167U" => 3368,"7130U" => 3011,"7102E" => 2521,"7101TE" => 3949,"7101E" => 4430,"7100U" => 2720,"7100T" => 3812,"7100H" => 3430,"7100" => 4354,"7020U" => 2574,"6320" => 4431,"6300T" => 4016,"6300" => 4353,"6167U" => 3255,"6157U" => 2767,"6102E" => 2349,"6100U" => 2637,"6100TE" => 3152,"6100T" => 3645,"6100H" => 3041,"6100E" => 3315,"6100" => 4153,"6098P" => 4059,"6006U" => 2282,"560" => 1665,"550" => 1606,"540" => 1531,"530" => 1495,"5157U" => 2593,"5020U" => 2173,"5015U" => 1842,"5010U" => 2191,"5005U" => 2024,"4570T" => 3244,"4370T" => 3361,"4370" => 3845,"4360T" => 3265,"4360" => 3609,"4350T" => 3142,"4350" => 3501,"4340" => 3545,"4330TE" => 2022,"4330T" => 3105,"4330" => 3550,"4170T" => 3201,"4170" => 3585,"4160T" => 3139,"4160" => 3505,"4158U" => 1718,"4150T" => 2945,"4150" => 3384,"4130T" => 2875,"4130" => 3322,"4120U" => 1948,"4110U" => 1860,"4110M" => 2678,"4100M" => 2500,"4100E" => 1848,"4030Y" => 1654,"4030U" => 1869,"4025U" => 1959,"4020Y" => 1453,"4012Y" => 1260,"4010Y" => 1358,"4010U" => 1652,"4005U" => 1656,"4000M" => 1773,"390M" => 1232,"380UM" => 734,"380M" => 1201,"370M" => 1142,"350M" => 1071,"330UM" => 515,"330M" => 1020,"330E" => 1260,"3250T" => 2650,"3250" => 2429,"3245" => 2337,"3240T" => 2039,"3240" => 2313,"3229Y" => 1004,"3227U" => 1286,"3225" => 2236,"3220T" => 1929,"3220" => 2262,"3217UE" => 1362,"3217U" => 1218,"3210" => 2218,"3130M" => 1900,"3120M" => 1685,"3110M" => 1641,"2377M" => 834,"2375M" => 900,"2370M" => 1364,"2367M" => 832,"2365M" => 825,"2357M" => 788,"2350M" => 1257,"2348M" => 1282,"2340UE" => 976,"2332M" => 1353,"2330M" => 1224,"2330E" => 1823,"2328M" => 1234,"2312M" => 1120,"2310M" => 1223,"2310E" => 1845,"2140" => 2307,"2130" => 2029,"2125" => 2085,"2120T" => 1520,"2120" => 1954,"21050" => 2193,"2105" => 1883,"2102" => 2029,"2100T" => 1488,"2100" => 1849,"1315U" => 13169,"13100T" => 13187,"13100F" => 14677,"13100E" => 11650,"13100" => 14782,"1305U" => 9724,"12300T" => 13239,"12300" => 14706,"1220PE" => 16146,"1220P" => 14396,"1215UL" => 6161,"1215UE" => 9643,"1215U" => 11046,"1210U" => 10856,"12100TE" => 12961,"12100T" => 12781,"12100F" => 14218,"12100E" => 14250,"12100" => 13520,"1125G4" => 9778,"1115GRE" => 4220,"1115G4E" => 5826,"1115G4" => 6149,"1110G4" => 4390,"11100HE" => 11289,"11100B" => 11357,"10325" => 10354,"10320" => 10063,"10305T" => 8136,"10305" => 9108,"10300T" => 8067,"10300" => 9336,"10110Y" => 3269,"10110U" => 3929,"10105T" => 8012,"10105F" => 9007,"10105" => 8658,"10100Y" => 2935,"10100TE" => 6237,"10100T" => 7304,"10100F" => 8785,"10100E" => 8229,"10100" => 8690,"1005G1" => 4993,"1000NG4" => 3707];
$i5Scores = ["M460" => 1616,"L16G7" => 3449,"E520" => 1619,"9600T" => 9580,"9600KF" => 10771,"9600K" => 10737,"9600" => 10306,"9500TE" => 9846,"9500T" => 8141,"9500F" => 10212,"9500" => 9785,"9400T" => 8423,"9400H" => 8031,"9400F" => 9499,"9400" => 9390,"9300HF" => 7501,"9300H" => 7650,"8600T" => 9302,"8600K" => 10214,"8600" => 9968,"8500T" => 7737,"8500B" => 8994,"8500" => 9599,"8400T" => 7452,"8400H" => 7721,"8400" => 9251,"8365UE" => 5711,"8365U" => 6253,"8350U" => 6219,"8305G" => 6876,"8300H" => 7471,"8279U" => 7685,"8269U" => 8055,"8265UC" => 5988,"8265U" => 6020,"8260U" => 7649,"8259U" => 7979,"8257U" => 7611,"8250U" => 5885,"8210Y" => 2814,"8200Y" => 2291,"7Y57" => 2657,"7Y54" => 2719,"7640X" => 6791,"760S" => 5440,"7600T" => 5844,"7600K" => 6816,"7600" => 6566,"760" => 2605,"750S" => 1326,"7500T" => 5263,"7500" => 6031,"750" => 2526,"7442EQ" => 4834,"7440HQ" => 5595,"7440EQ" => 5711,"7400T" => 4729,"7400" => 5493,"7360U" => 3896,"7300U" => 3678,"7300HQ" => 5096,"7287U" => 3854,"7267U" => 3670,"7260U" => 3966,"7200U" => 3394,"680" => 2606,"670" => 2533,"661" => 2459,"6600T" => 5662,"6600K" => 6329,"6600" => 6037,"660" => 2398,"655K" => 2017,"6500TE" => 4804,"6500T" => 4769,"6500" => 5635,"650" => 2240,"6442EQ" => 4548,"6440HQ" => 5100,"6440EQ" => 5419,"6402P" => 5454,"6400T" => 4299,"6400" => 5174,"6360U" => 3116,"6350HQ" => 4255,"6300U" => 3242,"6300HQ" => 4690,"6287U" => 3820,"6267U" => 3436,"6260U" => 3213,"6200U" => 3000,"6198DU" => 3161,"580M" => 1953,"5675R" => 5518,"5675C" => 5546,"560UM" => 1015,"560M" => 1893,"5575R" => 5055,"540UM" => 1002,"540M" => 1788,"5350U" => 2581,"5300U" => 2737,"5287U" => 3094,"5257U" => 2903,"5250U" => 2475,"520UM" => 908,"520M" => 1720,"5200U" => 2503,"480M" => 1320,"470UM" => 778,"4690T" => 4667,"4690S" => 5497,"4690K" => 5678,"4690" => 5603,"4670T" => 4335,"4670S" => 5107,"4670R" => 5233,"4670K CPT" => 5034,"4670K" => 5550,"4670" => 5528,"460M" => 1292,"4590T" => 4066,"4590S" => 5127,"4590" => 5369,"4570TE" => 3074,"4570T" => 3201,"4570S" => 4995,"4570R" => 4556,"4570" => 5221,"450M" => 1237,"4470S" => 4742,"4470" => 1180,"4460T" => 3627,"4460S" => 4567,"4460" => 4868,"4440S" => 4415,"4440" => 4748,"4430S" => 4296,"4430" => 4655,"4422E" => 1907,"4402E" => 2681,"4400E" => 3251,"4350U" => 2425,"4340M" => 3471,"4330M" => 3203,"4310U" => 2537,"4310M" => 3122,"430UM" => 627,"430M" => 1194,"4308U" => 2996,"4302Y" => 2028,"4300Y" => 1461,"4300U" => 2498,"4300M" => 2997,"4288U" => 2657,"4278U" => 2822,"4260U" => 2338,"4258U" => 2572,"4250U" => 2172,"4230U" => 1853,"4220Y" => 1591,"4210Y" => 1577,"4210U" => 2305,"4210M" => 2881,"4210H" => 3037,"4202Y" => 1498,"4200Y" => 1558,"4200U" => 2187,"4200M" => 2804,"4200H" => 3113,"3610ME" => 2608,"3570T" => 4107,"3570S" => 4630,"3570K" => 4955,"3570" => 4918,"3550S" => 4475,"3550" => 4796,"3475S" => 4250,"3470T" => 2981,"3470S" => 4402,"3470" => 4674,"3450S" => 4375,"3450" => 4485,"3439Y" => 1907,"3437U" => 2322,"3427U" => 2235,"3380M" => 2939,"3360M" => 2884,"3350P" => 4237,"3340S" => 3914,"3340M" => 2692,"3340" => 4257,"3339Y" => 1589,"3337U" => 2099,"3335S" => 4074,"3330S" => 3858,"3330" => 4086,"3320M" => 2655,"3317U" => 2013,"3230M" => 2553,"3210M" => 2469,"3170K" => 8882,"2560M" => 2397,"2557M" => 1710,"2550K" => 4099,"2540M" => 2351,"2537M" => 1202,"2520M" => 2230,"2515E" => 1882,"2510E" => 1889,"2500T" => 2929,"2500S" => 3375,"2500K" => 4108,"2500" => 4112,"2467M" => 1442,"2450P" => 4203,"2450M" => 2065,"2435M" => 2044,"2430M" => 2003,"2415M" => 2042,"2410M" => 1930,"2405S" => 3157,"24050S" => 3061,"2400S" => 3148,"2400" => 3856,"2390T" => 2418,"2380P" => 3797,"2320" => 3651,"2310" => 3647,"2300" => 3403,"14600KF" => 35757,"14600K" => 40995,"13600T" => 26876,"13600KF" => 38174,"13600K" => 38317,"13600HX" => 30169,"13600H" => 25354,"13600" => 33463,"1350P" => 21417,"13500T" => 23779,"13500HX" => 27182,"13500H" => 23066,"13500" => 32465,"13490F" => 27675,"1345U" => 15424,"13450HX" => 25820,"13420H" => 18740,"1340P" => 20529,"13400T" => 21493,"13400F" => 25561,"13400" => 25319,"1335U" => 17608,"1334U" => 10366,"12600T" => 17547,"12600KF" => 27451,"12600K" => 27792,"12600HX" => 24039,"12600HE" => 24599,"12600H" => 23012,"12600" => 21396,"1250PE" => 17738,"1250P" => 20619,"12500TE" => 14501,"12500T" => 16750,"12500H" => 21656,"12500E" => 20699,"12500" => 19994,"12490F" => 20650,"1245UE" => 9283,"1245U" => 13546,"12450H" => 17818,"1240U" => 14323,"1240P" => 17356,"12400T" => 16345,"12400F" => 19612,"12400" => 19471,"1235U" => 13636,"1230U" => 10861,"11600T" => 14713,"11600KF" => 19694,"11600K" => 19685,"11600" => 18090,"1155G7" => 10344,"11500T" => 13075,"11500H" => 16216,"11500B" => 17801,"11500" => 17459,"1145GRE" => 9428,"1145G7E" => 9473,"1145G7" => 9971,"1140G7" => 9610,"11400T" => 13644,"11400H" => 15841,"11400F" => 17125,"11400" => 17102,"1135G7" => 9908,"11320H" => 10944,"1130G7" => 8623,"11300H" => 11003,"11260H" => 15772,"10600T" => 11210,"10600KF" => 14376,"10600K" => 14370,"10600" => 13689,"10505" => 12171,"10500TE" => 8449,"10500T" => 10100,"10500H" => 11331,"10500E" => 10827,"10500" => 12801,"10400T" => 9944,"10400H" => 8588,"10400F" => 12243,"10400" => 12195,"1038NG7" => 9148,"1035G7" => 8408,"1035G4" => 7989,"1035G1" => 7480,"10310U" => 6465,"1030NG7" => 5815,"10300H" => 8495,"10210Y" => 4631,"10210U" => 6244,"10200H" => 8239];
$i7Scores = ["995X" => 7862,"990X" => 7084,"9850HL" => 9112,"985" => 3928,"980X" => 6840,"9800X" => 18116,"980" => 6926,"9750HF" => 10701,"9750H" => 10963,"975" => 3428,"9700TE" => 10280,"9700T" => 10733,"9700KF" => 14399,"9700K" => 14524,"9700F" => 13287,"9700E" => 12881,"9700" => 13273,"970" => 6533,"965" => 3424,"960" => 3315,"950" => 3206,"940XM" => 2230,"940" => 2947,"930" => 2940,"920XM" => 1885,"920" => 2817,"8850H" => 10288,"8809G" => 8603,"880" => 3105,"875K" => 3057,"8750H" => 9954,"870S" => 2786,"8709G" => 7926,"8706G" => 8108,"8705G" => 7776,"8700T" => 10248,"8700K" => 13699,"8700B" => 12055,"8700" => 12912,"870" => 3118,"8665UE" => 5170,"8665U" => 6284,"8650U" => 6280,"860S" => 2403,"860" => 2975,"8569U" => 8257,"8565UC" => 6187,"8565U" => 6140,"8559U" => 8574,"8557U" => 7565,"8550U" => 5932,"8500Y" => 2484,"840QM" => 1937,"820QM" => 1804,"8086K" => 14357,"7Y75" => 2604,"7920HQ" => 7424,"7900X" => 21008,"7820X" => 17219,"7820HQ" => 7179,"7820HK" => 7413,"7820EQ" => 7453,"7800X" => 12830,"7740X" => 9876,"7700T" => 7578,"7700K" => 9658,"7700HQ" => 6927,"7700" => 8658,"7660U" => 4106,"7600U" => 3728,"7567U" => 4177,"7560U" => 3767,"7500U" => 3650,"740QM" => 1819,"720QM" => 1661,"6970HQ" => 4632,"6950X" => 17510,"6920HQ" => 7296,"6900K" => 14561,"6850K" => 11435,"6822EQ" => 5241,"6820HQ" => 6841,"6820HK" => 7034,"6820EQ" => 7001,"680UM" => 1196,"6800K" => 10767,"6770HQ" => 7085,"6700TE" => 6801,"6700T" => 7246,"6700K" => 8944,"6700HQ" => 6525,"6700" => 8090,"6660U" => 3681,"6650U" => 3610,"660UM" => 1284,"6600U" => 3457,"6567U" => 3816,"6560U" => 3326,"6500U" => 3275,"6498DU" => 3303,"640UM" => 1183,"640M" => 2057,"640LM" => 1523,"620UM" => 1010,"620M" => 1988,"620LM" => 1421,"610E" => 1818,"5960X" => 12676,"5950HQ" => 7696,"5930K" => 10339,"5850HQ" => 6866,"5850EQ" => 7036,"5820K" => 9864,"5775R" => 7768,"5775C" => 7672,"5700HQ" => 6063,"5700EQ" => 5803,"5675C" => 6089,"5650U" => 3015,"5600U" => 3023,"5557U" => 3094,"5550U" => 2946,"5500U" => 2772,"4980HQ" => 6633,"4960X" => 10089,"4960HQ" => 6609,"4940MX" => 7089,"4930MX" => 6491,"4930K" => 9417,"4910MQ" => 6304,"4900MQ" => 6143,"4870HQ" => 6398,"4860HQ" => 6242,"4860EQ" => 5500,"4850HQ" => 6153,"4820K" => 6520,"4810MQ" => 6040,"4800MQ" => 5822,"4790T" => 6359,"4790S" => 6999,"4790K" => 8066,"4790" => 7259,"4785T" => 5484,"4771" => 7132,"4770TE" => 4557,"4770T" => 5917,"4770S" => 6769,"4770R" => 6516,"4770K" => 7123,"4770HQ" => 6106,"4770" => 7053,"4765T" => 5114,"4760HQ" => 6300,"4750HQ" => 5621,"4722HQ" => 5620,"4720HQ" => 5750,"4712MQ" => 5279,"4712HQ" => 5325,"4710MQ" => 5833,"4710HQ" => 5510,"4702MQ" => 5170,"4702HQ" => 5393,"4700MQ" => 5347,"4700HQ" => 5651,"4700EQ" => 4941,"4650U" => 2409,"4610Y" => 2446,"4610M" => 3164,"4600U" => 2703,"4600M" => 3170,"4578U" => 3053,"4560U" => 2950,"4558U" => 3051,"4550U" => 2272,"4510U" => 2581,"4500U" => 2489,"3970X" => 8408,"3960X" => 8390,"3940XM" => 5819,"3930K" => 8199,"3920XM" => 5651,"3840QM" => 5905,"3820QM" => 5689,"3820" => 5744,"3770T" => 5522,"3770S" => 6184,"3770K" => 6467,"3770" => 6399,"3740QM" => 5714,"3720QM" => 5655,"3689Y" => 1967,"3687U" => 2638,"3667U" => 2391,"3635QM" => 4726,"3632QM" => 4668,"3630QM" => 5123,"3615QM" => 5226,"3615QE" => 5548,"3612QM" => 4646,"3612QE" => 4929,"3610QM" => 5117,"3610QE" => 5026,"3555LE" => 2238,"3540M" => 2946,"3537U" => 2318,"3520M" => 2862,"3517UE" => 2320,"3517U" => 2044,"2960XM" => 4760,"2920XM" => 4384,"2860QM" => 4570,"2840QM" => 3842,"2820QM" => 4401,"2760QM" => 4405,"2720QM" => 4030,"2715QE" => 3221,"2710QE" => 4044,"2700K" => 5740,"2677M" => 1934,"2675QM" => 3885,"2670QM" => 3755,"2655LE" => 1999,"2640M" => 2493,"2637M" => 1807,"2635QM" => 3323,"2630UM" => 400,"2630QM" => 3546,"2620M" => 2440,"2617M" => 1687,"2610UE" => 1409,"2600S" => 4601,"2600K" => 5478,"2600" => 5330,"14700KF" => 54847,"14700K" => 52886,"14700HX" => 37546,"13850HX" => 39067,"13800H" => 27440,"13790F" => 46110,"1370P" => 21462,"13705H" => 23753,"13700TE" => 26616,"13700T" => 29820,"13700KF" => 46528,"13700K" => 46767,"13700HX" => 34230,"13700H" => 28431,"13700F" => 39829,"13700" => 38471,"1365U" => 15685,"13650HX" => 32079,"13620H" => 26588,"1360P" => 19385,"1355U" => 15322,"12850HX" => 30363,"1280P" => 20439,"12800HX" => 32679,"12800HE" => 29805,"12800H" => 24906,"1270PE" => 17960,"1270P" => 17605,"12700TE" => 15616,"12700T" => 21713,"12700KF" => 34494,"12700K" => 34738,"12700H" => 26462,"12700F" => 30940,"12700E" => 29289,"12700" => 30934,"1265UE" => 9195,"1265U" => 14019,"12650H" => 23580,"1260U" => 12698,"1260P" => 17236,"1255U" => 13808,"1250U" => 12318,"1195G7" => 11063,"1185GRE" => 8203,"1185G7E" => 10444,"1185G7" => 10565,"11850HE" => 16409,"11850H" => 20764,"1180G7" => 8335,"11800H" => 20789,"11700T" => 16243,"11700KF" => 24038,"11700K" => 24665,"11700F" => 21140,"11700B" => 22910,"11700" => 20004,"1165G7" => 10367,"1160G7" => 9173,"11600H" => 15992,"11390H" => 10355,"11375H" => 11963,"11370H" => 11777,"10875H" => 15077,"10870H" => 14636,"10850H" => 11885,"10810U" => 8190,"10750H" => 12038,"10710U" => 9737,"10700TE" => 16332,"10700T" => 12860,"10700KF" => 18780,"10700K" => 18945,"10700F" => 16653,"10700E" => 16418,"10700" => 16572,"1068NG7" => 9626,"1065G7" => 8419,"10610U" => 6832,"1060NG7" => 6684,"10510Y" => 5100,"10510U" => 6668];
$i9Scores = ["9990XE" => 30162,"9980XE" => 31963,"9980HK" => 14288,"9960X" => 30504,"9940X" => 28048,"9920X" => 25170,"9900X" => 21862,"9900T" => 13339,"9900KS" => 19535,"9900KF" => 18401,"9900K" => 18407,"9900" => 16636,"9880H" => 13866,"9820X" => 19906,"8950HK" => 10560,"7980XE" => 30401,"7960X" => 28660,"7940X" => 26245,"7920X" => 23561,"7900X" => 21228,"14900KF" => 62696,"14900K" => 62385,"13980HX" => 48084,"13950HX" => 45003,"13905H" => 31248,"13900T" => 43788,"13900KS" => 61881,"13900KF" => 58932,"13900K" => 59675,"13900HX" => 45003,"13900HK" => 32200,"13900H" => 29888,"13900F" => 52687,"13900E" => 43936,"13900" => 48484,"12950HX" => 33040,"12900TE" => 35057,"12900T" => 30065,"12900KS" => 44271,"12900KF" => 41236,"12900K" => 41434,"12900HX" => 34908,"12900HK" => 28150,"12900H" => 28610,"12900F" => 37003,"12900E" => 26055,"12900" => 34344,"11980HK" => 22988,"11950H" => 21437,"11900T" => 18975,"11900KF" => 25354,"11900KB" => 23041,"11900K" => 25417,"11900H" => 20980,"11900F" => 22690,"11900" => 23011,"10980XE" => 32867,"10980HK" => 15773,"10940X" => 27854,"10920X" => 26331,"10910" => 21718,"10900X" => 22488,"10900TE" => 16914,"10900T" => 14951,"10900KF" => 22822,"10900K" => 23125,"10900F" => 20310,"10900E" => 19595,"10900" => 20057,"10885H" => 15264,"10880H" => 14736,"10850K" => 22586];

//Pagination:
$currentPage = 1;
$maxPages = 0; // Set to 0 for unlimited (up to 100)
$stopLoop = false;

$titles = [];
$prices = [];
$links = [];
$types = [];
$benchmarks = [];
$descriptions = [];
$cpuModels = [];
$images = [];
$dates = [];
$query = "ryzen%20i3%20i5%20i7%20i9";
do {
    $html = $httpClient->load('https://www.insomnia.gr/classifieds/search/?&q=' . $query . '&type=classifieds_advert&page=' . $currentPage . '&nodes=8&sortby=relevancy');

    foreach ($html->find('.ipsStreamItem_title') as $element)                       {$titles[] = $element->plaintext;}
    foreach ($html->find('h2 span a') as $element)                                  {$links[] = $element->href;}
    foreach ($html->find('.ipsStream_snippetInfo p .ipsStream_price') as $element)  {$prices[] = $element->plaintext;}
    foreach ($html->find('ul.ipsList_inline li .ipsBadge') as $element)             {$types[] = $element->plaintext;}
    foreach ($html->find('.ipsSpacer_top.ipsSpacer_half.ipsType_richText.ipsType_break.ipsType_medium') as $element) {$descriptions[] = $element->plaintext;}
    foreach ($html->find('.ipsStreamItem_container') as $element)                   {$image = $element->find('.ipsImage.ipsStream_image', 0);
        if ($image) {$images[] = $image->{'data-src'};} else                        {$images[] = "public/images/cpu.svg";}}
    foreach ($html->find('.ipsStreamItem_container') as $element) {$date = $element->find('time', 0);
        if ($date) {$dates[] = $date->{'datetime'};} else                           {$dates[] = null;}}
    

    // Check for Next Page:
    $nextPageUrl = $html->find('.ipsPagination .ipsPagination_next a', 0);
    $endOTheLine = $html->find('.ipsPagination .ipsPagination_next.ipsPagination_inactive', 0);
    if ($nextPageUrl && !$endOTheLine) {
        $nextPageUrl = $nextPageUrl->href;
        $currentPage++;
    } else {$stopLoop = true;}

    // Check if need to Stop
    if (($maxPages != 0 && $currentPage > $maxPages) || ($stopLoop == True) || ($currentPage > 100)) {break;}
} while ($stopLoop == false);



$key = 0;
foreach ($titles as $title) {
    $thisPrice = $prices[$key];
    $thisPrice = str_replace(",", ".", $thisPrice);
    $thisPrice = str_replace("€", "", $thisPrice);
    $thisPrice = floatval(trim($thisPrice));

    $benchmarks[$key] = 0;  // Initialize to zero
    $cpuModels[$key] = 0;

    if (($types[$key] != "Πώληση") || ($thisPrice < 10)) {
        $key++;
        continue;  // Skip this iteration
    }

    $found = false;  // Flag to check if we found a CPU model

    foreach ($RyzenScores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (
            (stripos($cleanTitle, 'Ryzen') !== false && stripos($cleanTitle, $cpu) !== false) ||
            (stripos($cleanDescription, 'Ryzen') !== false && stripos($cleanDescription, $cpu) !== false)) 
            {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }
    foreach ($i9Scores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (
            (stripos($cleanTitle, 'i9') !== false && stripos($cleanTitle, $cpu) !== false) ||
            (stripos($cleanDescription, 'i9') !== false && stripos($cleanDescription, $cpu) !== false)) 
            {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }
    foreach ($i7Scores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (
            (stripos($cleanTitle, 'i7') !== false && stripos($cleanTitle, $cpu) !== false) ||
            (stripos($cleanDescription, 'i7') !== false && stripos($cleanDescription, $cpu) !== false)) 
            {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }
    foreach ($i5Scores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (
            (stripos($cleanTitle, 'i5') !== false && stripos($cleanTitle, $cpu) !== false) ||
            (stripos($cleanDescription, 'i5') !== false && stripos($cleanDescription, $cpu) !== false)) 
            {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }
    foreach ($i3Scores as $cpu => $score) {
        $cleanTitle = str_replace(" ", "", $title);
        $cleanDescription = str_replace(" ", "", $descriptions[$key]);

        if (
            (stripos($cleanTitle, 'i3') !== false && stripos($cleanTitle, $cpu) !== false) ||
            (stripos($cleanDescription, 'i3') !== false && stripos($cleanDescription, $cpu) !== false)) 
            {
            $benchmarks[$key] = $score;
            $found = true;
            $cpuModels[$key] = $cpu;
            break;  // No need to check further
        }
    }

    if ($found) {
        $collectedData[] = [
            'title' => $title,
            'BPeu' => round($benchmarks[$key] / $thisPrice, 1),
            'price' => $prices[$key],
            'link' => $links[$key],
            'description' => $descriptions[$key],
            'benchmark' => $benchmarks[$key],
            'cpuModel' => $cpuModels[$key],
            'image' => $images[$key],
            'date' => $dates[$key]
        ];
    }

    $key++;
}
  

// Sort the array based on BPeu
usort($collectedData, function ($a, $b) {
    return $b['BPeu'] <=> $a['BPeu'];
});
// Create the XML structure
$xml = new SimpleXMLElement('<root/>');
// Loop through the data and add it to the XML
foreach ($collectedData as $data) {
    // Add to XML
    $gpu = $xml->addChild('gpu');
    $gpu->addChild('title', htmlspecialchars($data['title']));
    $gpu->addChild('cpuModel',htmlspecialchars($data['cpuModel']));
    $gpu->addChild('BPeu', htmlspecialchars($data['BPeu']));
    $gpu->addChild('price', htmlspecialchars($data['price']));
    $gpu->addChild('link', htmlspecialchars($data['link']));
    $gpu->addChild('benchmark', htmlspecialchars($data['benchmark']));
    $gpu->addChild('description', htmlspecialchars($data['description']));
    $gpu->addChild('image', htmlspecialchars($data['image']));
    $gpu->addChild('date', htmlspecialchars($data['date']));
}


// Save the XML to a file
$xml->asXML('public/xmls/systems.xml');