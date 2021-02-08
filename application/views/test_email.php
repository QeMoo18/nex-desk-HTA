<?php
$user = "admin@nexticks.com";
$pass = "P@ssword1234";
$imap_host = "{mail.nexticks.com/imap/ssl/novalidate-cert}";
$imap_folder = "INBOX";

 
$mbox = imap_open($imap_host.$imap_folder, $user, $pass) or die("can't connect: " . imap_last_error());


if( $mbox) { 
        //echo "Connect";
        
        $MC = imap_check($mbox);
        $result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
        foreach ($result as $overview) {

                
                $seen = $overview->seen;
                $uid = $overview->uid;
                $deleted = $overview->deleted;
                
                //var_dump($overview);
                if($deleted!='1'){


                        $header = imap_header($mbox, $uid);
                        $from = $header->from;
                        foreach ($from as $id => $object) {
                            //echo '<br>'.$fromname = $object->personal;
                            echo '<br> FROM : '.$fromaddress = $object->mailbox . "@" . $object->host;
                        }


                        $who = $overview->from;
                        echo "WHO : ".$who;
                        $to = $overview->to;
                        echo "<br>TO : ".$to;
                        $subject = $overview->subject;
                        echo "<br>SUBJECT : ".$subject;
                        $date = $overview->date;
                        echo "<br>DATE : ".$date;

                        
                        echo '<hr>';

                        imap_delete($mbox, $uid, FT_UID);
                        

                } else {

                        echo 'no new record'; exit();
                }

                

                
        }


}  else {

        echo "Connection Error ! Please check your connection or line.";
}


imap_close($mbox);
 
?>