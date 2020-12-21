<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Inquiry
 *
 * @author Suharshana DsW
 */
class Inquiry
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $property;
    public $message;
    public $created_at;
    public function __construct($id)
    {
        if ($id) {
            $query = "SELECT * FROM `inquiry` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->address = $result['address'];
            $this->property = $result['property'];
            $this->message = $result['message'];
            $this->created_at = $result['created_at'];
            return $this;
        }
    }
    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');
        $query = "INSERT INTO `inquiry` ("
            . "`created_at`,"
            . "`name`,"
            . "`email`,"
            . "`phone`,"
            . "`address`,"
            . "`property`,"
            . "`message`"
            . ") VALUES  ('"
            . $createdAt . "','"
            . $this->name . "','"
            . $this->email . "','"
            . $this->phone . "','"
            . $this->address . "','"
            . $this->property . "', '"
            . $this->message . "')";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            $last_id = mysql_insert_id();
            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }
    public function all()
    {
        $query = "SELECT * FROM `inquiry` ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function getInquiriesByMember($member)
    {
        $query = "SELECT * FROM `inquiry` WHERE `property` IN (SELECT `id` FROM `property` WHERE `member` = $member) ORDER BY `id` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();
        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    public function update()
    {
        $query = "UPDATE  `inquiry` SET "
            . "`name` ='" . $this->name . "', "
            . "`email` ='" . $this->email . "', "
            . "`phone` ='" . $this->phone . "', "
            . "`address` ='" . $this->address . "', "
            . "`property` ='" . $this->property . "', "
            . "`message` ='" . $this->message . "' "
            . "`created_at` ='" . $this->created_at . "' "
            . "WHERE `id` = '" . $this->id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }
    public function delete()
    {
        $query = 'DELETE FROM `inquiry` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }
    public function sendMail($inquiry)
    {
        require_once "Mail.php";
        date_default_timezone_set('Asia/Colombo');
        $todayis = date("l, F j, Y, g:i a");
        $site_link = "http://" . $_SERVER['HTTP_HOST'];
        //----------------------- DISPLAY STRINGS ---------------------
        $comany_name = "Sri Lanka Properties";
        $website_name = "www.srilankaproperties.lk";
        $comConNumber = "+94 76 881 1228";
        $comEmail = "admin@srilankaproperties.lk";
        $comOwner = "Mr. Shehan";
        $customer_msg = 'Hello, and thank you for your interest in ' . $comany_name . '.We have received your property inquiry, and we will get back to you as soon as possible.';
        //----------------------- LOGO ---------------------------------
        $logo = $site_link . '/contact-form/img/logo.png';
        //$logo = 'https://ci4.googleusercontent.com/proxy/lz0tSijRTHwJ3I7PQ1iXA67lYFfULG0evRbR_St785VeiABNukQPJl-JGBcLKTkZz1q4pG6g25P1uxTW4dYkOznHHNV3f-zB=s0-d-e1-ft#http://http://sunilayurveda.galle.website/contact-form/img/logo.jpg';
        // ----------------------- POST VARIABLES --------------------------
        $visitor_name = $inquiry->name;
        $visitor_email = $inquiry->email;
        $property = $inquiry->property;
        $PROPERTY = new Property($property);
        $MEMBER = new Member($PROPERTY->member);

        //---------------------- SERVER WEBMAIL LOGIN ------------------------
        $host = "sg1-ls7.a2hosting.com";
        $username = "info@srilankaproperties.lk";
        $password = "x_EC#_KC!,7s";
        //------------------------ MAIL ESSENTIALS --------------------------------
        $webmail = "info@srilankaproperties.lk";
        $visitorSubject = "Thank You " . $visitor_name . " - Sri Lanka Properties";
        $companySubject = "Property Inquiry - #" . $property;
        $visitor_message = '<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
    
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
            <title>Synotec Email</title>
    
        </head>
    
    
    
        <body>
    
            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f6f8fb"> 
                <tbody>
                    <tr> 
                        <td style="padding-top:10px;padding-bottom:30px;padding-left:16px;padding-right:16px" align="center"> 
                            <table style="width:602px" width="602" cellspacing="0" cellpadding="0" border="0" align="center"> 
                                <tbody>
    
                                    <tr> 
                                        <td bgcolor=""> 
                                            <table width="642" cellspacing="0" cellpadding="0" border="0"> 
                                                <tbody> 
    
                                                    <tr> 
                                                        <td style="border:1px solid #dcdee3;padding:20px;background-color:#fff;width:600px" width="600px" bgcolor="#ffffff" align="center"> 
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
                                                                <tbody>
                                                                    <tr><td>
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
    
                                                                                <tbody><tr>
    
    
    
                                                                                        <td width="182">
    
                                                                                            <a href="' . $site_link . '" alt="" class="CToWUd" border="0">
                                                                                            <img src="' . $logo . '" alt="" class="CToWUd" border="0">
                                                                                            </a>
                                                                                        </td>
    
                                                                                        <td width="393">
    
                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 25px;">
    
                                                                                                <tbody><tr>
    
                                                                                                        <td valign="middle" height="46" align="right">
    
                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
    
                                                                                                                <tbody><tr>
    
                                                                                                                        <td width="67%" align="right">
    
                                                                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:18px">
    
                                                                                                                                <a href="' . $site_link . '" style="color:#68696a;text-decoration:none;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.gallecabsandtours.com&amp;source=gmail&amp;ust=1574393192616000&amp;usg=AFQjCNGNM8_Z7ZMe7ndwFlJuHEP29nDd3Q">
    
                                                                                                                                    <h4>' . $website_name . '</h4>
    
                                                                                                                                </a>
    
                                                                                                                            </font>
    
                                                                                                                        </td>
    
                                                                                                                        <td width="4%">&nbsp;</td>
    
                                                                                                                    </tr>
    
                                                                                                                </tbody></table>
    
                                                                                                        </td>
    
                                                                                                    </tr>
    
                                                                                                    <tr>
    
                                                                                                        <td height="30">
                                                                                                        <img src="https://ci3.googleusercontent.com/proxy/TYJ_zOrASsobTeDz_yvavwzKTAX7JrJGTJyCeRScsDTzGF54pub4t0wIRdM4iU3Avx31-3oG9cLkfEWyndCW6CIvp3jtKfO3KpewNC4=s0-d-e1-ft#https://synotec.lk/sites-mail-files/PROMO-GREEN2_01_04.jpg" alt="" class="CToWUd" width="393" height="30" border="0">
                                                                                                        </td>
    
                                                                                                    </tr>
    
                                                                                                </tbody></table>
    
                                                                                        </td>
    
                                                                                    </tr>
    
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr><tr> 
                                                                        <td style="font-size:20px;color:#33468f;line-height:28px;font-family:Arial,Helvetica,sans-serif;padding-bottom:20px;padding-top: 0px;font-weight: 600;" align="left"> Thank You ! </td> 
                                                                    </tr>
                                                                </tbody> 
                                                            </table> 
    
                                                            <table style="background-color:#f5f7fa" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F7FA"> 
    
                                                                <tbody> 
                                                                    <tr> 
                                                                        <td style="font-size:14px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding:15px 20px 10px;font-weight: 600;" align="left"> Hi , ' . $visitor_name . ' </td> 
                                                                    </tr> 
                                                                </tbody> 
                                                            </table> 
                                                            <table style="background-color:#f5f7fa" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F7FA"> 
                                                                <tbody> 
                                                                    <tr> 
                                                                        <td style="word-wrap:break-word;font-size:14px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding:10px 20px" align="left"> <p> ' . $customer_msg . ' </p></td> 
                                                                    </tr> 
                                                                    <tr> 
                                                                        <td style="word-wrap:break-word;font-size:14px;color:#333;line-height:10px;font-family:Arial,Helvetica,sans-serif;padding:10px 20px 10px" align="left"> <p> Best regards, </p>
                                                                            <p> ' . $comOwner . '</p>
                                                                        </td> 
                                                                    </tr>
    
    
    
                                                                </tbody> 
                                                            </table> 
                                                            <table style="background-color:#fff" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"> 
                                                                <tbody> 
                                                                    <tr> 
                                                                        <td style="padding:4px 20px;width:600px;line-height:12px">&nbsp;</td> 
                                                                    </tr> 
                                                                </tbody> 
                                                                <tbody><tr> 
                                                                        <td style="padding:10px 0 7px;color:#9a9a9a;text-align:left;font-family:Arial,Helvetica,sans-serif;font-size:12px" align="left"> <p style="line-height:18px;margin:0;padding:0"> 
                                                                            </p><p style="line-height:24px;margin:0;padding:0">' . $comany_name . '</p>
                                                                            <p style="line-height:24px;margin:0;padding:0">Email : ' . $comEmail . ' </p> 
                                                                            <p style="line-height:24px;margin:0;padding:0">Tel: ' . $comConNumber . '</p> </td> 
                                                                    </tr> 
                                                                </tbody></table> 
                                                 
    
    
                                                        </td> 
                                                    </tr> 
                                                    <tr> 
                                                        <td style="padding:4px 20px;width:600px;line-height:12px">&nbsp;</td> 
                                                    </tr> 
                                                    <tr> 
                                                    
                                                                                </tr> 
                                                </tbody> 
                                            </table> </td> 
                                    </tr> 
                                    <tr> 
                                        <td id="m_-1040695829873221998footer_content"> 
                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f6f8fb"> 
                                                <tbody>
                                                    <tr> 
                                                        <td> 
                                                            <table style="padding:0" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
                                                                <tbody> 
    
    
                                                                    <tr> 
                                                                        <td style="padding:0px 0 7px;color:#9a9a9a;text-align:left;font-family:Arial,Helvetica,sans-serif;font-size:12px" align="left"> <p style="line-height:18px;margin:0;padding:0">Website By : <a href="https://synotec.lk/">Synotec Holdings</a></p> </td> 
                                                                    </tr> 
                                                                    <tr></tr> 
                                                                </tbody> 
                                                            </table> </td> 
                                                    </tr> 
                                                </tbody>
                                            </table> </td> 
                                    </tr> 
                                </tbody>
                            </table> </td> 
                    </tr> 
                </tbody>
            </table>
    
    
    
        </body>
    
    </html>';
        $visitorHeaders = array(
            'MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
            'To' => $visitor_email,
            'Reply-To' => $MEMBER->email,
            'Subject' => $visitorSubject
        );
        $smtp = Mail::factory('smtp', array(
            'host' => $host,
            'auth' => true,
            'username' => $username,
            'password' => $password
        ));
        $visitorMail = $smtp->send($visitor_email, $visitorHeaders, $visitor_message);
        if (PEAR::isError($visitorMail)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function sendMailToMember($inquiry)
    {
        require_once "Mail.php";
        date_default_timezone_set('Asia/Colombo');
        $todayis = date("l, F j, Y, g:i a");
        $site_link = "http://" . $_SERVER['HTTP_HOST'];
        //----------------------- DISPLAY STRINGS ---------------------
        $comany_name = "Sri Lanka Properties";
        $website_name = "www.srilankaproperties.lk";
        $comConNumber = "+94 76 881 1228";
        $comEmail = "admin@srilankaproperties.lk";
        $comOwner = "Mr. Shehan";
        //----------------------- LOGO ---------------------------------
        $logo = $site_link . '/contact-form/img/logo.png';
        //$logo = 'https://ci4.googleusercontent.com/proxy/lz0tSijRTHwJ3I7PQ1iXA67lYFfULG0evRbR_St785VeiABNukQPJl-JGBcLKTkZz1q4pG6g25P1uxTW4dYkOznHHNV3f-zB=s0-d-e1-ft#http://http://sunilayurveda.galle.website/contact-form/img/logo.jpg';
        // ----------------------- POST VARIABLES --------------------------
        $visitor_name = $inquiry->name;
        $visitor_email = $inquiry->email;
        $visitor_phone = $inquiry->phone;
        $property = $inquiry->property;
        $visitor_address = $inquiry->address;
        $message = $inquiry->message;
        $PROPERTY = new Property($property);
        $MEMBER = new Member($PROPERTY->member);
        //---------------------- SERVER WEBMAIL LOGIN ------------------------
        $host = "sg1-ls7.a2hosting.com";
        $username = "info@srilankaproperties.lk";
        $password = "x_EC#_KC!,7s";
        //------------------------ MAIL ESSENTIALS --------------------------------
        $webmail = "info@srilankaproperties.lk";
        $visitorSubject = "Thank You " . $visitor_name . " - Sri Lanka Properties";
        $companySubject = "Property Inquiry - #" . $property;
        $company_message = '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Synotec Email</title>
    </head>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f6f8fb"> 
            <tbody>
                <tr> 
                    <td style="padding-top:10px;padding-bottom:30px;padding-left:16px;padding-right:16px" align="center"> 
                        <table style="width:602px" width="602" cellspacing="0" cellpadding="0" border="0" align="center"> 
                            <tbody>
                                <tr> 
                                    <td bgcolor=""> 
                                        <table width="642" cellspacing="0" cellpadding="0" border="0"> 
                                            <tbody> 
                                                <tr> 
                                                    <td style="border:1px solid #dcdee3;padding:20px;background-color:#fff;width:600px" width="600px" bgcolor="#ffffff" align="center"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="182">
                                                                                        <a href="' . $site_link . '" target="_blank"> <img src="' . $logo . '" alt="" class="CToWUd" border="0"></img>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td width="393">
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 25px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="middle" height="46" align="right">
                                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td width="67%" align="right">
                                                                                                                        <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:18px">
                                                                                                                            <a href="' . $site_link . '" style="color:#68696a;text-decoration:none;" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.gallecabsandtours.com&amp;source=gmail&amp;ust=1574393192616000&amp;usg=AFQjCNGNM8_Z7ZMe7ndwFlJuHEP29nDd3Q">
                                                                                                                                <h4>' . $website_name . '</h4>
                                                                                                                            </a>
                                                                                                                        </font>
                                                                                                                    </td>
                                                                                                                    <td width="4%">&nbsp;</td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td height="30">
                                                                                                    <img src="https://ci3.googleusercontent.com/proxy/TYJ_zOrASsobTeDz_yvavwzKTAX7JrJGTJyCeRScsDTzGF54pub4t0wIRdM4iU3Avx31-3oG9cLkfEWyndCW6CIvp3jtKfO3KpewNC4=s0-d-e1-ft#https://synotec.lk/sites-mail-files/PROMO-GREEN2_01_04.jpg" alt="" class="CToWUd" width="393" height="30" border="0">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                        </table> 
                                                        <table style="background-color:#f5f7fa" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F7FA"> 
                                                            <tbody> 
                                                                <tr> 
                                                                    <td style="font-size:14px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding:15px 20px 10px;font-weight: 600;" align="left"> Hi , ' . $MEMBER->name . ' </td> 
                                                                </tr> 
                                                            </tbody> 
                                                        </table> 
                                                        <table style="background-color:#f5f7fa" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F5F7FA"> 
                                                            <tbody> 
                                                                <tr> 
                                                                    <td style="word-wrap:break-word;font-size:14px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding:10px 20px" align="left"> <p> You have a new property inquiry from website. Kindly request your attention on this matter. The details of the inquiry are shown bellow.</p></td> 
                                                                </tr> 
                                                            </tbody> 
                                                        </table> 
                                                    </td> 
                                                </tr> 
                                                <tr> 
                                                    <td style="padding:4px 20px;width:600px;line-height:12px">&nbsp;</td> 
                                                </tr> 
                                                <tr> 
                                                    <td style="padding:20px;border:1px solid #dcdee3;width:600px;background-color:#fff"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
                                                            <tbody> 
                                                                <tr> 
                                                                   <td style="font-size:15px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding:0 0 8px;font-weight: 700;" align="left"> The Details :</td>
                                                                </tr> 
                                                            </tbody> 
                                                        </table> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
                                                            <tbody> 
                                                                <tr> 
                                                                    <ul>
                                                                        <li>
                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:14px">
                                                                                Name : ' . $visitor_name . '
                                                                            </font>
                                                                        </li>
                                                                        <li>
                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:14px">
                                                                                Email : <a href="mailto:' . $visitor_email . '" rel="noreferrer" target="_blank">' . $visitor_email . '</a>
                                                                            </font>
                                                                        </li>
                                                                        
     <li>
                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:14px">
                                                                                 Contact Number : ' . $visitor_phone . '
                                                                            </font>
                                                                        </li>
                                                                             <li>
                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:14px">
                                                                                  Address : ' . $visitor_address . '
                                                                            </font>
                                                                        </li>
                                                                        </li>
                                                                             <li>
                                                                            <font style="font-family:Verdana,Geneva,sans-serif;color:#68696a;font-size:14px">
                                                                                  Property : ' . $PROPERTY->title . ' (#' . $property . ')
                                                                            </font>
                                                                        </li>
                                             
                                                                    </ul>
                                                                </tr> 
                                                            </tbody> 
                                                        </table> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"> 
                                                            <tbody> 
                                                                <tr> 
                                                                    <td style="font-size:14px;color:#333;line-height:18px;font-family:Arial,Helvetica,sans-serif;padding-bottom:8px" align="left"> ' . $message . '</td> 
                                                                </tr> 
                                                            </tbody> 
                                                        </table>
                                                    </td> 
                                                </tr> 
                                            </tbody> 
                                        </table>
                                    </td> 
                                </tr> 
                                <tr> 
                                    <td id="m_-1040695829873221998footer_content"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f6f8fb"> 
                                            <tbody>
                                                <tr> 
                                                    <td> 
                                                        <table style="padding:0" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> 
                                                            <tbody> 
                                                                <tr> 
                                                                    <td style="padding:0px 0 7px;color:#9a9a9a;text-align:left;font-family:Arial,Helvetica,sans-serif;font-size:12px" align="left"> <p style="line-height:18px;margin:0;padding:0">Website By : <a href="https://synotec.lk/">Synotec Holdings</a></p> </td> 
                                                                </tr> 
                                                                <tr></tr> 
                                                            </tbody> 
                                                        </table>
                                                    </td> 
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </td> 
                                </tr> 
                            </tbody>
                        </table>
                    </td> 
                </tr> 
            </tbody>
        </table>
    </body>
</html>';
        $companyHeaders = array(
            'MIME-Version' => '1.0', 'Content-Type' => "text/html; charset=ISO-8859-1", 'From' => $webmail,
            'To' => $MEMBER->email,
            'Reply-To' => $visitor_email,
            'Subject' => $companySubject
        );
        $smtp = Mail::factory('smtp', array(
            'host' => $host,
            'auth' => true,
            'username' => $username,
            'password' => $password
        ));
        $companyMail = $smtp->send($MEMBER->email, $companyHeaders, $company_message);
        if (PEAR::isError($companyMail)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
