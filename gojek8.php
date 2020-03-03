echo "\n";
        echo "\e[92m---------------------------------------------------------------------------------------\n";
        echo "\e[92m|                    SCRIPT BY YUSFIK HELMI                              |\n";
        echo "\e[92m|                OFFICIAL DARK FORCE ARMY 		 	             |\n";
        echo "\e[92m|         THANK TO mr.Ikiganteng & mr.Yusfik Helmi          |\n";
        echo "\e[92m|  SCRIPT GOJEK AUTO REGIST + AUTO SAVE TOKEN  |\n";
        echo "\e[92m|                              GOODLUCK                                         	|\n";
        echo "\e[92m---------------------------------------------------------------------------------------\n";
        echo "\n";
echo "\n";
ulang:
echo "\e[96m[+] Input Nomor HP : ";
        $number = trim(fgets(STDIN));
        $numbers = $number[0].$number[1];
        $numberx = $number[5];
        if($numbers == "08") { 
            $number = str_replace("08","628","1",$number);
        } elseif ($numberx == " ") {
            $number = preg_replace("/[^0-9]/", "",$number);
            $number = "1".$number;
        }
        $nama = nama();
        $email = strtolower(str_replace(" ", "", $nama) . mt_rand(100,999) . "@gmail.com");
        $data1 = '{"name":"' . $nama . '","email":"' . $email . '","phone":"+' . $number . '","signed_up_country":"ID"}';
        $reg = curl('https://api.gojekapi.com/v5/customers', $data1, $headers);akau 
        $regs = json_decode($reg[0]);
        // Verif OTP
        if($regs->success == true) {
            otp:
            echo "\e[93m[+] Input OTP : ";
            $otp = trim(fgets(STDIN));
            $data2 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $regs->data->otp_token . '"},"client_secret":"' . $secret . '"}';
            $verif = curl('https://api.gojekapi.com/v5/customers/phone/verify', $data2, $headers);
            $verifs = json_decode($verif[0]);
            if($verifs->success == true) {
                // Claim Voucher
                $token = $verifs->data->access_token;
                $headers[] = 'Authorization: Bearer '.$token;
                $live = "tokens";
                $fopen1 = fopen($live, "a+");
                $fwrite1 = fwrite($fopen1, "TOKEN => ".$token." \n NOMOR => ".$number." \n");
                fclose($fopen1);
                echo "Token ~> ".$token." \n";
                echo "\e[92m[+] Token Tersimpan di ~> ".$live." \n\n";
        }
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff : G-75SR565 !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>