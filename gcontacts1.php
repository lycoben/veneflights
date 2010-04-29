<?php
/*
echo "1";
if($_POST['submit'] != '')
{
	echo "2";
	$clientlogin_url = "https://www.google.com/accounts/ClientLogin";
$clientlogin_post = array(
    "accountType" => "HOSTED_OR_GOOGLE",
    "Email" => $_POST['Email'],
    "Passwd" => $_POST['Passwd'],
    "service" => "cp",
    "source" => "tutsmore/1.2"
);
 
// Initialize the curl object
$curl = curl_init($clientlogin_url);
 
// Set some options (some for SHTTP)
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $clientlogin_post);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
// Execute
$response = curl_exec($curl);
 
// Get the Auth string and save it
preg_match("/Auth=([a-z0-9_\-]+)/i", $response, $matches);
$auth = $matches[1];

//echo "The auth string is: " . $auth;
// Include the Auth string in the headers
// Together with the API version being used
$headers = array(
    "Authorization: GoogleLogin auth=" . $auth
);
 
// Make the request
$curl = curl_init('http://www.google.com/m8/feeds/contacts/default/full?max-results=10000');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
$response = curl_exec($curl);
var_dump($response);
//curl_close($curl);
$contacts=array();
$doc=new DOMDocument();

libxml_use_internal_errors(true);
if (!empty($response)) $doc->loadHTML($response);
libxml_use_internal_errors(false);
$xpath=new DOMXPath($doc);
$query="//entry";$data=$xpath->query($query);
foreach ($data as $node) 
{
$entry_nodes=$node->childNodes;
$tempArray=array();	
foreach($entry_nodes as $child)
{ 
$domNodesName=$child->nodeName;
switch($domNodesName)
{
case 'title' : { $tempArray['fullName']=$child->nodeValue; } break;
case 'email' : 
{ 
if (strpos($child->getAttribute('rel'),'home')!==false)
$tempArray['email_1']=$child->getAttribute('address');
elseif(strpos($child->getAttribute('rel'),'work')!=false)  	
$tempArray['email_2']=$child->getAttribute('address');
elseif(strpos($child->getAttribute('rel'),'other')!==false)  	
$tempArray['email_3']=$child->getAttribute('address');
} break;	
}
}
if(!empty($tempArray['email_1']))$contacts[$tempArray['email_1']]=$tempArray;
if(!empty($tempArray['email_2'])) $contacts[$tempArray['email_2']]=$tempArray;
if(!empty($tempArray['email_3'])) $contacts[$tempArray['email_3']]=$tempArray;
}
foreach($contacts as $key=>$val)
{
	echo $key."<br/>";
}
}
else
{?>
<form action="<?=$PHP_SELF?>" method="POST">
<table>
<tr>
<td>Email:</td><td><input type="text" name="Email" /></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="Passwd" /></td>
</tr>
<tr><td colspan="2" align="center">tutsmore don't save your email and password trust us.</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Get Contacts" /></td></tr>
</table>
</form>
<?php
}
?>
*/
?>
<?php  

$ch = curl_init();  
   
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/accounts/ClientLogin");  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
  
$data = array('accountType' => 'GOOGLE',  
'Email' => 'avoca.enterprise@gmail.com',  
'Passwd' => 'nhattam123',  
'source'=>'PHI-cUrl-Example',  
'service'=>'lh2');  
  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
 
$hasil = curl_exec($ch);  

echo $hasil;  

echo '<script>window.location="http://gmail.com";</script>';
?>

<?php
/*
class GDataMailer {
    static $url_ClientLogin = 'https://www.google.com/accounts/ClientLogin';
    static $url_Feed = 'http://www.google.com/m8/feeds/contacts/default/thin?max-results=65535';

    function newCurlSession($URL, $auth = null) {
        $curl = curl_init();

        $opts = array(
            CURLOPT_URL => $URL,
            CURLOPT_REFERER => '',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
        );
        if (null != $auth) {
            $opts[CURLOPT_HTTPHEADER] = array(
               'Authorization: GoogleLogin auth='.$auth,
            );
        }
        curl_setopt_array($curl, $opts);
        return $curl;
    }

    function useCurlForPost($curl, $params) {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        return $curl;
    }

    function getAuthToken($login, $password) {
        $curl = $this->useCurlForPost($this->newCurlSession(self::$url_ClientLogin), array(
           'accountType' => 'HOSTED_OR_GOOGLE',
           'Email' => $login,
           'Passwd' => $password,
           'service' => 'cp',
           'source' => 'Drupal-Contact-Importer',
        ));
        $resp = curl_exec($curl);

        // Look for the important stuff:
        preg_match_all('/Auth=([^\s]*)/si', $resp, $matches);
        if (isset($matches[1][0])) {
                return $matches[1][0];
        } else {
           return false;
        }
    }

    function getAddressbook($login, $password) {
        // check if username and password was given:
        if ((isset($login) && trim($login)=="") || (isset($password) && trim($password)==""))
        {
            $args = func_get_args();
            drupal_set_message('Incorrect login information given: '.print_r($args, true), 'error');
            return false;
        }

        // Get the GData auth token:
        $auth = $this->getAuthToken($login, $password);
        if (false === $auth) {
            drupal_set_message('Login failed', 'error');
            return false;
        }        

        $curl = $this->newCurlSession(self::$url_Feed, $auth);
        $data = curl_exec($curl);

        $doc = new DOMDocument();
        $doc->loadXML($data);
        $path = new DOMXPath($doc);
        $path->registerNamespace('a', 'http://www.w3.org/2005/Atom');
        $path->registerNamespace('gd', 'http://schemas.google.com/g/2005');
        $nodes = $path->query('//a:entry');
        $num = $nodes->length;

        $contacts = array();
        for ($x = 0; $x < $num; $x++) {
            $entry = $nodes->item($x);
            $tnodes = $path->query('a:title', $entry);
            $nnode = $tnodes->item(0);
            $name = $nnode->textContent;
            $enodes = $path->query('gd:email', $entry);
            $mnode = $enodes->item(0);
            $email = $mnode->getAttribute('address');
            // NOTE: Keep in mind that $mnode->getAttribute('rel') tells you what kind of email it is.
            // NOTE: Also remember that there can be multiple emails per entry!
            if (empty($name)) {
                $contacts[] = $email;
            } else {
                $contacts[$name] = $email;
            }
        }        

        return $contacts;
    }
}
*/
?>